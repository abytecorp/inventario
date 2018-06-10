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
<div id="detalles"></div>
</section>



<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.js"></script>
<script>
$(document).ready(function(){
    iniciarTodo();
});
  $("#orden_id").change(function(){
    iniciarTodo();
  });
  function iniciarTodo(){
    $('#detalles').load("<?php echo url("/traerDetallesSalidaMaterialTrazabilidad"); ?>",{orden_id:$('#orden_id').val()});
  }

</script>
@endsection