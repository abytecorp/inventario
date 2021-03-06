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
    bottom: 30px;
    font-size: 12px;
    color: #000;
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
  <table width="100%" border="1" cellpadding="0" cellspacing="0" style="vertical-align:middle;font-weight:bold;text-align:center;">
    <tr>
      <!-- Empresa -->
      <td width="29%"><span class="Estilo5">3MS DISPROMEDICAL SAS</span></td>
      <td colspan="2">CONTROL DE CALIDAD Y TRAZABILIDAD</td>
      <td width="30%"><img src="logo.png" alt="Línea de Fuego" style="width:200px"></td>
    </tr>
    <tr>
      <td width="29%"><span class="Estilo3"> C&oacute;digo: PGP2 R6</span></td>
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
    <td colspan="2"><div align="center" class="Estilo6"><strong>DATOS DEL CLIENTE</strong></div></td>
  </tr>
  <tr class="Estilo6">
    <td width="50%">C&oacute;diugo del  Cliente: {{$rep->cliente}}</td>
    <td width="50%">Fecha Inicio de Manufactura o.: {{$rep->fecha_inicio_manufactura}}</td>
  </tr>
  <tr class="Estilo6">
    <td>Fecha Entregat. : {{$rep->fe_entrega}}</td>
    <td>Orden No. : {{$rep->orden_id}}</td>
  </tr>
</table>
<?php break;?>
@endforeach @endif

<table width="100%"  border="1" cellpadding="0" cellspacing="0">
  <tr bgcolor="#E5E5E5">
    <td width="100%"><div align="center" class="Estilo6"><strong>DATOS DE LA ORDEN</strong></div></td>
  </tr>
  <?php $separador = '';?>
  @foreach($reporte as $qwe)
  @if($qwe->codigo!=$separador)
  <?php $total = 0;?>
  @endif
  @endforeach
</table>
@if(@$reporte)
<?php $titulo = '';?>
@foreach($reporte as $qwe)
@if($titulo!=$qwe->separador)
<?php $titulo = $qwe->separador;?>
<table width="100%"  border="1" cellpadding="0" cellspacing="0">
  <tr bgcolor="#E5E5E5">
    <td colspan="4"><div align="center" class="Estilo6"><strong>{{$titulo}}</strong></div></td>
  </tr>
  <tr bgcolor="#E5E5E5" class="Estilo6">
    <td width="28%"><div align="center"><strong>MATERIAL</strong></div></td>
    <td width="15%"><div align="center"><strong>REF</strong></div></td>
    <td width="34%"><div align="center"><strong>LOTE</strong></div></td>
    <td width="23%"><div align="center"><strong>CANTIDAD</strong></div></td>
  </tr>
  @foreach($reporte as $wer)
  @if($qwe->separador==$wer->separador)
  <tr class="Estilo6">
    <td width="28%"><div align="center"><strong>{{$wer->tx_descripcion}}</strong></div></td>
    <td width="15%"><div align="center"><strong>{{$wer->codigo}}</strong></div></td>
    <td width="34%"><div align="center"><strong>{{$wer->lote}}</strong></div></td>
    <td width="23%"><div align="center"><strong>{{$wer->cantidad}}</strong></div></td>
  </tr>
  @endif
  @endforeach
</table>
@endif
@endforeach
@endif
<p>&nbsp;</p>
</div>
<div class="footer">
  <table width="100%"  border="0">
    <tr>
      <td width="30%"><div align="center" class="Estilo6">_________________________</div></td>
      <td width="40%"><div align="center" class="Estilo6">_________________________</div></td>
    </tr>
    <tr>
      <td width="30%"><div align="center" class="Estilo6">FIRMA INVENTARIO </div></td>
      <td width="40%"><div align="center" class="Estilo6">FIRMA PRODUCIÓN</div></td>
    </tr>
  </table>
</div>