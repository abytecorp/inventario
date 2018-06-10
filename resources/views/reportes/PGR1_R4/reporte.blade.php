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
</header>

<p><center><strong>Calificaci&oacute;n de 1 a 100 </strong></center></p>
<?php $separador = '';?>

@if(@$reporte) @foreach($reporte as $rep)
  @if($separador!=$rep->fecha_evaluacion)
    <?php $separador = $rep->fecha_evaluacion;?>
    <table width="100%"  border="1" cellpadding="0" cellspacing="0">
      <tr>
        <td height="27"><div align="center"><strong>Fecha: {{$rep->fecha_evaluacion}} </strong></div></td>
      </tr>
      <tr>
        <td>
          @foreach($reporte as $wer)
            @if($wer->fecha_evaluacion==$separador)
              <strong>{{$wer->tx_atributos}}: </strong>{{$wer->nu_puntaje}} &nbsp;&nbsp;&nbsp;&nbsp;
            @endif
          @endforeach
        </td>
      </tr>
    </table>
    <p>&nbsp;</p>
  @endif
@endforeach
@endif


<p>&nbsp; </p>
