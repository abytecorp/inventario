@if(count($lotes)>0)
<hr>
<h4>Dar Salida al Material</h4>
<div class="row">
  <div class="col-md-12">
    <form class="form-inline" autocomplete="off">
      <div class="form-group">
        <select class="form-control" name="registro_detalle_entrada_mat_id" id="registro_detalle_entrada_mat_id">
          <option value="0" selected>** Seleccione</option>
          @foreach($lotes as $lote)
          <option value="{{ $lote->id }}">{{ $lote->lote }}</option>
          @endforeach
        </select>
        <div class="input-group col-md-2">
          <input type="hidden" class="form-control" name="disponibles" id="disponibles" value="">
          <input type="hidden" class="form-control" name="faltaEntregar" id="faltaEntregar" value="{{$faltaEntregar}}">
          <input type="hidden" class="form-control" name="salida_orden_material_id" id="salida_orden_material_id" value="{{ $salida_orden_material_id }}">
          <input type="text" class="form-control" name="cantidad" id="cantidad" placeholder="{{$faltaEntregar}}" value="">
        </div>
        <!-- <button id="botonCancelar" onclick="botonSacarInicial('{{ $salida_orden_material_id }}','{{ $nombreInput }}','{{ $material_id }}')" type="button" class="btn btn-default btn-sm">
          <i class="fa fa-times" aria-hidden="true"></i>
          Cancelar
        </button> -->
        <button id="botonCancelar" type="button" class="btn btn-default btn-sm">
          <i class="fa fa-times" aria-hidden="true"></i>
          Cancelar
        </button>
        <button id="botonSacarMaterial" type="button" class="btn btn-success btn-sm">
          Sacar
          <i class="fa fa-external-link" aria-hidden="true"></i>
        </button>
      </div>
    </form>
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->

<div id="disponible" class="text-success"></div>
<hr>
@else
No Hay Lotes de Este material
@endif

<!-- <script type="text/javascript" src="{{asset('js/jquery3.0.0.js')}}"></script> -->
<script>
  var click=0;
$("#botonCancelar").click(function(){
  location.reload();
});
  $('#disponible').html('');
  $('#botonSacarMaterial').click(function(){
    if(($('#registro_detalle_entrada_mat_id').val()==0)||(!$('#cantidad').val()>0)){
      alert("Debe rellenar la informacion");
    }else{
      if(click==0){
        click=1
        $('#botonSacarMaterial').click(false);
        var salida_orden_material_id=$('#salida_orden_material_id').val();
        var registro_detalle_entrada_mat_id=$('#registro_detalle_entrada_mat_id').val();
        var cantidad=$('#cantidad').val();
        $('#botonSacarMaterial').hide();
        $('#botonCancelar').hide();
        $('#salida_orden_material_id').hide();
        $('#registro_detalle_entrada_mat_id').hide();
        $('#cantidad').hide();
        $.post("<?php echo url("/darSalidaMaterial"); ?>",{
          salida_orden_material_id:salida_orden_material_id,
          registro_detalle_entrada_mat_id:registro_detalle_entrada_mat_id,
          cantidad:cantidad
        },function(data){
        //iniciarTodo();
        // console.log(data)
        location.reload();
      });
      }
    }
  });
  $('#registro_detalle_entrada_mat_id').on('change', function() {
    if(this.value==0){
      $('#disponible').html('');
      $('#disponibles').val('');
    }else if(this.value>0){
      $('#disponible').load("<?php echo url("/taerCantDisponibleLoteEntrada"); ?>",
        {id:$('#registro_detalle_entrada_mat_id').val()},
        function(data){
          if(data){
            $('#disponibles').val('');
            $('#disponibles').val(data);
            $('#disponible').html('');
            $('#disponible').html('Este lote tiene <strong>'+data+'</strong>');
          }else{
            alert('Problema con conexion a internet. Por favor presione el boton aceptar y luego presione la tecla f5 de su teclado');
          }
        });
    }
  });
  $('#cantidad').on('keyup', function() {
    // if(this.value>parseFloat($('#disponibles').val())||this.value>parseFloat($('#faltaEntregar').val())){
      if(this.value>parseFloat($('#disponibles').val())){
        alert("Debe ingresar una cantidad menor");
        alert($('#faltaEntregar').val());
        this.value="";
        this.focus();
      }
    });
  </script>