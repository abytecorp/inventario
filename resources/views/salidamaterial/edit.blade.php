  <div class="box box-default">
    <div class="box-body table-responsive no-padding">
      <table class="table table-bordered">
        <tbody>
          <tr class="active">
            <td colspan="2"><strong><i class="fa fa-bars"></i> Materiales requeridos para la Producción</strong></td>
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
$separador .= ' Número VIN: ' . $detalle->tx_numero_vin . ' &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
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
          </td>
          <td>
            @if($faltan>0)
            {{ $detalle->tx_descripcion }}
            <strong>Disponibles: {{ $detalle->nu_disponible }}</strong><br>

            <div id="sacarMaterial{{ $i }}{{ $detalle->material_id }}">
              @if($detalle->nu_disponible>0)
              <button onclick="mostrarFormSacarMaterial('{{ $detalle->id }}','sacarMaterial{{ $i }}{{ $detalle->material_id }}','{{ $detalle->material_id }}')" id="botonSacarMaterial{{ $i }}{{ $detalle->material_id }}" type="button" class="btn btn-success btn-sm">
                Sacar Material <i class="fa fa-external-link" aria-hidden="true"></i>
              </button>
              @else
              No hay materiales Disponibles
              @endif
            </div>
            @else
            <span class="text-success"><i class="fa fa-check-circle"></i> Ya se entregó todo el material requerido</span>
            @endif
          </td>
        </tr>
        <?php $i++;?>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<script>
  function mostrarFormSacarMaterial(salida_orden_material_id,nombreInput,material_id){//Acá concatené $i y material_id
    if($("#registro_detalle_entrada_mat_id").val()>=0){
      alert("Ya hay un formulario abierto. Debe sacar un material a la vez!");
    }else{
      $('#'+nombreInput).load("<?php echo url("/traerFormularioSacarMaterial"); ?>",{material_id:material_id,nombreInput:nombreInput,salida_orden_material_id:salida_orden_material_id});
    }
  }
</script>