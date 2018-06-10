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
  .header { position: fixed; top: 0px; left: 0px; right: 0px; height: 50px;}
  .body { position:relative; top: 100px; margin-bottom: 100px;}
  .footer { position: fixed; bottom: 0px; left: 0px; right: 0px; height: 50px;}
</style>
<div class="header">
  <table width="100%" border="1" cellpadding="0" cellspacing="0" style="vertical-align:middle;font-weight:bold;text-align:center;">
    <tr>
      <!-- Empresa -->
      <td width="29%"><span class="Estilo5">3MS DISPROMEDICAL SAS</span></td>
      <td colspan="2"><span class="Estilo5">CONTROL DE AVANCE DE PRODUCCI&Oacute;N </span></td>
      <td width="30%"><img src="logo.png" alt="Línea de Fuego" style="width:200px"></td>
    </tr>
    <tr>
      <td width="29%"><span class="Estilo3"> C&oacute;digo: PGP2 R7</span></td>
      <td width="15%"><span class="Estilo3">Versi&oacute;n: 1 </span></td>
      <td width="26%"><span class="Estilo3">Vigente desde: septiembre de 2017</span></td>
      <td width="30%" class="Estilo3">Página <span class="pagenum"></span></td>
    </tr>
  </table>
</div>
<div class="body">
<p><center>
</center></p>

@if(@$reporte) @foreach($reporte as $rep)
<table width="100%"  border="1" cellpadding="0" cellspacing="0">
  <tr>
    <td colspan="7" height="27"><div align="center"><strong>Avance de Producci&oacute;n</strong></div></td>
  </tr>
  <tr class="Estilo3">
    <td width="7%"><div align="center"><strong>ORDEN No.</strong></div></td>
    <td width="30%"><div align="center"><strong>CLIENTE</strong></div></td>
    <td width="7%"><div align="center"><strong>CANT. REQUERIDA</strong></div></td>
    <td width="14%"><div align="center"><strong>FECHA PEDIDO</strong></div></td>
    <td width="14%"><div align="center"><strong>TIEMPO PACTADO</strong></div></td>
    <td width="8%"><div align="center"><strong>% COMPLETO PRODUCCIÓN</strong></div></td>
    <td width="20%"><div align="center"><strong>DETALLES</strong></div></td>
  </tr>
  @foreach($reporte as $wer)
  <tr class="Estilo3">
    <td><div align="center">{{$wer->orden}}</div></td>
    <td><div align="center">{{$wer->cliente}}</div></td>
    <td><div align="center">{{$wer->cantidad_requerida}}</div></td>
    <td><div align="center">{{$wer->fe_orden_pedido}}</div></td>
    <td><div align="center">{{$wer->semanas}}</div></td>
    <td><div align="center">{{$wer->porcentaje}}</div></td>
    <td><div align="center">{{$wer->detalle}}</div></td>
  </tr>
  @endforeach
</table>
<p>&nbsp;</p>
@break;
@endforeach
@endif
</div>
<div class="footer">
  <table width="100%"  border="0">
    <tr>
      <td width="50%"><div align="center" class="Estilo6 Estilo7">REVISADO POR ASESOR </div></td>
      <td width="50%"><div align="center" class="Estilo8">APROBADO POR GERENTE </div></td>
    </tr>
  </table>
</div>
