<script>

function conviertefecha(fecharecibidatexto)
{
		fec = fecharecibidatexto;
        
		anio = fec.substring(0, 4);
		mes = fec.substring(5,7);
		dia = fec.substring(8,10);
		
		ensamble = mes + "-" + dia + "-" + anio;
		fecha = new Date(ensamble).toLocaleDateString('es-AR');
		return fecha;
}


</script>