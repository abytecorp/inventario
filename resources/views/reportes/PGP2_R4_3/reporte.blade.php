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
  .header { position: fixed; top: 0px; left: 0px; right: 0px; height: 50px;}
  .body { position:relative; top: 100px; margin-bottom: 100px;}
  .footer { position: fixed; bottom: 0px; left: 0px; right: 0px; height: 50px;}
</style>
<div class="header">
  <table width="100%" border="1" cellpadding="0" cellspacing="0" style="vertical-align:middle;font-weight:bold;text-align:center;">
    <tr>
      <!-- Empresa -->
      <td width="29%"><span class="Estilo5">3MS DISPROMEDICAL SAS</span></td>
      <td colspan="2"><span class="Estilo5">FORMULARIO CONTROL DE INVENTARIO SALIDAS</span></td>
      <td width="30%"><img src="logo.png" alt="Línea de Fuego" style="width:200px"></td>
    </tr>
    <tr>
      <td width="29%"><span class="Estilo3"> C&oacute;digo: PGP2 R4.3</span></td>
      <td width="15%"><span class="Estilo3">Versi&oacute;n: 1 </span></td>
      <td width="26%"><span class="Estilo3">Vigente desde: septiembre de 2017</span></td>
      <td width="30%" class="Estilo3">Página <span class="pagenum"></span></td>
    </tr>
  </table>
</div>
<div class="body">
@if(@$reporte)
<table width="100%"  border="1" cellpadding="0" cellspacing="0" bordercolor="#999999">
  <tr bgcolor="#CCCCCC">
    <td colspan="6"><div align="center" class="Estilo6"><strong>SALIDAS</strong></div></td>
  </tr>
  <tr bgcolor="#E5E5E5" class="Estilo6">
    <td width="12%"><div align="center"><strong>C&Oacute;DIGO</strong></div></td>
    <td width="46%"><div align="center"><strong>DESCRIPCI&Oacute;N</strong></div></td>
    <td width="9%"><div align="center"><strong>ROLLO N&deg;</strong></div></td>
    <td width="15%"><div align="center"><strong>FECHA</strong></div></td>
    <td width="9%"><div align="center"><strong>ORDEN</strong></div></td>
    <td width="9%"><div align="center"><strong>CANTIDAD (Metros/Unidad)</strong></div></td>
  </tr>
  @foreach($reporte as $qwe)
  <tr class="Estilo6">
    <td><div align="center">{{$qwe->codigo}}</div></td>
    <td width="46%">{{$qwe->tx_descripcion}}</td>
    <td width="9%"><div align="center">{{$qwe->lote}}</div></td>
    <td width="15%"><div align="center">{{$qwe->fecha}}</div></td>
    <td width="9%"><div align="center">{{$qwe->orden_id}}</div></td>
    <td width="9%"><div align="center">
      {{$qwe->cantidad}}
    </div></td>
  </tr>
  @endforeach
</table>
@endif
</div>