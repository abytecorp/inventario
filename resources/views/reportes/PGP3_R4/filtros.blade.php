@extends('crudbooster::admin_template')
@section('content')
<div class="box box-default">
  <div class="box-body table-responsive no-padding">
    <table class="table table-bordered">
      <tbody>
        <tr class="active">
          <td colspan="3"><strong><i class="fa fa-bars"></i> Formato de Inspección</strong></td>
        </tr>
        <tr>
          <td width="20%">
            <!-- ************************************************************************ -->
            <div class="col-md-8">
              <strong>Orden de Inpección: </strong>
              <select name="orden_inspeccion_id" id="orden_inspeccion_id" class="form-control">
              <?php $separador = '';?>
                <option value="0">Seleccione **</option>
                @foreach($combos as $rep)
                    @if($separador!=$rep->orden_inspeccion_id)
                      <option value="{{$rep->orden_inspeccion_id}}">Orden de Inspección: {{$rep->orden_inspeccion_id}} &nbsp;&nbsp;Orden de Manufactura: {{$rep->orden}} &nbsp;&nbsp;Modelo: {{$rep->modelo}}  &nbsp;&nbsp;Talla: {{$rep->talla}}&nbsp;&nbsp;VIN: {{$rep->serial}}</option>
                      <?php $separador = $rep->orden_inspeccion_id;?>
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
  $("#orden_inspeccion_id").on('change',function(){
    if($("#orden_inspeccion_id").val()>0){
      actualizar()
    }else{
      $("#vistaPrevia").hide();
    }
  });
  function actualizar(){
    $("#vistaPrevia").show();
    $("#reporte").load('<?php echo url('/admin/PGP3_R4_REPORTE'); ?>',{
      orden_inspeccion_id:$("#orden_inspeccion_id").val()
    });
  }
  function descargar(){
    var orden_inspeccion_id=$("#orden_inspeccion_id").val();
    var descargar=1;
    var parametros='orden_inspeccion_id='+orden_inspeccion_id;
    location="<?php echo url('/admin/PGP3_R4_REPORTE_DESCARGAR'); ?>?"+parametros;
  }
</script>
@endsection