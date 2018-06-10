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
</head>
<body>
	<div class="header">
		<table width="100%" border="1" cellpadding="0" cellspacing="0" style="vertical-align:middle;font-weight:bold;text-align:center;">
			<tr>
				<!-- Empresa -->
				<td width="29%"><span class="Estilo5">3MS DISPROMEDICAL SAS</span></td>
				<td colspan="2"><span class="Estilo5"> FORMATO DE INSPECCIONES</span></td>
				<td width="30%"><img src="logo.png" alt="Línea de Fuego" style="width:200px"></td>
			</tr>
			<tr>
				<td width="29%"><span class="Estilo3"> C&oacute;digo: PGP3 R4</span></td>
				<td width="15%"><span class="Estilo3">Versi&oacute;n: 1 </span></td>
				<td width="26%"><span class="Estilo3">Vigente desde: septiembre de 2017</span></td>
				<td width="30%" class="Estilo3">Página <span class="pagenum"></span></td>
			</tr>
		</table>
	</div>
	<div class="body">
		@if(@$reporte) @foreach($reporte as $rep)
		<table width="100%"  border="0">
			<tr bgcolor="#E5E5E5">
				<td colspan="2"><div align="center" class="Estilo6"><strong>DATOS GENERALES </strong></div></td>
			</tr>
			<tr class="Estilo6">
				<td width="50%">Modelo: {{$rep->modelo}}</td>
				<td width="50%">Talla: {{$rep->talla}}</td>
			</tr>
			<tr class="Estilo6">
				<td>Fecha de Manufactura: {{$rep->fecha_manufactura}}</td>
				<td>Fecha de Inspecci&oacute;n: {{$rep->fecha_inspeccion}}</td>
			</tr>
			<tr class="Estilo6">
				<td>Orden de Servicio: {{$rep->orden_inspeccion_id}}</td>
				<td>No. Serial: {{$rep->serial}}</td>
			</tr>
		</table>
		<table width="100%"  border="0">
			<tr bgcolor="#E5E5E5">
				<td colspan="2"><div align="center" class="Estilo6"><strong>LAVADO Y SECADO DEL EQUIPO </strong></div></td>
			</tr>
			<tr class="Estilo6">
				<td width="50%">Fecha de Lavado: {{$rep->fecha_lavado}}</td>
				<td width="50%">Fecha de Secado: {{$rep->fecha_secado}}</td>
			</tr>
		</table>
		<?php break;?>
		@endforeach @endif
		<?php $separador                                                                                = '';?>
		@if(@$reporte) @foreach($reporte as $rep) @if($rep->clasificacion!=$separador) <?php $separador = $rep->clasificacion;?>
		<table width="100%"  border="1" cellpadding="0" cellspacing="0">
			<tr bgcolor="#E5E5E5">
				<td colspan="4"><div align="center" class="Estilo6"><strong>{{$rep->clasificacion}}</strong></div></td>
			</tr>

			<tr class="Estilo6">
				<td width="25%"><div align="center"><strong>PRUEBA</strong></div></td>
				<td width="11%"><div align="center"><strong>PASA</strong></div></td>
				<td width="11%"><div align="center"><strong>NO PASA </strong></div></td>
				<td width="53%"><div align="center"><strong>DETALLE</strong></div></td>
			</tr>
			@foreach($reporte as $wer)
			@if($wer->clasificacion==$rep->clasificacion)
			<tr class="Estilo6">
				<td width="25%">{{$wer->prueba}}</td>
				<td width="11%"><div align="center">{{$wer->pasa}}</div></td>
				<td width="11%"><div align="center">{{$wer->no_pasa}}</div></td>
				<td><div align="center">{{$wer->detalle}}</div></td>
			</tr>
			@endif
			@endforeach
		</table>
		@endif @endforeach @endif
	</div>
	<div class="footer">
		<table width="100%"  border="0">
			<tr>
				<td width="50%"><div align="center" class="Estilo6 Estilo7">REVISADO POR ASESOR </div></td>
				<td width="50%"><div align="center" class="Estilo8">APROBADO POR GERENTE </div></td>
			</tr>
		</table>
	</div>

</body>
</html>