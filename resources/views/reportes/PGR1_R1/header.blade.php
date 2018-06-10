	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	@if($esPDF==1)
	<link rel="stylesheet" href="css/bootstrap.min.css">
	@else
	<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
	@endif
	<div class="container">
	<header>
		<table width="100%" border="1" style="vertical-align:middle;font-weight:bold;text-align:center;">
			<tr>
				<!-- Empresa -->
				<td width="30%">3MS DISPROMEDICAL SAS</td>
				<td width="40%"> LISTADO DE BIENES Y SERVICIOS REQUERIDOS POR LA EMPRESA</td>
				<td width="30%"><img src="logo.png" alt="Línea de Fuego" style="width:200px"></td>
			</tr>
			<tr>
				<td width="30%"> C&oacute;digo: PGR1 R1</td>
				<td width="40%">Vigente desde: Octubre de 2017</td>
				<td width="30%">versi&oacute;n 1</td>
			</tr>
		</table>
	</header>

		<p>&nbsp;</p>
		<table width="100%" border="1" style="vertical-align:middle;text-align:center;">
			<tr style="font-weight:bold;">
				<td width="30%">NIT</td>
				<td width="40%">NOMBRE</td>
				<td width="30%">BIEN/SERVICIO</td>
			</tr>