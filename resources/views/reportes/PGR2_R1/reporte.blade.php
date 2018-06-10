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
.Estilo9 {
  font-size: 9px;
  font-weight: bold;
}
.Estilo10 {font-size: 9}
.Estilo11 {font-size: 9; font-weight: bold; }
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
        <td width="29%"><span class="Estilo3"> C&oacute;digo: PGR2 R1</span></td>
        <td width="15%"><span class="Estilo3">Versi&oacute;n: 1 </span></td>
        <td width="26%"><span class="Estilo3">Vigente desde: 24-10-2017</span></td>
        <td width="30%" class="Estilo3">Página <span class="pagenum"></span></td>
      </tr>
</table>
</header>
<p>&nbsp;</p>
<table width="100%"  border="1" cellpadding="0" cellspacing="0" class="Estilo6">
  <tr class="Estilo6">
    <td width="10%" rowspan="2"><div align="center"><strong>ELEMENTO</strong></div></td>
    <td width="15%" rowspan="2"><div align="center"><strong>MANTENIMIENTO A REALIZAR </strong></div></td>
  <td width="58%" colspan="12"><div align="center"><strong>FECHA PROGRAMADA</strong></div></td>
    <td width="8%" rowspan="2"><div align="center"><strong>FECHA REAL EJECUCI&Oacute;N </strong></div></td>
    <td width="9%" rowspan="2"><div align="center"><strong>OBSERVACIONES</strong></div></td>
  </tr>
  <tr width="100%">
    <td width="5%" class="Estilo9"><div align="center" class="Estilo9 Estilo10">E</div></td>
    <td width="5%" class="Estilo9"><div align="center" class="Estilo11">F</div></td>
    <td width="5%" class="Estilo9"><div align="center" class="Estilo11">M</div></td>
    <td width="5%" class="Estilo9"><div align="center" class="Estilo11">A</div></td>
    <td width="5%" class="Estilo9"><div align="center" class="Estilo11">M</div></td>
    <td width="5%" class="Estilo9"><div align="center" class="Estilo11">J</div></td>
    <td width="5%" class="Estilo9"><div align="center" class="Estilo11">J</div></td>
    <td width="5%" class="Estilo9"><div align="center" class="Estilo11">A</div></td>
    <td width="5%" class="Estilo9"><div align="center" class="Estilo11">S</div></td>
    <td width="5%" class="Estilo9"><div align="center" class="Estilo11">O</div></td>
    <td width="5%" class="Estilo9"><div align="center" class="Estilo11">N</div></td>
    <td width="5%" class="Estilo9"><div align="center" class="Estilo11">D</div></td>
  </tr>
<?php $separador = '';?>
@foreach($reporte as $qwe)
@if($qwe->mtto_preventivo_id!=$separador)
<?php $separador = $qwe->mtto_preventivo_id;?>
  <tr>
    <td><div align="center">{{$qwe->elemento}}</div></td>
    <td><div align="center">{{$qwe->tx_descripcion}}</div></td>
    <td><div align="center">@foreach($reporte as $wer) @if(($qwe->mtto_preventivo_id==$wer->mtto_preventivo_id)&&($wer->tx_mes=="Enero")) X @else &nbsp; @endif @endforeach</div></td>
    <td><div align="center">@foreach($reporte as $wer) @if(($qwe->mtto_preventivo_id==$wer->mtto_preventivo_id)&&($wer->tx_mes=="Febrero")) X @else &nbsp; @endif @endforeach</div></td>
    <td><div align="center">@foreach($reporte as $wer) @if(($qwe->mtto_preventivo_id==$wer->mtto_preventivo_id)&&($wer->tx_mes=="Marzo")) X @else &nbsp; @endif @endforeach</div></td>
    <td><div align="center">@foreach($reporte as $wer) @if(($qwe->mtto_preventivo_id==$wer->mtto_preventivo_id)&&($wer->tx_mes=="Abril")) X @else &nbsp; @endif @endforeach</div></td>
    <td><div align="center">@foreach($reporte as $wer) @if(($qwe->mtto_preventivo_id==$wer->mtto_preventivo_id)&&($wer->tx_mes=="Mayo")) X @else &nbsp; @endif @endforeach</div></td>
    <td><div align="center">@foreach($reporte as $wer) @if(($qwe->mtto_preventivo_id==$wer->mtto_preventivo_id)&&($wer->tx_mes=="Junio")) X @else &nbsp; @endif @endforeach</div></td>
    <td><div align="center">@foreach($reporte as $wer) @if(($qwe->mtto_preventivo_id==$wer->mtto_preventivo_id)&&($wer->tx_mes=="Julio")) X @else &nbsp; @endif @endforeach</div></td>
    <td><div align="center">@foreach($reporte as $wer) @if(($qwe->mtto_preventivo_id==$wer->mtto_preventivo_id)&&($wer->tx_mes=="Agosto")) X @else &nbsp; @endif @endforeach</div></td>
    <td><div align="center">@foreach($reporte as $wer) @if(($qwe->mtto_preventivo_id==$wer->mtto_preventivo_id)&&($wer->tx_mes=="Septiembre")) X @else &nbsp; @endif @endforeach</div></td>
    <td><div align="center">@foreach($reporte as $wer) @if(($qwe->mtto_preventivo_id==$wer->mtto_preventivo_id)&&($wer->tx_mes=="Octubre")) X @else &nbsp; @endif @endforeach</div></td>
    <td><div align="center">@foreach($reporte as $wer) @if(($qwe->mtto_preventivo_id==$wer->mtto_preventivo_id)&&($wer->tx_mes=="Noviembre")) X @else &nbsp; @endif @endforeach</div></td>
    <td><div align="center">@foreach($reporte as $wer) @if(($qwe->mtto_preventivo_id==$wer->mtto_preventivo_id)&&($wer->tx_mes=="Diciembre")) X @else &nbsp; @endif @endforeach</div></td>

    <td><div align="center">{{$qwe->fecha_real}}</div></td>
    <td><div align="center">{{$qwe->observacion}}</div></td>
  </tr>
@endif
@endforeach
</table>
<p>&nbsp;</p>
