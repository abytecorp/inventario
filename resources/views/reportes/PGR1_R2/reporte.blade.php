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
  blockuote {font-size: 10px}
  </style>
<div class="footer"></div>
<header>
  <table width="100%" border="1" cellpadding="0" cellspacing="0" style="vertical-align:middle;font-weight:bold;text-align:center;">
    <tr>
      <!-- Empresa -->
      <td width="29%"><span class="Estilo5">3MS DISPROMEDICAL SAS</span></td>
      <td colspan="2"><span class="Estilo5">EVALUACION INICIAL Y REGISTRO DEL PROVEEDOR</span></td>
      <td width="30%"><img src="logo.png" alt="Línea de Fuego" style="width:200px"></td>
    </tr>
    <tr>
      <td width="29%"><span class="Estilo3"> C&oacute;digo: PGP1 R2</span></td>
      <td width="15%"><span class="Estilo3">Versi&oacute;n: 1 </span></td>
      <td width="26%"><span class="Estilo3">Vigente desde: 15/09/2017</span></td>
      <td width="30%" class="Estilo3">Página <span class="pagenum"></span></td>
    </tr>
  </table>
</header>
<br>
@if(@$reporte) @foreach($reporte as $qwe)
<table width="100%"  border="1" cellpadding="0" cellspacing="0" bordercolor="#999999">

  <tr class="Estilo6">
    <td width="10%" height="14"><div align="center"><strong>{{$qwe->tipo_registro}}</strong></div></td>
    <td width="10%"><div align="center"> Fecha: {{$qwe->fecha}} </div></td>
  </tr>
</table>
<br>
<table width="100%"  border="1" cellpadding="0" cellspacing="0" bordercolor="#999999">
  <tr bgcolor="#CCCCCC">
    <td><div align="center" class="Estilo6"><strong>INFORMACI&Oacute;N GENERAL </strong></div></td>
  </tr>
  <tr class="Estilo6">
    <td width="40%"><table width="90%"  border="0" align="center">
      <tr>
        <td colspan="2">RAZ&Oacute;N SOCIAL: {{$qwe->razon_social}}</td>
      <td colspan="2">NOMBRE COMERCIAL: {{$qwe->nombre_comercial}}</td>
        </tr>
      <tr>
        <td colspan="4">IDENTIFICACI&Oacute;N TRIBUTARIA: {{$qwe->identificacion_tributaria }} {{$qwe->nu_tributaria}}</td>
      </tr>
      <tr>
        <td colspan="2">DIRECCI&Oacute;N: {{$qwe->direccion}}</td>
      <td colspan="2">CIUDAD: {{$qwe->ciudad}}</td>
      </tr>
      <tr>
        <td width="31%">TEL&Eacute;FONO: {{$qwe->telefono}}</td>
      <td colspan="2">CELULAR: {{$qwe->celular}}</td>
        <td width="30%">FAX: {{$qwe->fax}}</td>
      </tr>
      <tr>
        <td colspan="4">EMAIL: {{$qwe->email}}</td>
      </tr>
    </table></td>
  </tr>
</table>
<br>
<table width="100%"  border="1" cellpadding="0" cellspacing="0" bordercolor="#999999">
  <tr bgcolor="#CCCCCC">
    <td colspan="2"><div align="center" class="Estilo6"><strong>INFORMACI&Oacute;N TRIUTARIA</strong></div></td>
  </tr>
  <tr class="Estilo6">
    <td width="50%"><div align="justify">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;R&Eacute;GIMEN DE IVA: {{$qwe->regimen_iva}} RESOL. N&deg;: {{$qwe->regimen_iva_resol}}
</div></td>
    <td width="50%"><div align="justify">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
GRAN CONTRIBUYENTE: {{$qwe->gran_contribuyente}} RESOL. N&deg;: {{$qwe->gran_contribuyente_resol}}</div></td>
  </tr>
  <tr class="Estilo6">
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
AGENTE RETENEDOR: {{$qwe->agente_retenedor}} RESOL N&deg;: {{$qwe->agente_retenedor_resol}} </td>
  <td width="50%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
RETENCI&Oacute;N EN LA FUENTE: {{$qwe->retencion_fuente}}</td>
  </tr>
  <tr class="Estilo6">
    <td><div align="justify">
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ACTIVIDAD ECON&Oacute;MICA PRINCIPAL: {{$qwe->actividad_principal}} </div></td>
  <td width="50%"><div align="justify">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;C&Oacute;DIGO ACTIVIDAD: {{$qwe->codigo_actividad_principal}}</div></td>
  </tr>
</table>
<br>
<table width="100%"  border="1" cellpadding="0" cellspacing="0" bordercolor="#999999">
  <tr bgcolor="#CCCCCC">
    <td><div align="center" class="Estilo6"><strong>INFORMACI&Oacute;N COMERCIAL </strong></div></td>
  </tr>
  <tr class="Estilo6">
    <td width="40%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DESCRIPCIÓN ESPECÍFICA DE LOS BIENES Y/O SERVICIOS: {{$qwe->tx_observacion}}</td>
  </tr>
</table>
<br>
<table width="100%"  border="1" cellpadding="0" cellspacing="0" bordercolor="#999999">
  <tr bgcolor="#CCCCCC">
    <td><div align="center" class="Estilo6"><strong>INFORMACI&Oacute;N - TRANSFERENCIA DE PAGO </strong></div></td>
  </tr>
  <tr class="Estilo6">
    <td width="40%"><table width="90%"  border="0" align="center">
        <tr>
          <td colspan="2">BANCO: {{$qwe->banco}}</td>
        </tr>
        <tr>
          <td width="60%">N&deg; DE CUENTA : {{$qwe->identificacion_tributaria }} {{$qwe->nu_cuenta}}</td>
        <td width="30%">TIPO DE CUENTA: {{$qwe->tipo_cuenta}}</td>
        </tr>
        <tr>
          <td width="60%">NOMBRE: {{$qwe->tx_nombre_cuenta}}</td>
        <td width="30%">CC. N&deg;: {{$qwe->nu_cc}} </td>
        </tr>
    </table></td>
  </tr>
</table>
<br>
<table width="100%"  border="1" cellpadding="0" cellspacing="0" bordercolor="#999999">
  <tr bgcolor="#CCCCCC">
    <td><div align="center" class="Estilo6"><strong>DOCUMENTOS A ANEXAR </strong></div></td>
  </tr>
  <tr class="Estilo6">
    <td width="40%"><table width="90%"  border="0" align="center">
        <tr>
          <td width="90%">TRANSFERENCIA BANCARIA Y ORDEN DE COMPRA </td>
        </tr>
    </table></td>
  </tr>
</table>
@endforeach
<div class="footer">
  <table width="100%"  border="0">
    <tr>
    <td width="50%"><div align="center" class="Estilo6 Estilo7">REVISADO POR ASESOR </div></td>
    <td width="50%"><div align="center" class="Estilo6">APROBADO POR GERENTE </div></td>
    </tr>
  </table>
</div>
@endif
