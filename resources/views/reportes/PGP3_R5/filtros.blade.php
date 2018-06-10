@extends('crudbooster::admin_template')
@section('content')
<div class="box box-default">
  <div class="box-body table-responsive no-padding">
    <table class="table table-bordered">
      <tbody>
        <tr class="active">
          <td colspan="3"><strong><i class="fa fa-bars"></i> Formato de Reparaciones</strong></td>
        </tr>
        <tr>
          <td width="20%">
            <!-- ************************************************************************ -->
            <div class="col-md-8">
              <strong>Orden de Reparación: </strong>
              <select name="orden_reparacion_id" id="orden_reparacion_id" class="form-control">
              <?php $separador = '';?>
                <option value="0">Seleccione **</option>
                @foreach($combos as $rep)
                    @if($separador!=$rep->orden_reparacion_id)
                      <option value="{{$rep->orden_reparacion_id}}">Orden de Reparación: {{$rep->orden_reparacion_id}} &nbsp;&nbsp;Orden de Manufactura: {{$rep->orden_manufactura_id}} &nbsp;&nbsp;Modelo: {{$rep->modelo}}  &nbsp;&nbsp;Talla: {{$rep->talla}}&nbsp;&nbsp;VIN: {{$rep->serial}}</option>
                      <?php $separador = $rep->orden_reparacion_id;?>
                    @endif
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
    $("#reporte").load('<?php echo url('/admin/PGP3_R5_REPORTE'); ?>',{
      orden_reparacion_id:$("#orden_reparacion_id").val()
    });
  }
  function descargar(){
    var orden_reparacion_id=$("#orden_reparacion_id").val();
    var descargar=1;
    var parametros='orden_reparacion_id='+orden_reparacion_id;
    location="<?php echo url('/admin/PGP3_R5_REPORTE_DESCARGAR'); ?>?"+parametros;
  }
</script>
@endsection