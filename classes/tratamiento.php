<?php

class Tratamiento
{
    private $db_conn;
    private $table_name = "tratamientos";
   
    public $id;
    public $name;
    public $costo;

    public function __construct($db)
    {
        $this->db_conn = $db;
    }

    function getAll()
    {
        
        $sql = "SELECT id, name  FROM " . $this->table_name . "  ORDER BY name";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->execute();

        return $prep_state;
    }

    public function countAll()
    {
        $sql = "SELECT id FROM " . $this->table_name . "";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->execute();

        $num = $prep_state->rowCount(); //
        return $num;
    }

    function getName()
    {

        $sql = "SELECT name FROM " . $this->table_name . " WHERE id = ? limit 0,1";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(1, $this->id); 
        $prep_state->execute();

        $row = $prep_state->fetch(PDO::FETCH_ASSOC);

        $this->name = $row['name'];
    }


    function getPrice()
    {

        $sql = "SELECT costo FROM " . $this->table_name . " WHERE id = ? limit 0,1";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(1, $this->id); 
        $prep_state->execute();

        $row = $prep_state->fetch(PDO::FETCH_ASSOC);

        $this->costo = $row['costo'];
    }
}