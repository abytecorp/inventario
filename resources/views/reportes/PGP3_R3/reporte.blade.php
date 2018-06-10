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
.Estilo6 {font-size: 10px}
.Estilo7 {color: #999999}
.Estilo8 {font-size: 12px; color: #999999; }
</style>
<div class="footer">
  <table width="100%"  border="0">
    <tr>
    <td width="50%"><div align="center" class="Estilo8">FIRMA VENDEDOR </div></td>
    <td width="50%"><div align="center" class="Estilo8">FIRMA PRODUCCI&Oacute;N </div></td>
    </tr>
  </table>
</div>
<header>
<table width="100%" border="1" cellpadding="0" cellspacing="0" style="vertical-align:middle;font-weight:bold;text-align:center;">
<tr>
        <!-- Empresa -->
        <td width="29%"><span class="Estilo5">3MS DISPROMEDICAL SAS</span></td>
        <td colspan="2"><span class="Estilo5"> FORMULARIO ORDEN DE REPARACIONES E INSPECCIONES</span></td>
        <td width="30%"><img src="logo.png" alt="Línea de Fuego" style="width:200px"></td>
  </tr>
      <tr>
        <td width="29%"><span class="Estilo3"> C&oacute;digo: PGP3 R3</span></td>
        <td width="15%"><span class="Estilo3">Versi&oacute;n: 1 </span></td>
        <td width="26%"><span class="Estilo3">Vigente desde: septiembre de 2017</span></td>
        <td width="30%" class="Estilo3">Página <span class="pagenum"></span></td>
      </tr>
</table>
</header>
<br>
@if(@$reporte) @foreach($reporte as $rep)
<table width="100%"  border="0">
  <tr bgcolor="#E5E5E5">
    <td colspan="2"><div align="center" class="Estilo6"><strong>DATOS DE INGRESO </strong></div></td>
  </tr>
  <tr class="Estilo6">
    <td width="50%">Cliente: {{$rep->tx_nombre}}</td>
    <td width="50%">No. VIN : {{$rep->tx_numero_vin}}</td>
  </tr>
  <tr class="Estilo6">
    <td>C&oacute;digo de Cliente: {{$rep->clientes_id}}</td>
  <td width="50%">Modelo: {{$rep->tx_modelo}}</td>
  </tr>
  <tr class="Estilo6">
    <td>Talla: {{$rep->talla}}</td>
  <td width="50%">Uniforme de Reemplazo: {{$rep->uniforme_reemp}}</td>
  </tr>
  <tr class="Estilo6">
    <td>Fecha de Manufactura: {{$rep->fe_inic_produccion}}</td>
  <td width="50%">Inspecci&oacute;n / Reparaci&oacute;n: @if($rep->tipo==1)REPARACIÓN @else INSPECCIÓN @endif</td>
  </tr>
  <tr class="Estilo6">
    <td>Fecha de Ingreso: {{$rep->fecha_ingreso}}</td>
  <td width="50%">Garant&iacute;a: {{$rep->garantia_entrada}}</td>
  </tr>
  <tr class="Estilo6">
    <td>Gu&iacute;a de Correo: {{$rep->guia_correo_ent}}</td>
  <td width="50%">Orden de Servicio: {{$rep->orden_servicio}}</td>
  </tr>
  <tr class="Estilo6">
    <td>Servicio Posventa: {{$rep->tx_posventa}}</td>
  <td width="50%">&nbsp;</td>
  </tr>
  <tr class="Estilo6">
    <td colspan="2">Comentarios: {{$rep->comentario_ent}}</td>
  </tr>
</table>
<table width="100%"  border="0">
  <tr bgcolor="#E5E5E5">
    <td colspan="2"><div align="center" class="Estilo6"><strong>DATOS DE SALIDA </strong></div></td>
  </tr>
  <tr class="Estilo6">
    <td width="50%">Fecha de Salida: {{$rep->fecha_salida}}</td>
    <td width="50%">Garant&iacute;a: {{$rep->garantia_salida}}</td>
  </tr>
  <tr class="Estilo6">
    <td>Gu&iacute;a de Correo: {{$rep->guia_correo_sal}}</td>
  <td width="50%">&nbsp;</td>
  </tr>
  <tr class="Estilo6">
    <td colspan="2">Comentarios: {{$rep->comentario_sal}}</td>
  </tr>
</table>
<?php break;?>
@endforeach @endif
