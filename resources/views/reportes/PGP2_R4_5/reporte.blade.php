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
      <td colspan="2"><span class="Estilo5">FORMATO DE GASTO DE MATERIALES POR TALLA</span></td>
      <td width="30%"><img src="logo.png" alt="Línea de Fuego" style="width:200px"></td>
    </tr>
    <tr>
      <td width="29%"><span class="Estilo3"> C&oacute;digo: PGP2 R4.5</span></td>
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
    <td colspan="7"><div align="center" class="Estilo6"><strong>SALIDAS</strong></div></td>
  </tr>
  <tr bgcolor="#E5E5E5" class="Estilo6">
    <td width="40%"><div align="center"><strong>MATERIAL</strong></div></td>
    <td width="10%" bgcolor="#E5E5E5"><div align="center"><strong>CANTIDADES TALLA XS </strong></div></td>
    <td width="10%" bgcolor="#E5E5E5"><div align="center"><strong>CANTIDADES TALLA S </strong></div></td>
    <td width="10%" bgcolor="#E5E5E5"><div align="center"><strong>CANTIDADES TALLA M </strong></div></td>
    <td width="10%"><div align="center"><strong>CANTIDADES TALLA L </strong></div></td>
    <td width="10%"><div align="center"><strong>CANTIDADES TALLA XL </strong></div></td>
    <td width="10%"><div align="center"><strong>CANTIDADES TALLA XXL </strong></div></td>
  </tr>
  @foreach($reporte as $qwe)
  <tr class="Estilo6">
    <td><div align="center">{{$qwe->codigo}}: {{$qwe->descripcion}}</div></td>
    <td><div align="center">{{$qwe->talla_xs}}</div></td>
    <td><div align="center">{{$qwe->talla_s}}</div></td>
    <td><div align="center">{{$qwe->talla_m}}</div></td>
    <td><div align="center">{{$qwe->talla_l}}</div></td>
    <td><div align="center">{{$qwe->talla_xl}}</div></td>
    <td><div align="center">
      {{$qwe->talla_xxl}}
    </div></td>
  </tr>
  @endforeach
</table>
@endif
</div>