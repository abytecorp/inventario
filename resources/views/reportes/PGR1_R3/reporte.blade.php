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
      <td colspan="2"><span class="Estilo5"> LISTADO DE BIENES Y SERVICIOS REQUERIDOS POR LA EMPRESA</span></td>
      <td width="30%"><img src="logo.png" alt="Línea de Fuego" style="width:200px"></td>
    </tr>
    <tr>
      <td width="29%"><span class="Estilo3"> C&oacute;digo: PGR1 R3</span></td>
      <td width="15%"><span class="Estilo3">Versi&oacute;n: 1 </span></td>
      <td width="26%"><span class="Estilo3">Vigente desde: 15-10-2017</span></td>
      <td width="30%" class="Estilo3">Página <span class="pagenum"></span></td>
    </tr>
  </table>
</div>
<div class="body">
@if(@$reporte) @foreach($reporte as $rep)
<table width="100%"  border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="50%">Contacto: {{$rep->contacto}}</td>
    <td width="50%">Fecha de Solicitud: {{$rep->created_at}}</td>
  </tr>
  <tr>
    <td>Compa&ntilde;ia: {{$rep->compania}}</td>
    <td width="50%">Tel&eacute;fono: {{$rep->telefono}}</td>
  </tr>
  <tr>
    <td>Correo eletr&oacute;nico: {{$rep->correo}}</td>
    <td width="50%">&nbsp;</td>
  </tr>
</table>
@endforeach @endif

<p>&nbsp; </p>
<table width="100%"  border="1" cellpadding="0" cellspacing="0" style="font-size:10px">
  <tr>
    <td colspan="5"><div align="center"><strong>Orden</strong></div></td>
  </tr>
  <tr>
    <td width="15%"><div align="center"><strong>C&oacute;digo</strong></div></td>
    <td width="20%"><div align="center"><strong>Nombre</strong></div></td>
    <td width="5%"><div align="center"><strong>Cantidad</strong></div></td>
    <td width="50%"><div align="center"><strong>Descripci&oacute;n</strong></div></td>
    <td width="10%"><div align="center"><strong>Precio</strong></div></td>
  </tr>
  @foreach($reporte as $rep2)
  <tr>
    <td><div align="center">{{$rep2->codigo}} </div></td>
    <td><div align="center">{{$rep2->tx_nombre}} </div></td>
    <td style="padding-left:5px; padding-right:5px"><div align="center">{{$rep->cantidad}}</div></td>
    <td><div align="center">{{$rep2->descripcion}}</div></td>
    <td><div align="center">{{$rep2->precio}}</div></td>
  </tr>
  @endforeach
</table>
</div>
<div class="footer">
  <table width="100%"  border="0">
   <tr>
    <td width="50%"><div align="center" class="Estilo6 Estilo7">REVISADO POR ASESOR </div></td>
    <td width="50%"><div align="center" class="Estilo8">APROBADO POR GERENTE </div></td>
  </tr>
</table>
</div>
