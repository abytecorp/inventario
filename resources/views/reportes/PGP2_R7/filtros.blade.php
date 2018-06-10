@extends('crudbooster::admin_template')
@section('content')
<div class="box box-default">
	<div class="box-body table-responsive no-padding">
		<table class="table table-bordered">
			<tbody>
				<tr class="active">
					<td colspan="4"><strong><i class="fa fa-bars"></i> CONTROL AVANCE POR PRODUCCIÓN</strong></td>
				</tr>
				<tr>
					<td width="40%">
						<!-- ************************************************************************ -->
						<div>
							<strong>Cliente: </strong>
							<select name="cliente" id="cliente" class="form-control">
								<option value="todo">todo</option>
								@if(@$clientes)
								@foreach($clientes as $ert)
								<option value="{{$ert->id}}">{{$ert->tx_nombre}}</option>
								@endforeach
								@endif
							</select>
						</div>
						<!-- ************************************************************************ -->
					</td>
					<td width="20%">
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
	$(document).ready(function(){
		actualizar();
	});
	$("#buscar").click(function(){
		actualizar();
	});
	function actualizar(){
		$("#vistaPrevia").show();
		$("#reporte").load('<?php echo url('/admin/PGP2_R7_REPORTE'); ?>',{
			cliente:$("#cliente").val()
		});
	}
	function descargar(){
		var cliente=$("#cliente").val();
		var descargar=1;
		var parametros='cliente='+cliente;
		location="<?php echo url('/admin/PGP2_R7_REPORTE_DESCARGAR'); ?>?"+parametros;
	}
</script>
@endsection