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
<header>
<table width="100%" border="1" cellpadding="0" cellspacing="0" style="vertical-align:middle;font-weight:bold;text-align:center;">
<tr>
        <!-- Empresa -->
        <td width="29%"><span class="Estilo5">3MS DISPROMEDICAL SAS</span></td>
        <td colspan="2"><span class="Estilo5">CONTROL Y EVALUACI&Oacute;N PROVEEDORES DE SERVICIO </span></td>
        <td width="30%"><img src="logo.png" alt="Línea de Fuego" style="width:200px"></td>
  </tr>
      <tr>
        <td width="29%"><span class="Estilo3"> C&oacute;digo: PGR1 R6</span></td>
        <td width="15%"><span class="Estilo3">Versi&oacute;n: 1 </span></td>
        <td width="26%"><span class="Estilo3">Vigente desde: 15-10-2017</span></td>
        <td width="30%" class="Estilo3">Página <span class="pagenum"></span></td>
      </tr>
</table>
</header>
<p>&nbsp;</p>
@if(@$reporte) @foreach($reporte as $rep)
<?php $responsable = $rep->name;
$observaciones     = $rep->tx_observacion;?>
<table width="100%"  border="1" cellpadding="0" cellspacing="0">
  <tr class="Estilo6">
    <td width="22%"><div align="center"><strong>Nombre Proveedor </strong></div></td>
  <td width="25%"><div align="center"><strong>Frecuencia de evaluaci&oacute;n y reevaluaci&oacute;n  </strong></div></td>
  <td width="25%"><div align="center"><strong>Nombre del evaluador </strong></div></td>
  </tr>
  <tr class="Estilo6">
    <td width="22%"><div align="center">{{$rep->tx_nombre}}</div></td>
    <td><div align="center">{{$rep->frecuencia_evaluacion}}</div></td>
  <td><div align="center">{{$rep->evaluador}}</div></td>
  </tr>
</table>
<?php break;?>@endforeach @endif

<p>&nbsp; </p>
<table width="100%"  border="1" cellpadding="0" cellspacing="0" class="Estilo6">
  <tr>
    <td width="34%" rowspan="2"><div align="center"><strong>Atributos</strong></div></td>
  <td colspan="2"><div align="center" class="Estilo6"><strong>Calificar de 1 a 100 </strong></div></td>
  </tr>
  <tr>
    <td width="15%" class="Estilo6"><div align="center"><strong>Calificaci&oacute;n</strong></div></td>
  <td width="51%" class="Estilo6"><div align="center"><strong>Detalles</strong></div></td>
  </tr>
  @if(@$reporte) @foreach($reporte as $qwe)
  <tr class="Estilo6">
    <td><div align="justify">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$qwe->tx_atributos}}
    </div></td>
  <td><div align="center">{{$qwe->nu_puntaje}}</div></td>
    <td><div align="center">{{$qwe->tx_detalle}}</div></td>
  </tr>
  @endforeach @endif
</table>
<p>&nbsp;</p>
<table width="100%"  border="1" cellpadding="0" cellspacing="0">
  <tr class="Estilo6">
    <td width="26%"><div align="center"><strong>Responsable</strong></div></td>
    <td width="74%"><div align="center"><strong>Observaci&oacute;n</strong></div></td>
  </tr>
  <tr class="Estilo6">
    <td width="26%"><div align="center">{{$responsable}}</div></td>
    <td><div align="center">{{$observaciones}}</div></td>
  </tr>
</table>
<p>&nbsp;</p>
