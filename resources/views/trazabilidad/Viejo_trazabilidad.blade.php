<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')

<div>
  <p><a title="Return" href="{{ url('admin/trazabilidad') }}"><i class="fa fa-chevron-circle-left "></i> &nbsp; Volver a Trazabilidad</a></p>

  <div class="panel panel-default">
    <div class="panel-heading">
      <strong><i class="fa fa-glass"></i> Detalles</strong>
    </div>

    <div class="panel-body" style="padding:20px 0px 0px 0px">

      <input type="hidden" name="_token" value="hhRRsTM2P7p4RQCvn7RrBSLfqguAQjLDM7q55NMo">
      <div class="box-body" id="parent-form-area">

    <div class="bg-primary"><strong><h4 align="center">CONTROL DE CALIDAD Y TRAZABILIDAD</h4></strong></div>

<form class="form-horizontal">
  <div class="form-group header-group-0 " id="form-group-tx_nombre" style="">
    <label class="control-label col-sm-3 text-left">Codigo Cliente: </label>
    <div class="col-sm-3">
  <?php $i = 0;
$comparar  = '';?>
  @foreach($orden as $datos)
  @if($datos->tx_nombre != $comparar)
      <label class="control-label col-sm-6 text-left">{{ $datos->tx_nombre }}</label>
  <?php $comparar = $datos->tx_nombre;?>
  @endif
  @endforeach
    </div>
    <div class="col-sm-3">
      <label class="control-label col-sm-6 text-left">Traje Nro.:</label>
    </div>
    <div class="col-sm-3">
  <?php $i = 0;
$comparar  = '';?>
  @foreach($orden as $datos)
  @if($datos->co_orden != $comparar)
      <label class="control-label col-sm-6 text-left">{{ $datos->co_orden }}</label>
  <?php $comparar = $datos->co_orden;?>
  @endif
  @endforeach
    </div>
  </div>
</form>
<form class="form-horizontal">
  <div class="form-group header-group-0 " id="form-group-tx_nombre" style="">
    <label class="control-label col-sm-3 text-left">Fecha Inicio Manufactura:</label>
    <div class="col-sm-3">
  <?php $i = 0;
$comparar  = '';?>
  @foreach($orden as $datos)
  @if($datos->fe_inic_produccion != $comparar)
      <label class="control-label col-sm-6 text-left">{{ $datos->fe_inic_produccion }}</label>
  <?php $comparar = $datos->fe_inic_produccion;?>
  @endif
  @endforeach
    </div>
    <div class="col-sm-3">
      <label class="control-label col-sm-6 text-left">Codigo Orden:</label>
    </div>
    <div class="col-sm-3">
  <?php $i = 0;
$comparar  = '';?>
  @foreach($orden as $datos)
  @if($datos->co_orden != $comparar)
      <label class="control-label col-sm-6 text-left">{{ $datos->co_orden }}</label>
  <?php $comparar = $datos->co_orden;?>
  @endif
  @endforeach
    </div>
  </div>
</form>
<form class="form-horizontal">
  <div class="form-group header-group-0 " id="form-group-tx_nombre" style="">
    <label class="control-label col-sm-3 text-left">Fecha Fin Manufactura:</label>
    <div class="col-sm-3">
  <?php $i = 0;
$comparar  = '';?>
  @foreach($orden as $datos)
  @if($datos->fe_entrega != $comparar)
      <label class="control-label col-sm-6 text-left">{{ $datos->fe_entrega }}</label>
  <?php $comparar = $datos->fe_entrega;?>
  @endif
    @endforeach
    </div>
    <div class="col-sm-3">
      <label class="control-label col-sm-6 text-left"></label>
    </div>
    <div class="col-sm-3">
      <label class="control-label col-sm-6 text-left"></label>
    </div>
  </div>
</form>

<div class="bg-primary"><strong><h4 align="center">DETALLES DE LA ORDEN</h4></strong></div>
<form class="form-horizontal">
  <div class="form-group header-group-0 " id="form-group-tx_nombre" style="">
    <div class="col-sm-3">
      <label class="control-label col-sm-6 text-left">Modelo</label>
    </div>
    <div class="col-sm-1">
      <label class="control-label col-sm-6 text-left">Talla</label>
    </div>
    <div class="col-sm-1">
      <label class="control-label col-sm-6 text-left">Color</label>
    </div>
    <div class="col-sm-2">
      <label class="control-label col-sm-6 text-left">Marcaje</label>
    </div>
    <div class="col-sm-2">
      <label class="control-label col-sm-6 text-left">Reflectivo</label>
    </div>
    <div class="col-sm-3">
      <label class="control-label col-sm-6 text-left">Detalle</label>
    </div>
  </div>
