@extends('crudbooster::admin_template')
@section('content')
<div class="box box-default">
  <div class="box-body table-responsive no-padding">
    <table class="table table-bordered">
      <tbody>
        <tr class="active">
          <td colspan="3"><strong><i class="fa fa-bars"></i> PLAN DE MANTENIMIENTO PREVENTIVO</strong></td>
        </tr>
        <tr>
          <td width="20%">
            <!-- ************************************************************************ -->
            <div class="col-md-8">
              <strong>Año: </strong>
              <select name="anio_id" id="anio_id" class="form-control">
                <option value="0">Seleccione **</option>
                @foreach($combos as $rep)
                <option value="{{$rep->id}}">Compañía: {{$rep->anio}}</option>
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
  $("#anio_id").on('change',function(){
    if($("#anio_id").val()>0){
      actualizar()
    }else{
      $("#vistaPrevia").hide();
    }
  });
  function actualizar(){
    $("#vistaPrevia").show();
    $("#reporte").load('<?php echo url('/admin/PGR2_R1_REPORTE'); ?>',{
      anio_id:$("#anio_id").val()
    });
  }
  function descargar(){
    var anio_id=$("#anio_id").val();
    var descargar=1;
    var parametros='anio_id='+anio_id;
    location="<?php echo url('/admin/PGR2_R1_REPORTE_DESCARGAR'); ?>?"+parametros;
  }
</script>
@endsection