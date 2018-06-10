<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')
<!-- Your custom  HTML goes here -->
<section id="content_section" class="content">
  <p><a href="http://lineadfuego.com.co/inventario/admin/trazabilidad"><i class="fa fa-chevron-circle-left"></i> &nbsp; Volver a Trazabilidad</a></p>
  <div class="box box-default">
    <div class="box-body table-responsive no-padding">
      <table class="table table-bordered">
        <tbody>
          <tr class="active">
            <td colspan="2"><strong><i class="fa fa-bars"></i> Datos</strong></td>
          </tr>
          <tr>
            <td width="25%"><strong>
             <span class="text-right">Orden Manufactura</span>
           </strong></td>
           <td>
           <input type="hidden" name="orden_id" id="orden_id" readonly value="{{$id}}">

              @foreach($ordenes as $orden)
                @if($orden->id==$id)
                  N° Orden: {{ $orden->id }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  Cliente: {{ $orden->tx_nombre }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  Contrato: {{ $orden->tx_contrato }}
                @endif
              @endforeach
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  </div>
<!-- DETALLES DE LA ORDEN DE MANUFACTURA PARA LA SALIDA DE MATERIALES -->
  <div class="box box-default">
    <div class="box-body table-responsive no-padding">
      <table class="table table-bordered">
        <tbody>
          <tr class="active">
            <td colspan="2"><strong><i class="fa fa-bars"></i> Materiales requeridos para la Producción</strong></div></td>
          </tr>
          <tr>
            <td colspan="2">
              @if(@count($totalRequerido)>0)
              <div>
                <table width="100%" class="table table-bordered">
                  <thead>
                    <tr>
                      <td width="30%"><strong>Material</strong></td>
                      <td width="10%"><strong>Disponible</strong></td>
                      <td width="10%"><strong>Requerido</strong></td>
                      <td width="10%"><strong>Entregado</strong></td>
                      <td width="10%"><strong>Por Entregar</strong></td>
                      <td width="30%"><strong>Detalle Entregado</strong></td>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $entregado = 0;?>
                    @foreach($totalRequerido as $t)
                    <?php $orden_id = $t->orden_id;?>
                    <tr>
                      <td>{{$t->tx_descripcion}}</td>
                      <td>{{$t->nu_disponible}}</td>
                      <td>{{$t->cant_requerida_material}}</td>
                      <td>
                        @if(@$totalEntregado)
                        @foreach($totalEntregado as $te)
                        @if($t->material_id==$te->material_id)
                        {{$entregado=$te->entregado}}
                        @else
                        0
                        @endif
                        @endforeach
                        @else
                        0
                        @endif
                      </td>
                      <td>{{$t->cant_requerida_material-$entregado}}<?php $entregado = 0;?></td>
                      <td>
                        @if(@$detalleEntregado)
                          @foreach($detalleEntregado as $detal)
                            @if($t->material_id==$detal->material_id)
                              <span class="bg-success">
                                <strong>Lote: </strong>{{$detal->lote}} <strong>Cant.: </strong>{{$detal->entregado}}
                              </span>&nbsp;&nbsp;&nbsp;
                            @endif
                          @endforeach
                        @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
             </td>
           @endif
          </tr>
          <?php $subtitulo = '';
$i                         = 0;?>
          @foreach($detalles as $detalle)
          <?php

$separador = "(" . $detalle->modelo_cantidad . ") &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
$separador .= $detalle->tx_modelo . ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
$separador .= $detalle->tx_producto_terminado . ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
$separador .= ' Talla: ' . $detalle->tx_talla . ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
$separador .= ' Color: ' . $detalle->tx_color . ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
$separador .= ' VIN: ' . $detalle->tx_numero_vin . ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
?>
          @if($subtitulo!=$separador)
          <?php $subtitulo = $separador;?>
          <tr>
            <td colspan="2"><div class="bg-primary"><center><strong>{{ $separador }}</strong></center></div></td>
          </tr>
          <tr>
            <td class="text-center"><strong>Material</strong></td>
            <td class="text-center"><strong>Salida</strong></td>
          </tr>
          @endif
          <tr>
            <td width="50%">
             <span class="text-right">
              <strong>{{ $detalle->codigo }}</strong>
              {{ $detalle->tx_descripcion }}.
              <strong>Se requieren:
                <?php
$requerida = $detalle->cant_requerida_material * $detalle->modelo_cantidad;
?>
                {{ $requerida }}
              </strong>
            </span>
            <div>
              <strong>Se entregaron:</strong>
              @if(@$detalMatEntregado)
                <?php $x = 0;?>
                @foreach($detalMatEntregado as $totalen)
                  @if($detalle->id==$totalen->salida_orden_material_id)
                    <?php $x = $totalen->entregado;?>
                  @endif
                @endforeach
                {{$x}}
              @endif
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <strong>Fatan:</strong>
<?php
$faltan = 0;
$faltan = $requerida - $x;
?>
                {{$faltan}}
            </div>
<div id="sacarMaterial{{ $i }}{{ $detalle->material_id }}">
  @if($detalle->nu_disponible>0)
  <button onclick="mostrarFormSacarMaterial('{{ $detalle->id }}','sacarMaterial{{ $i }}{{ $detalle->material_id }}','{{ $detalle->material_id }}')" id="botonSacarMaterial{{ $i }}{{ $detalle->material_id }}" type="button" class="btn btn-success btn-sm">
    Sacar Material<i class="fa fa-external-link" aria-hidden="true"></i>
  </button>
  @else
  No hay materiales Disponibles
  @endif
</div>
           </td>
<!-- ************************************************************************* -->
          <td>

<!-- ************************************************************************* -->

@if(@$detalMatEntregado)
  <div >

    @foreach($detalMatEntregadoTraza as $detalleSacado)
      @if($detalle->id==$detalleSacado->salida_orden_material_id)
        <button onclick="eliminarSalida('<?php echo $detalleSacado->salida_orden_material_id; ?>','<?php echo $detalleSacado->lote; ?>','<?php echo $detalleSacado->cantidad; ?>','<?php echo $detalleSacado->material_id; ?>')" class="label label-default btn btn-md">
          Lote: {{$detalleSacado->lote}} &nbsp;
          Cant: {{$detalleSacado->cantidad}} &nbsp;
          <i class="fa fa-trash text-warning" aria-hidden="true"></i>
        </button>&nbsp;&nbsp;
      @endif
    @endforeach
  </div>
@endif


          <!-- ************************************************************************* -->


          </td>
        </tr>
        <?php $i++;?>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<script>
  function eliminarSalida(salida_orden_material_id,lote,cantidad,material_id){
    $.ajax({
      url: '<?php echo url('/devolverMatSacado'); ?>',
      type: 'POST',
      dataType: 'html',
      data: {salida_orden_material_id:salida_orden_material_id,lote:lote,cantidad:cantidad,material_id:material_id},
    })
    .done(function(data) {
      // alert("Listo, material devuelto al lote");
      //iniciarTodo();
      location.reload();
    })
  }
  function mostrarFormSacarMaterial(salida_orden_material_id,nombreInput,material_id){//Acá concatené $i y material_id
    $('#'+nombreInput).load("<?php echo url("/traerFormularioSacarMaterial"); ?>",{material_id:material_id,nombreInput:nombreInput,salida_orden_material_id:salida_orden_material_id});
  }
  function botonSacarInicial(salida_orden_material_id,nombreInput,material_id){
    $('#'+nombreInput).html('<button onclick="mostrarFormSacarMaterial(\''+salida_orden_material_id+'\',\''+nombreInput+'\',\'{{ $detalle->material_id }}\')" id="botonSacarMaterial'+material_id+'" type="button" class="btn btn-success btn-sm">Sacar Material <i class="fa fa-external-link" aria-hidden="true"></i> </button>');
  }
</script>
</section>



<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.js"></script>
<script>
$(document).ready(function(){
    //iniciarTodo();
});
  $("#orden_id").change(function(){
    //iniciarTodo();
  });
  function iniciarTodo(){
    $('#detalles').load("<?php echo url("/traerDetallesSalidaMaterialTrazabilidad"); ?>",{orden_id:$('#orden_id').val()});
  }

</script>
@endsection