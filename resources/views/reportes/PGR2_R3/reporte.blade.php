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
      <td colspan="2"><span class="Estilo5">PROGRAMA DE VERIFICACI&Oacute;N Y CALIBRACI&Oacute;N</span></td>
      <td width="30%"><img src="logo.png" alt="Línea de Fuego" style="width:200px"></td>
    </tr>
    <tr>
      <td width="29%"><span class="Estilo3"> C&oacute;digo: PGR2 R3</span></td>
      <td width="15%"><span class="Estilo3">Versi&oacute;n: 1 </span></td>
      <td width="26%"><span class="Estilo3">Vigente desde: Octubre de 2017</span></td>
      <td width="30%" class="Estilo3">Página <span class="pagenum"></span></td>
    </tr>
  </table>
</div>
<div class="body">
@if(@$reporte)
<table width="100%"  border="1" cellpadding="0" cellspacing="0">

  <tr class="Estilo6">
    <td width="5%"><div align="center"><strong>C&Oacute;DIGO</strong></div></td>
    <td width="5%"><div align="center"><strong>DESCRIPCI&Oacute;N</strong></div></td>
    <td width="10%"><div align="center"><strong>RANGO</strong></div></td>
    <td width="15%"><div align="center"><strong>FRECUENCIA DE VERIFICACI&Oacute;N </strong></div></td>
    <td width="5%"><div align="center"><strong>FECHA DE &Uacute;LTIMA VERIFICACI&Oacute;N O CALIBRACI&Oacute;N  </strong></div></td>
    <td width="5%"><div align="center"><strong>ENCARGADO</strong></div></td>
    <td width="20%"><div align="center"><strong>OBSERVACIONES</strong></div></td>
  </tr>
  @foreach($reporte as $qwe)
  <tr class="Estilo6">
    <td><div align="center">{{$qwe->codigo}}</div></td>
    <td><div align="center">{{$qwe->tx_descripcion}}</div></td>
    <td><div align="center">{{$qwe->tx_rango}}</div></td>
    <td><div align="center">{{$qwe->tx_frecuencia}}</div></td>
    <td><div align="center">{{$qwe->fe_verificacion}}</div></td>
    <td><div align="center">{{$qwe->encargado}}</div></td>
    <td><div align="center">{{$qwe->tx_observacion}}</div></td>
  </tr>
  @endforeach
</table>
@endif
</div>
<div class="footer">
  <table width="100%"  border="0">
    <tr>
      <td width="30%"><div align="center" class="Estilo6">______________________</div></td>
      <td width="40%"><div align="center" class="Estilo6">______________________</div></td>
      <td width="30%"><div align="center" class="Estilo6">______________________</div></td>
    </tr>
    <tr>
      <td width="30%"><div align="center" class="Estilo6">FIRMA VENDEDOR</div></td>
      <td width="40%"><div align="center" class="Estilo6">FIRMA PRODUCIÓN</div></td>
      <td width="30%"><div align="center" class="Estilo6">FIRMA CLIENTE</div></td>
    </tr>
  </table>
</div>
