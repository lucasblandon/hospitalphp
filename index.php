<?php

//
include_once 'classes/database.php';
include_once 'classes/paciente.php';
include_once 'classes/tratamiento.php';
include_once 'initial.php';

// 
$page = isset($_GET['page']) ? $_GET['page'] : 1; // 
$records_per_page = 5; // 
$from_record_num = ($records_per_page * $page) - $records_per_page; // 
// 
$paciente = new Paciente($db);
$tratamiento = new Tratamiento($db);

// 
$page_title = "Pacientes Hospital La Sagrada Familia";
include_once "header.php";

// 
echo "<div class='right-button-margin'>";
echo "<a href='create.php' class='btn btn-primary pull-right'>";
echo "<span class='glyphicon glyphicon-plus'></span> Crear Paciente";
echo "</a>";
echo "</div>";

echo "<div class='right-button-margin'>";
echo "<a href='visit.php' class='btn btn-primary pull-right'>";
echo "<span class='glyphicon glyphicon-plus'></span> Crear Visitas Por paciente";
echo "</a>";
echo "</div>";
// 
$prep_state = $paciente->getAllUsers($from_record_num, $records_per_page); 
$num = $prep_state->rowCount();

// 
if($num>=0){

    echo "<table class='table table-hover table-responsive table-bordered'>";
    echo "<tr>";
    echo "<th>Nombre</th>";
    echo "<th>Apellido</th>";
    echo "<th>Tipo Doc</th>";
    echo "<th>Documento</th>";
    echo "<th>Ciudad</th>";
    echo "<th>Direccion</th>";
    echo "<th>Telefono</th>";
    echo "</tr>";

    while ($row = $prep_state->fetch(PDO::FETCH_ASSOC)){

        extract($row); //

        echo "<tr>";
        echo "<td>$row[firstname]</td>";
        echo "<td>$row[lastname]</td>";
        echo "<td>$row[document_type]</td>";
        echo "<td>$row[document_number]</td>";
        echo "<td>$row[city]</td>";
        echo "<td>$row[address_p]</td>";
        echo "<td>$row[mobile]</td>";

        echo "<td>";
        // 
        echo "<a href='edit.php?id=" . $id . "' class='btn btn-warning left-margin'>";
        echo "<span class='glyphicon glyphicon-edit'></span> Editar";
        echo "</a>";

        // 
        echo "<a href='delete.php?id=" . $id . "' class='btn btn-danger delete-object'>";
        echo "<span class='glyphicon glyphicon-remove'></span> Borrar";
        echo "</a>";

        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";

    
    include_once 'pagination.php';
}

else{
    echo "<div> No se encontraron Pacientes. </div>";
    }

$prep_state_t = $paciente->getAllUsers($from_record_num, $records_per_page); 
$num_t = $prep_state->rowCount();    

// 
if($num_t>=0){

    echo "<table class='table table-hover table-responsive table-bordered'>";
    echo "<tr>";
    echo "<th>";
        echo "<ul class='list-group'>";
        echo "<li class='list-group-item '>Nombre y Apellidos</li>";
        echo "<li class='list-group-item list-group-item-info'>Documento</li>";
        echo "<li class='list-group-item '>Dirección y telefono</li>";
        echo "</ul>";
    echo "</th>";
   

    
    while ($row = $prep_state_t->fetch(PDO::FETCH_ASSOC)){
        extract($row); //       
        echo "<th>";
        echo "<ul class='list-group'>";
        echo "<li class='list-group-item '>$row[firstname] $row[lastname]</li>";
        echo "<li class='list-group-item list-group-item-info'>$row[document_type] $row[document_number]</li>";
        echo "<li class='list-group-item '>$row[address_p] $row[mobile]</li>";
        echo "</ul>";
        echo "</th>";
        
    }

    echo "<tr>";

    echo "</table>";

}

else{
    echo "<div> No se encontraron Pacientes. </div>";
    }

$num_th = $tratamiento->countAll();

// 
if($num_th>=0){

    echo "<table class='table table-hover table-responsive table-bordered'>";
    echo "<tr>";
    echo "<th>Tipo de tratamiento</th>";
    echo "<th>Ingresos en el mes</th>";
    echo "</tr>";

    $i = 1;
    while ( $i <= $num_th){

        echo "<tr>";        
        echo "<td>";
            $tratamiento->id = $i;
            $tratamiento->getName();
            echo $tratamiento->name;
        echo "</td>";
        
        echo "<td>";
            $tratamiento->id = $i;
            $tratamiento->getPrice();
            echo $tratamiento->costo;
            
        echo "</td>";
        echo "</tr>";
        $i++;
    }

    echo "</table>";

    
    include_once 'pagination.php';
}

else{
    echo "<div> No se encontraron tratamientos. </div>";
    }


?>


<?php
include_once "footer.php";
?>