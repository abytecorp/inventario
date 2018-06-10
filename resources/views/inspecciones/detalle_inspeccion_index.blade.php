<!-- First you need to extend the CB layout -->
@extends('crudbooster::admin_template')
@section('content')


<div>
	<p><a title="Return" href="{{ url('admin/orden_inspeccion') }}"><i class="fa fa-chevron-circle-left "></i> &nbsp; Volver al listado Ordenes de Inspección</a></p>       

	<div class="panel panel-default">
		<div class="panel-heading">
			<strong><i class="fa fa-glass"></i> Añadir Detalles</strong>
		</div> 

		<div class="panel-body" style="padding:20px 0px 0px 0px">
			
			<input type="hidden" name="_token" value="hhRRsTM2P7p4RQCvn7RrBSLfqguAQjLDM7q55NMo">    
			<div class="box-body" id="parent-form-area">

				<?php $i=0; $comparar=''; ?>
				@foreach($pruebas as $prueba)
				@if($prueba->clasificacion != $comparar)
				<div class="bg-primary"><strong><h4 align="center">{{ $prueba->clasificacion }}</h4></strong></div>
				<?php $comparar=$prueba->clasificacion ?>
				@endif
				<form class="form-horizontal"> 
					<div class="form-group header-group-0 " id="form-group-tx_nombre" style="">
						<label class="control-label col-sm-3 text-left">{{ $prueba->tx_prueba}} <span class="text-danger" title="This field is required">*</span></label>
						<div class="col-sm-2">
							<select class="form-control" name="indicador_pasa_id{{ $i }}" id="indicador_pasa_id{{ $i }}" required>
								<option value="0">** Seleccione</option>
								@foreach($indicador_pasa as $indicador)
								<option {{ ($indicador->id==$prueba->indicador_pasa_id)?"selected":"" }} value="{{ $indicador->id }}">{{ $indicador->tx_indicador }}</option>
								@endforeach
							</select>
							<div class="text-danger"></div>
							<p class="help-block"></p>
						</div>
						<div class="col-sm-6">
							<input type="text" placeholder="Detalle" title="Detalle" required="" class="form-control" name="detalle{{ $i }}" id="detalle{{ $i }}" value="{{ $prueba->detalle }}">
							<div class="text-danger"></div>
							<p class="help-block"></p>
						</div>
						<div class="col-sm-1" id="boton{{ $i }}">
							<button type="button" onclick="guardar('{{ $prueba->id }}','indicador_pasa_id{{ $i }}','detalle{{ $i }}','{{ $prueba->tx_prueba}}','boton{{ $i }}');" class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i></button>
						</div>
					</div>
				</form>

				{{-- {{ $prueba->id}} :  <br> --}}

				<?php $i++; ?>
				@endforeach


			</div><!-- /.box-body -->

{{-- 				<div class="box-footer" style="background: #F5F5F5">  

					<div class="form-group">
						<label class="control-label col-sm-2"></label>
						<div class="col-sm-10">

							<a href="http://localhost:8000/admin/modelo_material" class="btn btn-default"><i class="fa fa-chevron-circle-left"></i> Volver</a>


							<input type="submit" name="submit" value="Guardar y Añadir otro" class="btn btn-success">

							<input type="submit" name="submit" value="Guardar" class="btn btn-success">

						</div>
					</div>                             

					--}}

				</div><!-- /.box-footer-->


			</div>
		</div>
	</div>



	@endsection

	<script>
		function guardar(id,indicador_pasa_id,detalle,nombre,boton){
			indicador_pasa_id=$('#'+indicador_pasa_id).val();
			detalle=$('#'+detalle).val();
			if(indicador_pasa_id==0){
				alert("Debe seleccionar un Indicador para: "+nombre);
				$('#'+indicador_pasa_id).select();
			}else if((detalle=='')&&(indicador_pasa_id == 2)){
				alert("Debe ingresar el Detalle para: "+nombre);
				$('#'+detalle).focus();
			}else{
				if(indicador_pasa_id == 1)
				{
					detalle="-";
				}
				$.post('<?php echo url('tareas'); ?>',{id:id,indicador_pasa_id:indicador_pasa_id,detalle:detalle},function(data){
					// $('#'+boton).hide();
					$('#'+boton).html(data);
				});
			}

		}
	</script>

