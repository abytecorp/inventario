@extends('crudbooster::admin_template')
@section('content')
<div class="box box-default">
  <div class="box-body table-responsive no-padding">
    <table class="table table-bordered">
      <tbody>
        <tr class="active">
          <td colspan="3"><strong><i class="fa fa-bars"></i> FORMULARIO ORDEN DE REPARACIONES E INSPECCIONES</strong></td>
        </tr>
        <tr>
          <td width="20%">
            <!-- ************************************************************************ -->
            <div>
              <strong>Tipo de Servicio: </strong>
              <select name="tipo_id" id="tipo_id" class="form-control">
                <option value="0">Seleccione **</option>
                <option value="1">Reparación</option>
                <option value="2">Inspección</option>
              </select>
            </div>
            <!-- ************************************************************************ -->
          </td>
          <td width="40%">
            <!-- ************************************************************************ -->
            <div>
              <strong>Orden de Reparación/Inpección: </strong>
              <select name="orden_servicio" id="orden_servicio" class="form-control">
                <option value="0">Seleccione **</option>
              </select>
            </div>
            <!-- ************************************************************************ -->
          </td>
          <td width="20%">
            <br>
            <!-- ************************************************************************ -->
            <a id="buscar" href="#" class="btn btn-success btn-sm"><i class="fa fa-search"></i></a>
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
    if(($("#tipo_id").val()>0)&&($("#orden_servicio").val()>0)){
      actualizar();
    }else{
      $("#vistaPrevia").hide();
      $("#orden_servicio").html('<select name="orden_servicio" id="orden_servicio" class="form-control"><option value="0">Seleccione **</option> </select>');
    }
  });
  $("#tipo_id").on('change',function(){
    if($("#tipo_id").val()>0){
      cargarComboOrdenes();
    }else{
      $("#vistaPrevia").hide();
      $("#orden_servicio").html('<select name="orden_servicio" id="orden_servicio" class="form-control"><option value="0">Seleccione **</option> </select>');
    }
  });
  function cargarComboOrdenes(){
    $("#orden_servicio").load("<?php echo url('/admin/PGP3_R3_QUERY'); ?>/0/"+$("#tipo_id").val());
  }
  function actualizar(){
    $("#vistaPrevia").show();
    $("#reporte").load('<?php echo url('/admin/PGP3_R3_REPORTE'); ?>',{
      tipo:$("#tipo_id").val(),
      orden_servicio:$("#orden_servicio").val()
    });
  }
  function descargar(){
    var tipo=$("#tipo_id").val();
    var orden_servicio=$("#orden_servicio").val();
    var descargar=1;
    var parametros='tipo='+tipo+'&orden_servicio='+orden_servicio;
    location="<?php echo url('/admin/PGP3_R3_REPORTE_DESCARGAR'); ?>?"+parametros;
  }
</script>
@endsection