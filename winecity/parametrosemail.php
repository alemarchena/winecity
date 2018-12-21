<div class="border border-success">
    <h2 class="mensajeservidor" align="center">PARÁMETROS EMAIL</h2>
    
    <p class="mensajeservidor">Email al cliente</p>
    <input type="text" id="titemailc" name="titemailc" placeholder="Titulo email" class="form-control"  value="<?php  if(isset($titemailc)) echo $titemailc ?>" >
    <input type="text" id="subtitemailc" name="subtitemailc" placeholder="Sub Titulo email" class="form-control"  value="<?php  if(isset($subtitemailc)) echo $subtitemailc ?>" >
    <input type="text" id="cuerpoemailc" name="cuerpoemailc" placeholder="Cuerpo del mensaje" class="form-control"  value="<?php  if(isset($cuerpoemailc)) echo $cuerpoemailc ?>" >


    <p class="mensajeservidor">Email a la bodega</p>
    <input type="text" id="titemailb" name="titemailb" placeholder="Titulo email" class="form-control"  value="<?php  if(isset($titemailb)) echo $titemailb ?>" >
    <input type="text" id="subtitemailb" name="subtitemailb" placeholder="Sub Titulo email" class="form-control"  value="<?php  if(isset($subtitemailb)) echo $subtitemailb ?>" >
    <input type="text" id="cuerpoemailb" name="cuerpoemailb" placeholder="Cuerpo del mensaje" class="form-control"  value="<?php  if(isset($cuerpoemailb)) echo $cuerpoemailb ?>" >


    <form class="form-signin" action="">
        <button type="button"  class="btn btn-md btn-info btn-block" id="guardaparametrosemail"> Guardar</button>
    </form>
                                                    <!-- FIN ACORDEON -->
</div>


