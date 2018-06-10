@extends('crudbooster::admin_template')
@section('content')
   <div class="col-sm-10">
   	<select class="form-control" name="material_id" id="material_id" required>
   	<option value="">** Seleccione un material</option>
    @foreach($material as $fila)
       <option value="{{$fila->id}}">{{$fila->codigo}}</option>
    @endforeach
   </select> 
   </div>
   <!--  {{Session::get('variable')}} -->
   {{$todo}}
@endsection
