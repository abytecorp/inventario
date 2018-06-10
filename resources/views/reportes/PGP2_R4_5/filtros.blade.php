@extends('crudbooster::admin_template')
@section('content')
<div class="box box-default">
  <div class="box-body table-responsive no-padding">
    <table class="table table-bordered">
      <tbody>
        <tr class="active">
          <td><strong><i class="fa fa-bars"></i> FORMATO DE GASTO DE MATERIALES POR TALLA</strong></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>



<!-- ************************************************************************ -->
@include('reportes.botonDescargar')
<!-- ************************************************************************ -->




<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.js"></script>
<script>
  $(document).ready(function($) {
    actualizar();
  });
  function actualizar(){
    $("#vistaPrevia").show();
    var nada='';
    $("#reporte").load('<?php echo url('/admin/PGP2_R4_5_REPORTE'); ?>',{
      nada:nada
    });
  }
  function descargar(){
    location="<?php echo url('/admin/PGP2_R4_5_REPORTE_DESCARGAR'); ?>";
  }
</script>
@endsection