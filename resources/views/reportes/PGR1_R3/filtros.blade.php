@extends('crudbooster::admin_template')
@section('content')
<div class="box box-default">
  <div class="box-body table-responsive no-padding">
    <table class="table table-bordered">
      <tbody>
        <tr class="active">
          <td colspan="3"><strong><i class="fa fa-bars"></i> Solicitud de Bienes y Servicios: Filtrar</strong></td>
        </tr>
        <tr>
          <td width="20%">
            <!-- ************************************************************************ -->
            <div class="col-md-8">
              <strong>Proveedor: </strong>
              <select name="proveedor_id" id="proveedor_id" class="form-control">
                <option value="0">Seleccione **</option>
                @foreach($combos as $rep)
                <option value="{{$rep->proveedor_id}}">Compañía: {{$rep->nombre}} &nbsp;&nbsp;Contacto: {{$rep->compania}}</option>
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
  $("#proveedor_id").on('change',function(){
    if($("#proveedor_id").val()>0){
      actualizar()
    }else{
      $("#vistaPrevia").hide();
    }
  });
  function actualizar(){
    $("#vistaPrevia").show();
    $("#reporte").load('<?php echo url('/admin/PGR1_R3_REPORTE'); ?>',{
      proveedor_id:$("#proveedor_id").val()
    });
  }
  function descargar(){
    var proveedor_id=$("#proveedor_id").val();
    var descargar=1;
    var parametros='proveedor_id='+proveedor_id;
    location="<?php echo url('/admin/PGR1_R3_REPORTE_DESCARGAR'); ?>?"+parametros;
  }
</script>
@endsection