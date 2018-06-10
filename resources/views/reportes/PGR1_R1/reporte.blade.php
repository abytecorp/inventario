<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PDF</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<style type="text/css">
		<!--
		.Estilo3 {font-size: 11px}
		.Estilo5 {font-size: 14px}
	-->
	.header,.footer {
		width: 100%;
		text-align: center;
		position: fixed;
	}
	.header {
		top: 0px;
	}
	.footer {
		bottom: 10px;
		font-size: 12px;
		color: #999999;
	}
	.pagenum:after {
		content: counter(page);
	}
	.Estilo6 {font-size: 10px}
	.Estilo7 {color: #999999}
	.Estilo8 {font-size: 12px; color: #999999; }
	.header { position: fixed; top: 0px; left: 0px; right: 0px; height: 50px;}
	.body { position:relative; top: 100px; margin-bottom: 100px;}
	.footer { position: fixed; bottom: 0px; left: 0px; right: 0px; height: 50px;}
</style>
<div class="header">
	<table  width="100%" border="1" cellpadding="0" cellspacing="0" style="vertical-align:middle;font-weight:bold;text-align:center;">
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
</div>
<div class="body">
<table width="100%" border="1" cellpadding="0" cellspacing="0" style="vertical-align:middle;text-align:center;">
		<tr style="font-weight:bold;" class="Estilo6">
			<td width="30%">NIT</td>
			<td width="40%">NOMBRE</td>
			<td width="30%">BIEN/SERVICIO</td>
		</tr>
		@if(@$reporte)
		@foreach($reporte as $rep)
		<tr>
			<td width="30%" style="font-size:9px">{{$rep->nit}}</td>
			<td width="40%" style="font-size:9px;text-align:left;padding-left:5px;padding-right:5px;">{{$rep->nombre}}</td>
			<td width="30%" style="font-size:9px;text-align:left;padding-left:5px;padding-right:5px;"><strong>{{$rep->bien_servicio}}: </strong>{{$rep->descripcion}}</td>
		</tr>
		@endforeach
		@endif
	</table>
</div>