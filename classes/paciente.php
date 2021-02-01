<?php

class Paciente
{
    // 
    public $db_conn;
    public $table_name = "pacientes";

    // 
    public $id;
    public $firstname;
    public $lastname;
    public $document_type;
    public $document_number;
    public $tratamiento_id;
    public $city;
    public $address_p;
    public $mobile;
    
    public function __construct($db)
    {
        $this->db_conn = $db;
    }


    function create()
    {
        //
        $sql = "INSERT INTO " . $this->table_name . " SET firstname = ?, lastname = ?, document_type = ?, document_number = ?, tratamiento_id = ?, city = ?,  address_p = ?, mobile = ?";

        $prep_state = $this->db_conn->prepare($sql);

        $prep_state->bindParam(1, $this->firstname);
        $prep_state->bindParam(2, $this->lastname);
        $prep_state->bindParam(3, $this->document_type);
        $prep_state->bindParam(4, $this->document_number);
        $prep_state->bindParam(5, $this->tratamiento_id);
        $prep_state->bindParam(6, $this->city);
        $prep_state->bindParam(8, $this->address_p);
        $prep_state->bindParam(7, $this->mobile);
        

        if ($prep_state->execute()) {
            return true;
        } else {
            return false;
        }

    }

    // 
    public function countAll()
    {
        $sql = "SELECT id FROM " . $this->table_name . "";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->execute();

        $num = $prep_state->rowCount(); //
        return $num;
    }


    function update()
    {
        $sql = "UPDATE " . $this->table_name . " SET firstname = :firstname, lastname = :lastname, document_type = :document_type, document_number = :document_number,  tratamiento_id = :tratamiento_id, city = :city,  address_p = :address_p,  mobile = :mobile   WHERE id = :id";
        // 
        $prep_state = $this->db_conn->prepare($sql);

        $prep_state->bindParam(':firstname', $this->firstname);
        $prep_state->bindParam(':lastname', $this->lastname);
        $prep_state->bindParam(':document_type', $this->document_type);
        $prep_state->bindParam(':document_number', $this->document_number);
        $prep_state->bindParam(':tratamiento_id', $this->tratamiento_id);
        $prep_state->bindParam(':city', $this->city);
        $prep_state->bindParam(':address_p', $this->address_p);
        $prep_state->bindParam(':mobile', $this->mobile);
        $prep_state->bindParam(':id', $this->id);

        // 
        if ($prep_state->execute()) {
            return true;
        } else {
            return false;
        }
    }


    function delete($id)
    {
        $sql = "DELETE FROM " . $this->table_name . " WHERE id = :id ";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(':id', $this->id);

        if ($prep_state->execute(array(":id" => $_GET['id']))) {
            return true;
        } else {
            return false;
        }
    }


    function getAllUsers($from_record_num, $records_per_page)
    {
        $sql = "SELECT id, firstname, lastname, document_type, document_number,  tratamiento_id, city,  address_p, mobile FROM " . $this->table_name . " ORDER BY firstname ASC LIMIT ?, ?";


        $prep_state = $this->db_conn->prepare($sql);


        $prep_state->bindParam(1, $from_record_num, PDO::PARAM_INT); //
        $prep_state->bindParam(2, $records_per_page, PDO::PARAM_INT);


        $prep_state->execute();

        return $prep_state;
        $db_conn = NULL;
    }

    // 
    function getUser()
    {
        $sql = "SELECT firstname, lastname, document_type, document_number, tratamiento_id, city, address_p, mobile FROM " . $this->table_name . " WHERE id = :id";

        $prep_state = $this->db_conn->prepare($sql);
        $prep_state->bindParam(':id', $this->id);
        $prep_state->execute();

        $row = $prep_state->fetch(PDO::FETCH_ASSOC);

        $this->firstname = $row['firstname'];
        $this->lastname = $row['lastname'];
        $this->document_type = $row['document_type'];
        $this->document_number = $row['document_number'];
        $this->tratamiento_id = $row['tratamiento_id'];
        $this->city = $row['city'];
        $this->address_p = $row['address_p'];
        $this->mobile = $row['mobile'];
        
    }


}