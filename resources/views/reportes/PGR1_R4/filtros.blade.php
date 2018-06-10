@extends('crudbooster::admin_template')
@section('content')
<div class="box box-default">
	<div class="box-body table-responsive no-padding">
		<table class="table table-bordered">
			<tbody>
				<tr class="active">
					<td colspan="4"><strong><i class="fa fa-bars"></i> CONTROL RECEPCIÓN Y EVALUACIÓN DE PROVEEDORES</strong></td>
				</tr>
				<tr>
					<td width="40%">
						<!-- ************************************************************************ -->
						<div>
							<strong>Proveedor: </strong>
							<select name="proveedor_id" id="proveedor_id" class="form-control">
							<option value="0">Seleccione **</option>
								@if(@$proveedores)
								@foreach($proveedores as $ert)
								<option value="{{$ert->id}}">{{$ert->tx_nombre}} - {{$ert->tx_razon_social}}</option>
								@endforeach
								@endif
							</select>
						</div>
						<!-- ************************************************************************ -->
					</td>
					<td width="25%">
						<!-- ************************************************************************ -->
						<div>
							<strong>Desde: </strong>
							<input class="form-control" type="date" id="fecha_inicio" name="fecha_inicio">
						</div>
						<!-- ************************************************************************ -->
					</td>
					<td width="25%">
						<!-- ************************************************************************ -->
						<div>
							<strong>Hasta: </strong>
							<input class="form-control" type="date" id="fecha_fin" name="fecha_fin">
						</div>
						<!-- ************************************************************************ -->
					</td>
					<td width="10%">
						<br>
						<!-- ************************************************************************ -->
						<a id="buscar" href="#" class="btn btn-success btn-sm"><i class="fa fa-search"></i></a>
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
	$("#buscar").click(function(){
		if(($("#fecha_inicio").val()=='')||($("#fecha_fin").val()=='')||($("#proveedor_id").val()==0)){
			alert("Faltan valores para crear el reporte");
		}else{
			actualizar();
		}
	});
	function actualizar(){
		if(($("#proveedor_id").val()>0)&&($("#fecha_inicio").val()!='')&&($("#fecha_fin").val()!='')){
			$("#vistaPrevia").show();
			$("#reporte").load('<?php echo url('/admin/PGR1_R4_REPORTE'); ?>',{
				fecha_inicio:$("#fecha_inicio").val(),
				fecha_fin:$("#fecha_fin").val(),
				proveedor_id:$("#proveedor_id").val()
			});
		}else{
			alert('Debe haber un Proveedor');
		}
	}
	function descargar(){
		var proveedor_id=$("#proveedor_id").val();
		var fecha_inicio=$("#fecha_inicio").val();
		var fecha_fin=$("#fecha_fin").val();
		var descargar=1;
		var parametros='proveedor_id='+proveedor_id;
		var parametros=parametros+'&fecha_inicio='+fecha_inicio;
		var parametros=parametros+'&fecha_fin='+fecha_fin;
		location="<?php echo url('/admin/PGR1_R4_REPORTE_DESCARGAR'); ?>?"+parametros;
	}
</script>
@endsection