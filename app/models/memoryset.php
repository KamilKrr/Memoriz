<?php
class MemorySet extends Model{
    
    function get8RandomFromMemorySet($memorySetID){
        $memorySet = array();

        $memorySetFile = $this->getMemorySetFile($memorySetID);

        $i = 0;
        foreach(preg_split("/((\r?\n)|(\r\n?))/", $memorySetFile) as $line){
            if($i >= 8) break;
            $memoryCards = explode("|", $line);

            array_push($memorySet, $memoryCards);
            $i++;
        }

        return $memorySet;
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
                                        m.jahrgang,
                                        m.fk_kategorie,
                                        m.beschreibung,
                                        k.name AS kategorie_name,
                                        k.beschreibung AS kategorie_beschreibung
                                    FROM
                                        memoryset AS m
                                        INNER JOIN kategorie AS k ON m.pk_id = k.pk_id
                                    WHERE
                                        m.is_listed = 1
                                    ");
        $stmt->execute();

        $memorySets = array();

        while($memorySetRow = $stmt->fetch()){
            array_push($memorySets, $memorySetRow);
        }

        return $memorySets;
    }
    
}


?>