<head>
    <meta charset="utf-8">
</head>
<div class="border border-success">
    <div class="row">
        <div class="col-sm-10">

            <div class="row">
                <div class="col-sm-6">
                    
                    <small><h5 class="mensajeservidor" align="center">PARÁMETROS EMAIL</h5></small>
                        
                    <p class="mensajeservidor">Email al cliente</p>
                    <input type="text" id="titemailc" name="titemailc" placeholder="Titulo email" class="form-control" maxlength="100" value="<?php  if(isset($titemailc)) echo $titemailc ?>" >
                    <input type="text" id="subtitemailc" name="subtitemailc" placeholder="Sub Titulo email" class="form-control" maxlength="100" value="<?php  if(isset($subtitemailc)) echo $subtitemailc ?>" >
                    <input type="text" id="cuerpoemailc" name="cuerpoemailc" placeholder="Cuerpo del mensaje para cliente" class="form-control" maxlength="255" value="<?php  if(isset($cuerpoemailc)) echo $cuerpoemailc ?>" >

                </div>
                <div class="col-sm-6">
                    <p class="mensajeservidor">Vista previa de Email al cliente</p>

                    <div class="form-group green-border-focus">
                        <input type="text" placeholder="Titulo del mensaje" id="titulovistapreviacliente" disabled="">
                        <input type="text" placeholder="Titulo del mensaje" id="subtitulovistapreviacliente" disabled="">
                        
                        <textarea class="form-control" placeholder="Mensaje vista previa" id="vistapreviacliente" rows="3" maxlength="255" disabled=""></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <br>
                    <p class="mensajeservidor">Email a la bodega</p>
                    <input type="text" id="emailcopia" name="emailcopia" placeholder="email con copia" class="form-control" maxlength="100" value="<?php  if(isset($emailcopia)) echo $emailcopia ?>" >

                    <input type="text" id="titemailb" name="titemailb" placeholder="Titulo email" class="form-control" maxlength="100" value="<?php  if(isset($titemailb)) echo $titemailb ?>" >

                    <input type="text" id="subtitemailb" name="subtitemailb" placeholder="Sub Titulo email" class="form-control" maxlength="100" value="<?php  if(isset($subtitemailb)) echo $subtitemailb ?>" >

                    <input type="text" id="cuerpoemailb" name="cuerpoemailb" placeholder="Cuerpo del mensaje para bodega" class="form-control" maxlength="255" value="<?php  if(isset($cuerpoemailb)) echo $cuerpoemailb ?>" >

                    <input type="text" id="saludoemailb" name="saludoemailb" placeholder="Saludo del mensaje para bodega" class="form-control" maxlength="255" value="<?php  if(isset($saludoemailb)) echo $saludoemailb ?>" >
                </div>
                <div class="col-sm-6">
                    <p class="mensajeservidor">Vista previa de Email a la bodega</p>
                    <div class="form-group green-border-focus">
                        <input type="text" placeholder="Titulo del mensaje" id="titulovistapreviabodega" disabled="">
                        <input type="text" placeholder="Titulo del mensaje" id="subtitulovistapreviabodega" disabled="">
                        
                        <textarea class="form-control" placeholder="Mensaje vista previa" id="vistapreviabodega" rows="3" maxlength="255" disabled=""></textarea>
                    </div>
                </div>
            </div>
        </div>
  
        <div class="col-sm-2">
             <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                <input type="radio" aria-label="Radio button for following text input" id="radioespaniol" name="radioespaniol">
                </div>
              </div>
              <input type="text" class="form-control" aria-label="Text input with radio button" value="Español" disabled>
            </div>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                <input type="radio" aria-label="Radio button for following text input" id="radioingles" name="radioingles" id="radioespaniol" name="radioespaniol">
                </div>
              </div>
              <input type="text" class="form-control" aria-label="Text input with radio button" value="Inglés" disabled>
            </div>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text">
                <input type="radio" aria-label="Radio button for following text input" id="radioportugues" name="radioportugues">
                </div>
              </div>
              <input type="text" class="form-control" aria-label="Text input with radio button" value="Portugues" disabled>
            </div>
        </div>
    </div>
    <form class="form-signin" action="">
        <button type="button"  class="btn btn-md btn-info btn-block" id="guardaparametrosemail"> Guardar</button>
    </form>
                                                    <!-- FIN ACORDEON -->
</div>


<script>


    $("input[name=radioingles]").click(function () {    
        setingles();
    });
    $("input[name=radioportugues]").click(function () {
       setportugues();
    });

    $("input[name=radioespaniol]").click(function () {    
       setespaniol();
    });

    function setingles (){
        consultaparametros("ingles");
        $("#radioespaniol").prop("checked", false);
        $("#radioportugues").prop("checked", false);
    }

    function setportugues (){
        consultaparametros("portugues");
        $("#radioespaniol").prop("checked", false);
        $("#radioingles").prop("checked", false);
    }

    function setespaniol (){
        consultaparametros("espaniol");
        $("#radioingles").prop("checked", false);
        $("#radioportugues").prop("checked", false);
    }

    $(document).ready(function()
    {
        $('#guardaparametrosemail').click(function()
        {
           
            if($("#radioingles").prop('checked')){
                guardarparametros("ingles");

            }else if($("#radioportugues").prop('checked')){
                guardarparametros("portugues");
            }else if($("#radioespaniol").prop('checked')){
                guardarparametros("espaniol");
            }else{
                alert("Seleccione un idioma");
            }
            
        });
    });

    
    //Arma la vista previa de los mensajes mientras se teclea
    $("#titemailc").keyup(function(){
        vistaprevia();
    });
    $("#subtitemailc").keyup(function(){
        vistaprevia();
    });
    $("#cuerpoemailc").keyup(function(){
        vistaprevia();
    });
    $("#titemailb").keyup(function(){
        vistaprevia();
    });
    $("#subtitemailb").keyup(function(){
        vistaprevia();
    });
    $("#cuerpoemailb").keyup(function(){
        vistaprevia();
    });
    $("#saludoemailb").keyup(function(){
        vistaprevia();
    });

</script>

<?php

    include("funciones/emailfunciones.php");

?>