<?php
class MemorySet extends Model{

    function getNameOfMemorySet($memorySetLink){
        $stmt = $this->db->prepare("SELECT name FROM memoryset WHERE link = :link");
        $stmt->execute(array(":link" => $memorySetLink));

        if(!$stmt->rowCount()>0){
            return "NOT FOUND";
        }

        $memorySetRow = $stmt->fetch();

        $memoryName = $memorySetRow['name'];

        return $memoryName;
    }
    
    function get8RandomFromMemorySet($memorySetLink){
        $memorySetFile = $this->getMemorySetFile($memorySetLink);
        $allPairs = array();

        foreach(preg_split("/((\r?\n)|(\r\n?))/", $memorySetFile) as $line){
            if(empty($line)){
                break;
            }
            $memoryPair = explode("|", $line);

            array_push($allPairs, $memoryPair);
        }

        shuffle($allPairs);

        $memorySet = array_slice($allPairs, 0, 8);

        $_SESSION['memorySet_active'] = $memorySet;

        $all16Cards = array();

        $i = 0;
        foreach ($memorySet as $memoryPair) {
            if($i >= 16){
                break;
            }

            $content = $memoryPair[0];
            if(preg_match("\((.*)\)\[(.*)\]", $content, $data)){
                $content = "";
            }
            $card = array(
                'content' => $content,
                'id' => $i+1
            );
            array_push($all16Cards, $card);

            $card = array(
                'content' => $memoryPair[1],
                'id' => $i+2
            );
            array_push($all16Cards, $card);

            $i+=2;


            foreach ($memoryPair as $memoryCard) {
                $card = array(
                    'content' => $memoryCard,
                    'id' => $i+1
                );
                $i++;
                array_push($all16Cards, $card);
            }
            
        }
        return $all16Cards;
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
    
}


?>