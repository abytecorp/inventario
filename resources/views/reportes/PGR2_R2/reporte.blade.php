	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style type="text/css">
<!--
.Estilo3 {font-size: 11px}
.Estilo5 {font-size: 14px}
-->

.header,
.footer {
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
.Estilo6 {font-size: 12px}
.Estilo7 {color: #999999}
.Estilo8 {font-size: 12px; color: #999999; }
</style>

<div class="footer">
	<table width="100%"  border="0">
	  <tr>
		<td width="50%"><div align="center" class="Estilo6 Estilo7">REVISADO POR ASESOR </div></td>
		<td width="50%"><div align="center" class="Estilo8">APROBADO POR GERENTE </div></td>
	  </tr>
	</table>
</div>
<div class="header">
<table width="100%" border="1" cellpadding="0" cellspacing="0" style="vertical-align:middle;font-weight:bold;text-align:center;">
<tr>
				<!-- Empresa -->
				<td width="29%"><span class="Estilo5">3MS DISPROMEDICAL SAS</span></td>
				<td colspan="2"><span class="Estilo5"> LISTADO DE BIENES Y SERVICIOS REQUERIDOS POR LA EMPRESA</span></td>
				<td width="30%"><img src="logo.png" alt="Línea de Fuego" style="width:200px"></td>
  </tr>
			<tr>
				<td width="29%"><span class="Estilo3"> C&oacute;digo: PGR1 R1</span></td>
				<td width="15%"><span class="Estilo3">Versi&oacute;n: 1 </span></td>
				<td width="26%"><span class="Estilo3">Vigente desde: Octubre de 2017</span></td>
				<td width="30%"><span class="pagenum"></span></td>
			</tr>
</table>     
</div>

<p>&nbsp;</p>
@if(@$reporte) @foreach($reporte as $rep) 
<table width="100%"  border="1" cellpadding="5" cellspacing="0">
  <tr>
    <td width="50%">Nombre del Solicitante: {{$rep->tx_nombre}}</td>
    <td width="50%">Fecha de Solicitud: {{$rep->fecha_solicitud}}</td>
  </tr>
  <tr>
    <td colspan="2"><strong>Descripción del Servicio Solicitado:</strong>
      <p>&nbsp;</p>
      Modelo: {{$rep->tx_modelo}}. Talla: {{$rep->talla}}. Número VIN: {{$rep->tx_numero_vin}}. Guia de Correo de Entrada: {{$rep->guia_correo_ent}}.
      <p>&nbsp;</p>
      <p>Guia de Correo Salida: {{$rep->guia_correo_sal}}. Fecha de Reparación {{$rep->fecha_reparacion}} Fecha de Solicitud: {{$rep->fecha_solicitud}} </p>
      <p>Oservacion de entrada: {{$rep->comentario_ent}} </p>
    <p>bservación de Salida: {{$rep->comentario_sal}}</p></td>
  </tr>
</table>
@endforeach @endif 
<p>&nbsp;</p>
<table width="100%"  border="0">
  <tr>
    <td width="50%"><div align="center">
      <p>&nbsp;</p>
      <p> ___________________________ </p>
    </div></td>
  <td width="50%"><div align="center">
    <p>&nbsp;</p>
    <p> ___________________________</p>
  </div></td>
  </tr>
  <tr>
    <td><div align="center">Firma de Recibido a Satisfacci&oacute;n</div></td>
  <td width="50%"><div align="center">Firma de Reparaci&oacute;n</div></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td><p>&nbsp;</p>
      <p align="center">Hora: ___________________ </p></td>
  </tr>
</table>