</form>
  @foreach($orden as $datos)
      <form class="form-horizontal">
        <div class="form-group header-group-0 " id="form-group-tx_nombre" style="">
          <div class="col-sm-3">
            <label class="control-label col-sm-6 text-left">{{ $datos->tx_modelo }}</label>
          </div>
          <div class="col-sm-1">
            <label class="control-label col-sm-6 text-left">{{ $datos->tx_talla}}</label>
          </div>
          <div class="col-sm-1">
            <label class="control-label col-sm-6 text-left">{{ $datos->tx_color}}</label>
          </div>
          <div class="col-sm-2">
            <label class="control-label col-sm-6 text-left">{{ $datos->tx_marcaje}}</label>
          </div>
          <div class="col-sm-2">
            <label class="control-label col-sm-6 text-left">{{ $datos->tx_reflectivo}}</label>
          </div>
          <div class="col-sm-3">
            <label class="control-label col-sm-6 text-left">{{ $datos->tx_detalle }}</label>
          </div>
        </div>
      </form>
  @endforeach
<?php $i  = 1;
$comparar = '';
$compar   = '';?>

@foreach($detalle_trazabilidad as $datos)
<?php $comp = $datos->tx_producto_terminado . $datos->tx_talla . $datos->tx_color;?>
  @if($comp != $comparar)
    <div class="bg-primary"><strong><h4 align="center">Numero VIN {{ $datos->tx_numero_vin }} / {{ $datos->tx_producto_terminado }}</h4></strong></div>
    <form class="form-horizontal">
      <div class="form-group header-group-0 " id="form-group-tx_nombre" style="">
        <div class="col-sm-2">
          <label class="control-label col-sm-6 text-left">Material</label>
        </div>
        <div class="col-sm-2">
          <label class="control-label col-sm-6 text-left">Lote</label>
        </div>
      </div>
    </form>
  <?php $comparar = $comp;?>
  @endif

  @if($datos->id!= $compar)
      <form class="form-horizontal">
        <div class="form-group header-group-0 " id="form-group-tx_nombre" style="">
            <input id="detalle_trazabilidad_id{{$i}}" type="hidden" value="{{ $datos->id }}"></input>
          <div class="col-sm-2" style="align:center">
            <label class="control-label col-sm-6 text-left">{{ $datos->codigo }}</label>
          </div>
          <div class="col-sm-2">
            <input type="text" title="Nombre" required="" maxlength="255" class="form-control" name="lote{{$i}}" id="lote{{$i}}" value="">
          </div>
          <div class="col-sm-2">
            <button type="button" onclick="agregarLote('detalle_trazabilidad_id{{$i}}','lote{{$i}}','botones{{$datos->id}}')" class="btn btn-xs btn-primary btn-detail" title="Añadir" ><i class="fa fa-plus-circle"></i></button>
            <button id="mostrar{{ $i }}" type="button" onclick="mostrar('detalle_trazabilidad_id{{$i}}','botones{{$datos->id}}')" class="btn btn-xs btn-primary btn-detail busqueda" title="Añadir" ><i class="fa fa-eye"></i></button>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-6">
            <div id="botones{{$datos->id}}">
              @if(@$botonesLotes)
                @foreach($botonesLotes as $boton)
                  @if($datos->id==$boton->detalle_trazabilidad_id)
                    '<button type="button" id="' . $id . '" onclick="eliminarLote(\'' . $boton->lote . '\',\'' . $boton->detalle_trazabilidad_id . '\',\'botones' . $boton->detalle_trazabilidad_id . '\')" class = "label label-primary btn btn-md">' . $boton->lote . ' &nbsp;<i class="fa fa-times" aria-hidden="true"></i></button>&nbsp;'
                  @endif
                @endforeach
              @endif
            </div>
          </div>
        </div>
       </form>
      <?php $i++;
$compar = $datos->id;?>
  @endif
@endforeach
      </div>
        </div>
      </div>
    </div>
  </div>
@endsection


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.js"></script>
<script>
$( document ).ready(function(){
var arreglo=<?php echo json_encode($detalle_trazabilidad); ?>;
  for(var i=1;i<=arreglo.length;i++){
      $('#mostrar'+i).trigger('click');
      // alert(i);
    }
});


function mostrar(detalle_trazabilidad_id,botones){
   detalle_trazabilidad_id=$('#'+detalle_trazabilidad_id).val();
  $.post('<?php echo url('traerBotones'); ?>',{detalle_trazabilidad_id:detalle_trazabilidad_id},function(data){
      $('#'+botones).html(data);
    });
}
  // });
  function agregarLote(detalle_trazabilidad_id,lote,botones){
    detalle_trazabilidad_id=$('#'+detalle_trazabilidad_id).val();
    lote=$('#'+lote).val();
    $.post('<?php echo url('agregarLote'); ?>',{detalle_trazabilidad_id:detalle_trazabilidad_id,lote:lote},function(data){
      $('#'+botones).html(data);
    });
  }
  function eliminarLote(lote_id,detalle_trazabilidad_id,botones){
    // detalle_trazabilidad_id=$('#'+detalle_trazabilidad_id).val();
    // lote_id=$('#'+lote_id).val();
    $.post('<?php echo url('eliminarLote'); ?>',{detalle_trazabilidad_id:detalle_trazabilidad_id,lote_id:lote_id},function(data){
      $('#'+botones).html(data);
    });
  }
</script>