<?php

$page_title = "Editar Paciente";
include_once "header.php";

// 
echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-info pull-right'>";
        echo "<span class='glyphicon glyphicon-list-alt'></span> Ver pacientes  ";
    echo "</a>";
echo "</div>";

// 
$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR! ID not found!');

// 
include_once 'classes/database.php';
include_once 'classes/paciente.php';
include_once 'initial.php';

// 
$paciente = new Paciente($db);
$paciente->id = $id;
$paciente->getUser();

// 
if($_POST)
{

    // 
    $paciente->firstname = htmlentities(trim($_POST['firstname']));
    $paciente->lastname = htmlentities(trim($_POST['lastname']));
    $paciente->document_type = htmlentities(trim($_POST['document_type']));
    $paciente->document_number = htmlentities(trim($_POST['document_number']));
    $paciente->tratamiento_id = $_POST['tratamiento_id'];
    $paciente->city = htmlentities(trim($_POST['city']));
    $paciente->address_p = htmlentities(trim($_POST['address_p']));
    $paciente->mobile = $_POST['mobile'];

    // 
    if($paciente->update()){
        echo "<div class=\"alert alert-success alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "Excelente, Paciente editado!!.";
        echo "</div>";
    }

    //
    else{
        echo "<div class=\"alert alert-danger alert-dismissable\">";
            echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                        &times;
                  </button>";
            echo "Error! No pudo ser editado el paciente.";
        echo "</div>";
    }
}
?>

  
    <form action='edit.php?id=<?php echo $id; ?>' method='post'>

        <table class='table table-hover table-responsive table-bordered'>

            <tr>
                <td>Nombre</td>
                <td><input type='text' name='firstname' value='<?php echo $paciente->firstname;?>' class='form-control' placeholder="ingrese su nombre" required></td>
            </tr>

            <tr>
                <td>Apellido</td>
                <td><input type='text' name='lastname' value='<?php echo $paciente->lastname;?>' class='form-control' placeholder="ingrese su apellido" required></td>
            </tr>

            <tr>
                <td>Tipo de documento</td>
                <td><input type='text' name='document_type' value='<?php echo $paciente->document_type;?>' class='form-control' placeholder="Enter Email Address" required></td>
            </tr>

            <tr>
                <td>Documento</td>
                <td><input type='text' name='document_number' value='<?php echo $paciente->document_number;?>' class='form-control' placeholder="Ingrese su documento" required></td>
            </tr>

            <tr>
                <td>Tratamiento</td>
                <td>

                    <?php
                    //
                    include_once 'classes/tratamiento.php';

                    $tratamiento = new Tratamiento($db);
                    $prep_state = $tratamiento->getAll();

                    //
                    echo "<select class='form-control' name='tratamiento_id'>";
                    echo "<option>--- Selecione Tratamiento ---</option>";

                    while ($row_category = $prep_state->fetch(PDO::FETCH_ASSOC)){
                        extract($row_category);

                        //
						if($tratamiento->category_id == $id){ //
                            echo "<option value='$id' selected>"; //
                        }else{
                            echo "<option value='$id'>";
                        }

						echo "$name </option>";
                    }
                    echo "</select>";
                    ?>
                </td>
            </tr>
            <tr>
                <td>Ciudad</td>
                <td><input type='text' name='city' value='<?php echo $paciente->city;?>' class='form-control' placeholder=" " required></td>
            </tr>
            <tr>
                <td>Documento</td>
                <td><input type='text' name='address_p' value='<?php echo $paciente->address_p;?>' class='form-control' placeholder=" " required></td>
            </tr>
            <tr>
                <td>Documento</td>
                <td><input type='text' name='mobile' value='<?php echo $paciente->mobile;?>' class='form-control' placeholder=" " required></td>
            </tr>

            <tr>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-success" >
                        <span class=""></span> Actualizar 
                    </button>
                </td>
            </tr>

        </table>
    </form>



<?php
include_once "footer.php";
?>