@if(Session::get('admin_privileges')<=2)
<div id="vistaPrevia" class="box box-default" style="display:none">
  <div class="box-body table-responsive no-padding">
    <table class="table table-bordered">
      <tbody>
        <tr class="active">
          <td colspan="3">
            <strong>Vista Previa</strong> &nbsp;&nbsp;&nbsp;
            <a href="#" onclick="descargar()" class="btn btn-primary btn-sm">Descargar</a>
          </td>
        </tr>
        <tr>
          <td colspan="3" id="reporte"></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>
@endif