<?php
$page_title = "Validar Visitas";
include_once "header.php";
echo "<div class='right-button-margin'>";
    echo "<a href='index.php' class='btn btn-info pull-right'>";
        echo "<span class='glyphicon glyphicon-list-alt'></span> Leer Pacientes ";
    echo "</a>";
echo "</div>";
?>

<script type="text/javascript">
$(document).ready(function(){
    $("#contact-form").validate({
        event: "blur",rules: {'name': "required",'email': "required email",'message': "required"},
        messages: {'name': "Por favor indica tu nombre",'email': "Por favor, indica una direcci&oacute;n de e-mail v&aacute;lida",'message': "Por favor, dime algo!"},
        debug: true,errorElement: "label",
        submitHandler: function(form){
            $("#alert").show();
            $("#alert").html("<img src='assets/images/ajax-loader.gif' style='vertical-align:middle;margin:0 10px 0 0' /><strong>Enviando mensaje...</strong>");
            setTimeout(function() {
                $('#alert').fadeOut('slow');
            }, 5000);
            $.ajax({
                type: "POST",
                url:"submitAjax.php",
                data: "name="+escape($('#name').val())+"&email="+escape($('#email').val())+"&message="+escape($('#message').val()),
                success: function(msg){
                    $("#alert").html(msg);
                    document.getElementById("name").value="";
                    document.getElementById("email").value="";
                    document.getElementById("message").value="";
                    setTimeout(function() {
                        $('#alert').fadeOut('slow');
                    }, 5000);

                }
            });
        }
    });
});
</script>


<div class="container">
    
    <div class="row">
        <div id="content" class="col-lg-12">
            <div class="alert alert-success" id="alert" style="display: none;">&nbsp;</div>
            <form id="contact-form" method="post">
                <div class="form-group">
                    <label for="name">Nombre  del paciente </label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Introduce tu nombre">
                </div>
                
                <div class="form-group">
                    <label for="email">Email del paciente o acompañante</label>
                    <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Introduce tu email">
                    <small id="emailHelp" class="form-text text-muted"></small>
                </div>
                
                <div class="form-group">
                    <label for="message">Descripcion del ingreso del paciente</label>
                    <textarea class="form-control" id="message" name="message" rows="3"></textarea>
                </div>
                
                <div class="form-group">
                    <input class="btn btn-primary submit" type="submit" value="Enviar" />
                </div>
            </form>
        </div>
    </div>
    

    
</div>

</body>
</html>