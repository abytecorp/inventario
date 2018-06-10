@extends('crudbooster::admin_template')
@section('content')
<div class="box box-default">
  <div class="box-body table-responsive no-padding">
    <table class="table table-bordered">
      <tbody>
        <tr class="active">
          <td colspan="3"><strong><i class="fa fa-bars"></i> Solicitud de Reparación</strong></td>
        </tr>
        <tr>
          <td width="20%">
            <!-- ************************************************************************ -->
            <div class="col-md-8">
              <strong>Orden de Reparación: </strong>
              <select name="orden_reparacion_id" id="orden_reparacion_id" class="form-control">
                <option value="0">Seleccione **</option>
                @foreach($combos as $rep)
                <option value="{{$rep->id}}">Orden Manufactura: {{$rep->orden_id}} VIN: {{$rep->tx_numero_vin}} Solicitante: {{$rep->tx_nombre}}</option>
                @endforeach
              </select>
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
  $("#orden_reparacion_id").on('change',function(){
    if($("#orden_reparacion_id").val()>0){
      actualizar()
    }else{
      $("#vistaPrevia").hide();
    }
  });
  function actualizar(){
    $("#vistaPrevia").show();
    $("#reporte").load('<?php echo url('/admin/PGR2_R2_REPORTE'); ?>',{
      orden_reparacion_id:$("#orden_reparacion_id").val()
    });
  }
  function descargar(){
    var orden_reparacion_id=$("#orden_reparacion_id").val();
    var descargar=1;
    var parametros='orden_reparacion_id='+orden_reparacion_id;
    location="<?php echo url('/admin/PGR2_R2_REPORTE_DESCARGAR'); ?>?"+parametros;
  }
</script>
@endsection