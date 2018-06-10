@extends('crudbooster::admin_template')
@section('content')
<div class="box box-default">
  <div class="box-body table-responsive no-padding">
    <table class="table table-bordered">
      <tbody>
        <tr class="active">
          <td colspan="3"><strong><i class="fa fa-bars"></i> FORMATO SALIDA MATERIALES E INSUMOS POR ORDEN MANUFACTURA</strong></td>
        </tr>
        <tr>
          <td width="20%">
            <!-- ************************************************************************ -->
            <div class="col-md-8">
              <strong>Orden de Manufactura: </strong>
              <select name="orden_id" id="orden_id" class="form-control">
              <?php $separador = '';?>
                <option value="0">Seleccione **</option>
                @foreach($combos as $rep)
                    @if($separador!=$rep->orden_id)
                      <option value="{{$rep->orden_id}}">Orden de Manufactura: {{$rep->orden_id}} &nbsp;&nbsp;Cliente: {{$rep->tx_nombre}} &nbsp;&nbsp;Fabricado Para: {{$rep->fabricado_para}}</option>
                      <?php $separador = $rep->orden_id;?>
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
  $("#orden_id").on('change',function(){
    if($("#orden_id").val()>0){
      actualizar()
    }else{
      $("#vistaPrevia").hide();
    }
  });
  function actualizar(){
    $("#vistaPrevia").show();
    $("#reporte").load('<?php echo url('/admin/PGP2_R5_REPORTE'); ?>',{
      orden_id:$("#orden_id").val()
    });
  }
  function descargar(){
    var orden_id=$("#orden_id").val();
    var descargar=1;
    var parametros='orden_id='+orden_id;
    location="<?php echo url('/admin/PGP2_R5_REPORTE_DESCARGAR'); ?>?"+parametros;
  }
</script>
@endsection