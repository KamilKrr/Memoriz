<?php
class MemorySet extends Model{


    function getInfoOfMemorySet($memorySetLink){
        $stmt = $this->db->prepare("SELECT name, beschreibung FROM memoryset WHERE link = :link");
        $stmt->execute(array(":link" => $memorySetLink));

        if(!$stmt->rowCount()>0){
            return "NOT FOUND";
        }


        $memorySetRow = $stmt->fetch();

        $info = array($this->escapeHTML($memorySetRow['name']), $this->escapeHTML($memorySetRow['beschreibung']));

        return $info;
    }
    
    function get8RandomFromMemorySet($memorySetLink){
        $memorySetFile = $this->getMemorySetFile($memorySetLink);

        $explodeToken = "|";

        $count1 = substr_count($memorySetFile, "|");
        $count2 = substr_count($memorySetFile, ";");

        if($count2 > $count1){
            $explodeToken = ";";
        }
        

        $allPairs = array();

        foreach(preg_split("/((\r?\n)|(\r\n?))/", $memorySetFile) as $line){
            if(empty($line)){
                break;
            }
            $memoryPair = explode($explodeToken, $line);


            array_push($allPairs, array(
                $this->escapeHTML($memoryPair[0]), 
                $this->escapeHTML($memoryPair[1])
            ));
        }

        if(count($allPairs) < 8){
            return false;
        }

        shuffle($allPairs);

        $memorySet = array_slice($allPairs, 0, 8);

        $memorySetActiveMarkup = array();

        foreach($memorySet as $memoryPair){
            $memoryPairMarkup = array();
            foreach($memoryPair as $memoryCard){
                array_push($memoryPairMarkup, $this->getMemoryMarkup($memoryCard));
            }
            array_push($memorySetActiveMarkup, $memoryPairMarkup);
        }

        $_SESSION['memorySetActiveMarkup'] = $memorySetActiveMarkup;

        $all16Cards = array();

        $i = 0;
        foreach ($memorySet as $memoryPair) {
            if($i >= 16){
                break;
            }

            $content = $this->getMemoryMarkup($memoryPair[0]);
            $card = array(
                'content' => $content,
                'id' => $i+1
            );
            array_push($all16Cards, $card);

            $content = $this->getMemoryMarkup($memoryPair[1]);
            $card = array(
                'content' => $content,
                'id' => $i+2
            );
            array_push($all16Cards, $card);

            $i+=2;
        }
        return $all16Cards;
    }

    private function getMemoryMarkup($content){
        $data = "";
        if(preg_match("/\((.*)\)\[(.*)\]/", $content, $data)){
            $result = "<p><img src='$data[2]' alt='$data[1]'></p>";
        }else if(preg_match("/<#(.*)>/", $content, $data)){
            $result = "<span class='colorMemory' style='display: block; width: 100%; height: 100%; background: #" . $data[1] . ";'></span>";
        }else{
            $result = "<p>" . $content . "</p>";
        }
        return $result;
    }

    private function getMemorySetFile($memorySetLink){
        $stmt = $this->db->prepare("SELECT * FROM memoryset WHERE link = :link");
        $stmt->execute(array(":link" => $memorySetLink));

        $memorySetRow = $stmt->fetch();

        $memoryFile = $memorySetRow['MemoryDatei'];

        return $memoryFile;
    }

    function getAllMemorySets(){
        $stmt = $this->db->prepare("SELECT
                                        m.autor,
                                        m.pk_id,
                                        m.name,
                                        m.link,
                                        m.jahrgang,
                                        m.fk_kategorie,
                                        m.beschreibung,
                                        k.name AS kategorie_name,
                                        k.beschreibung AS kategorie_beschreibung
                                    FROM
                                        memoryset AS m
                                        INNER JOIN kategorie AS k ON m.fk_kategorie = k.pk_id
                                    WHERE
                                        m.is_listed = 1
                                    ORDER BY
                                        m.name
                                    ");
        $stmt->execute();

        $memorySets = array();

        while($memorySetRow = $stmt->fetch()){
            $tagStmt = $this->db->prepare("SELECT t.name FROM tag AS t INNER JOIN tag_memoryset AS tm ON t.pk_id = tm.fk_tag WHERE tm.fk_memoryset = :memorySetPk");
            $tagStmt->execute(array(":memorySetPk" => $memorySetRow['pk_id']));

            $tags = array();

            while($tag = $tagStmt->fetch()){
                array_push($tags, $tag['name']);
            }

            $memorySetRow['tags'] = $tags;
            
            array_push($memorySets, $memorySetRow);
        }

        return $memorySets;
    }
    
    function uploadMemoryFile($memoryFile, $name = "no_name_error", $autor = "unknown", $description = ""){
        $randomLink = md5(uniqid('memory_', true));

        
        try{
            $stmt = $this->db->prepare("INSERT INTO memoryset VALUES (:name, :autor, NULL, 0, 0, 0, :link, :memoryDatei, :beschreibung)");
            $stmt->execute(
                array(
                    ":name" => $name,
                    ":autor" => $autor,
                    ":link" => $randomLink,
                    ":memoryDatei" => $memoryFile,
                    ":beschreibung" => $description
                )
            );
        }catch(PDOException $e){
            echo $e;
        }

        return $randomLink;
    }

    private function escapeHTML($html){
        return htmlspecialchars($html);
    }
}


?>