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
</style>
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
<header>
  <table width="100%" border="1" cellpadding="0" cellspacing="0" style="vertical-align:middle;font-weight:bold;text-align:center;">
    <tr>
      <!-- Empresa -->
      <td width="29%"><span class="Estilo5">3MS DISPROMEDICAL SAS</span></td>
      <td colspan="2"><span class="Estilo5">FORMULARIO ORDEN DE MANUFACTURA</span></td>
      <td width="30%"><img src="logo.png" alt="Línea de Fuego" style="width:200px"></td>
    </tr>
    <tr>
      <td width="29%"><span class="Estilo3"> C&oacute;digo: PGP2 R3</span></td>
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
    <td colspan="2"><div align="center" class="Estilo6"><strong>DATOS DEL CLIENTE</strong></div></td>
  </tr>
  <tr class="Estilo6">
    <td width="50%">Nombre Cliente: {{$rep->tx_nombre}}</td>
    <td width="50%">Código Cliente: {{$rep->clientes_id}}</td>
  </tr>
  <tr class="Estilo6">
    <td>Orden de Pedido: {{$rep->orden_id}}</td>
    <td>Contrato: {{$rep->tx_contrato}}</td>
  </tr>
  <tr class="Estilo6">
    <td>Fecha Orden de Pedido: {{$rep->fe_orden_pedido}}</td>
    <td>Fecha In. Produc.: {{$rep->fe_inic_produccion}}</td>
  </tr>
  <tr class="Estilo6">
    <td>Fabricado Para: {{$rep->fabricado_para}}</td>
    <td>Posventa: {{$rep->tx_posventa}}</td>
  </tr>
</table>
<?php break;?>
@endforeach @endif

@if(@$reporte)
<table width="100%"  border="1" cellpadding="0" cellspacing="0">
  <tr bgcolor="#E5E5E5">
    <td colspan="8"><div align="center" class="Estilo6"><strong>DATOS DE LA ORDEN</strong></div></td>
  </tr>
  <tr class="Estilo6">
    <td width="15%"><div align="center"><strong>MODELO</strong></div></td>
    <td width="10%"><div align="center"><strong>COLOR</strong></div></td>
    <td width="5%"><div align="center"><strong>TALLA</strong></div></td>
    <td width="5%"><div align="center"><strong>MARCAJE</strong></div></td>
    <td width="5%"><div align="center"><strong>REFLECTIVO</strong></div></td>
    <td width="20%"><div align="center"><strong>NOMBRE</strong></div></td>
    <td width="15%"><div align="center"><strong>No. VIN</strong></div></td>
    <td width="25%"><div align="center"><strong>DETALLES</strong></div></td>
  </tr>
  @foreach($reporte as $qwe)
  <tr class="Estilo6">
    <td width="15%"><div align="center">{{$qwe->tx_modelo}}</div></td>
    <td width="10%"><div align="center">{{$qwe->tx_color}}</div></td>
    <td width="5%"><div align="center">{{$qwe->tx_talla}}</div></td>
    <td width="5%"><div align="center">{{$qwe->tx_marcaje}}</div></td>
    <td width="5%"><div align="center">{{$qwe->tx_reflectivo}}</div></td>
    <td width="15%"><div align="center">{{$qwe->tx_nombre_persona}}</div></td>
    <td width="10%"><div align="center">{{$qwe->tx_numero_vin}}</div></td>
    <td width="35%"><div align="center">{{$qwe->tx_detalle}}</div></td>
  </tr>
  @endforeach
</table>
@endif

