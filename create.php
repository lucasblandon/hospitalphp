<?php

// 
$page_title = "Crear Paciente";
include_once "header.php";

// 
echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-info pull-right'>";
        echo "<span class='glyphicon glyphicon-list-alt'></span> Leer Pacientes ";
    echo "</a>";
echo "</div>";

// 
include_once 'classes/database.php';
include_once 'initial.php';


// check if the form is submitted
if ($_POST){

    // 
    include_once 'classes/paciente.php';
    $paciente = new Paciente($db);

    $paciente->firstname = htmlentities(trim($_POST['firstname']));
    $paciente->lastname = htmlentities(trim($_POST['lastname']));
    $paciente->document_type = htmlentities(trim($_POST['document_type']));
    $paciente->document_number = htmlentities(trim($_POST['document_number']));
    $paciente->tratamiento_id = $_POST['tratamiento_id'];
    $paciente->city = htmlentities(trim($_POST['city']));
    $paciente->address_p = htmlentities(trim($_POST['address_p']));
    $paciente->mobile = $_POST['mobile'];


    // 
    if($paciente->create()){
        echo "<div class=\"alert alert-success alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "Success! Paciente Creado!!.";
        echo "</div>";
    }

    // 
    else{
        echo "<div class=\"alert alert-danger alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "Error! No se logro crear.";
        echo "</div>";
    }
}
?>


<form action='create.php' role="form" method='post'>

    <table class='table table-hover table-responsive table-bordered'>

        <tr>
            <td>Nombre</td>
            <td><input type='text' name='firstname'  class='form-control' placeholder="Ingrese su Nombre" required></td>
        </tr>

        <tr>
            <td>Apellido</td>
            <td><input type='text' name='lastname' class='form-control' placeholder="Ingrese su Apelllido" required></td>
        </tr>

        <tr>
            <td>Tipo Documento</td>
            <td>
                <select class='form-control' name='document_type'>
                    <option>--- Tipo Documento  ---</option>
                    <option value= 'TI'> T.I. </option>
                    <option value= 'CE' > C.E. </option>
                    <option value= 'CC'> C.C. </option>
                </select>
            </td>    
        </tr>

        <tr>
            <td>Numero Documento</td>
            <td><input type='number' name='document_number' class='form-control' placeholder="Documento" required></td>
        </tr>

        <tr>
            <td>Tratamiento</td>
            <td>
                <?php
                    //
                    
                    include_once 'classes/tratamiento.php';

                    $tratamiento = new Tratamiento($db);
                    $prep_state = $tratamiento->getAll();
                    echo "<select class='form-control' name='tratamiento_id'>";

                        echo "<option>---  Tratamiento ---</option>";

                        while ($row_category = $prep_state->fetch(PDO::FETCH_ASSOC)){

                            extract($row_category);

                            echo "<option value='$id'> $name </option>";
                        }
                    echo "</select>";
                ?>
            </td>
        </tr>
                        
        <tr>
            <td>Ciudad</td>
            <td><input type='text' name='city' class='form-control' placeholder="Ingrese Ciudad de residencia" required></td>
        </tr>

        <tr>
            <td>Dirección</td>
            <td><input type='text' name='address_p' class='form-control' placeholder="Ingrese la Dirección" required></td>
        </tr>

        <tr>
            <td>Telefono</td>
            <td><input type='text' name='mobile' class='form-control' placeholder="Ingrese su Celular" required></td>
        </tr>

        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-plus"></span> Crear
                </button>
            </td>
        </tr>

    </table>
</form>

<?php
include_once "footer.php";
?>

