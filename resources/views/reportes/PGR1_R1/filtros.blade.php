@extends('crudbooster::admin_template')
@section('content')
<div class="box box-default">
  <div class="box-body table-responsive no-padding">
    <table class="table table-bordered">
      <tbody>
        <tr class="active">
          <td colspan="3"><strong><i class="fa fa-bars"></i> Reporte de Bienes y Servicios: Filtros</strong></td>
        </tr>
        <tr>
          <td width="20%">
            <!-- ************************************************************************ -->
            <div class="col-md-4">
              <strong>Nit: </strong>
              <select name="nit" id="nit" class="form-control">
                <option value="0">Todos</option>
                @foreach($combos as $rep)
                <option value="{{$rep->nit}}">{{$rep->nit}}</option>
                @endforeach
              </select>
            </div>
            <!-- ************************************************************************ -->
            <!-- ************************************************************************ -->
            <div class="col-md-4">
              <strong>Nombre: </strong>
              <select name="nombre" id="nombre" class="form-control">
                <option value="0">Todos</option>
                @foreach($combos as $rep)
                <option value="{{$rep->nombre}}">{{$rep->nombre}}</option>
                @endforeach
              </select>
            </div>
            <!-- ************************************************************************ -->
            <!-- ************************************************************************ -->
            <div class="col-md-4">
              <strong>Bien / Servicio: </strong>
              <?php $comparar = '';?>
              <select name="bien_servicio_id" id="bien_servicio_id" class="form-control">
                <option value="0">Todos</option>
                @foreach($combos as $rep)
                  @if($comparar!=$rep->bien_servicio_id)
                    <option value="{{$rep->bien_servicio_id}}">{{$rep->bien_servicio}}</option>
                    <?php $comparar = $rep->bien_servicio_id;?>
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
    actualizar();
  });
  $("#nit").on('change',function(){actualizar()});
  $("#nombre").on('change',function(){actualizar()});
  $("#bien_servicio_id").on('change',function(){actualizar()});
  function actualizar(){
    $("#reporte").load('<?php echo url('/admin/PGR1_R1_REPORTE'); ?>',{
      nit:$("#nit").val(),
      nombre:$("#nombre").val(),
      bien_servicio_id:$("#bien_servicio_id").val()
    });
  }
  function descargar(){
    var nit=$("#nit").val();
    var nombre=$("#nombre").val();
    var bien_servicio_id=$("#bien_servicio_id").val();
    var descargar=1;
    var parametros='nit='+nit+'&nombre='+nombre+'&bien_servicio_id='+bien_servicio_id+'&descargar=1';
    location="<?php echo url('/admin/PGR1_R1_REPORTE_DESCARGAR'); ?>?"+parametros;
  }
</script>
@endsection