<?php
class MemorySet extends Model{
    
    function get8RandomFromMemorySet($memorySetID){
        $memorySet = array();

        $memorySetFile = $this->getMemorySetFile($memorySetID);

        foreach(preg_split("/((\r?\n)|(\r\n?))/", $memorySetFile) as $line){
            $memoryCards = explode("|", $line);

            array_push($memorySet, $memoryCards);
        }

        shuffle($memorySet);

        $memorySet8 = array_slice($memorySet, 0, 8);

        return $memorySet8;
    }

    private function getMemorySetFile($memorySet){
        $stmt = $this->db->prepare("SELECT * FROM memoryset WHERE pk_id = :pk_id");
        $stmt->execute(array(":pk_id" => $memorySet));

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