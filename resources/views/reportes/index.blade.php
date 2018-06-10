@extends('crudbooster::admin_template')
@section('content')
<div class="box box-default">
  <div class="box-body table-responsive no-padding">
    <table class="table table-bordered">
      <tbody>
        <tr class="active">
          <td><strong><i class="fa fa-bars"></i> REPORTES</strong></td>
        </tr>
        <tr>
          <td>
            <!-- ************************************************************************ -->
            <?php $i = 1;?>
            @foreach($reportes as $qwe)
            @if(Session::get('admin_plrivileges')>2)
              @if($i==6)
              @elseif($i==13)
              @elseif($i>17)
              @else
              <div class="col-md-6" style="margin-bottom:15px">
                <a href="/inventario/admin/{{$qwe->codigo}}_FILTRO">{{$i}}.- ({{$qwe->codigo}}) {{$qwe->nombre}}</a>
              </div>
              @endif
            @else
            <div class="col-md-6" style="margin-bottom:15px">
              <a href="/inventario/admin/{{$qwe->codigo}}_FILTRO">{{$i}}.- ({{$qwe->codigo}}) {{$qwe->nombre}}</a>
            </div>
            @endif

            <?php $i++;?>
            @endforeach
            <!-- ************************************************************************ -->
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

@endsection