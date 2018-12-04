<!DOCTYPE html> 
  <html> 
  <head> 
      <link rel="stylesheet" href="css/calendar.css" /> 
<!-- lo activo para probar el calendario solo
      <script
			src="https://code.jquery.com/jquery-3.3.1.min.js"
			integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
			crossorigin="anonymous">
		</script>
	-->
		<script src="js/calendario.js"></script>
  </head> 
  <body> 
  	
  	

  	<!-- INPUT QUE RECOLECTAN LA ELECCION EN EL CALENDARIO-->
  	<input type="Text" id="diafecha" name="diafecha" style="display: none">
  	<input type="Text" id="mesfecha" name="mesfecha" style="display: none">
  	<input type="Text" id="aniofecha" name="aniofecha" style="display: none">
  	
  	
  	<br>

 	<div id="cal"> 
	    <div class="header"> 
			<span class="left button" id="prev"> &lang; </span> 
			<span class="left hook"></span> 
			<span class="month-year" id="label"> Enero 1999 </span> 
			<span class="right hook"></span> 
			<span class="right button" id="next"> &rang; </span>
	    </div> 
	    <table id="days"> 
			<td>Do</td> 
			<td>Lu</td> 
			<td>Ma</td> 
			<td>Mi</td> 
			<td>Ju</td> 
			<td>Vi</td> 
			<td>Sa</td>
	 
	    </table> 
	    <div id="cal-frame"> 
		 	<table id="tablacalendario" class="curr"> 
			    <tbody id="cuerpocalendario"> 
			        <tr><td class="nil"></td><td class="nil"></td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td></tr> 
			        <tr><td>6</td><td>7</td><td>8</td><td>9</td><td>10</td><td class="today">11</td><td>12</td></tr> 
			        <tr><td>13</td><td>14</td><td>15</td><td>16</td><td>17</td><td>18</td><td>19</td></tr> 
			        <tr><td>20</td><td>21</td><td>22</td><td>23</td><td>24</td><td>25</td><td>26</td></tr> 
			        <tr><td>27</td><td>28</td><td>29</td><td>30</td><td class="nil"></td><td class="nil"></td><td class="nil"></td></tr> 
			    </tbody> 
			</table>
	    </div> 
	</div>
  </body> 
  </html>

<script>


$(document).ready(function() 
{
	$('td').click(function(e){
		
		$("#diafecha").val($(this).html());
		$("#textofecha").html($(this).html() + " de " +$("#label").html());
		$("#collapseCal").collapse("hide");
	});

	$('#agendar').click(function(e){
		
		Agendar();
		
	});
});



function Agendar(){

	
	var dia = $("#diafecha").val();
	var mes = $("#mesfecha").val();
	var anio = $("#aniofecha").val();

	var fecha = dia + "/" + mes + "/" + anio;
	
	$.ajax({
            url:"controladores/agendar.php",
            data: {fecha:fecha},
            type: "post",

            success:function(data){

                console.log("Data devolvio:" + data);

                if(data!="consultavacia")
                {
                   
                    alert(data); //muestra un mensaje con el texto devuelto por el controlador

                }else{

                    alert("Error al crear el registro");
                }
            },

            error: function(e)
            {
                alert("Error en el alta.");
            }

            });
}
</script>