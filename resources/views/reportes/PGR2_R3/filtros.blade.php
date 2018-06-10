@extends('crudbooster::admin_template')
@section('content')
<div class="box box-default">
  <div class="box-body table-responsive no-padding">
    <table class="table table-bordered">
      <tbody>
        <tr class="active">
          <td colspan="3"><strong><i class="fa fa-bars"></i> PROGRAMA DE VERIFICACIÓN Y CALIBRACIÓN</strong></td>
        </tr>
        <tr>
          <td width="20%">
            <!-- ************************************************************************ -->
            <div class="col-md-8">
              <strong>Ver programa de verificación y calibración </strong>
            <a id="buscar" href="#" class="btn btn-success btn-sm"><i class="fa fa-search"></i></a>
            </div>
            <!-- ************************************************************************ -->
          </td>
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
    //actualizar();
    // $("#vistaPrevia").hide();
  });
  $("#buscar").on('click',function(){
      actualizar()
  });
  function actualizar(){
    $("#vistaPrevia").show();
    var parametros='';
    $("#reporte").load('<?php echo url('/admin/PGR2_R3_REPORTE'); ?>',{parametros:parametros});
  }
  function descargar(){
    location="<?php echo url('/admin/PGR2_R3_REPORTE_DESCARGAR'); ?>";
  }
</script>
@endsection