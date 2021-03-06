<?php
namespace App\Http\Controllers;

use App\Http\Controllers\clases;
use CRUDBooster;

class AdminOrdenController extends \crocodicstudio\crudbooster\controllers\CBController {

    public function cbInit() {
        $this->clases   = new clases();
        $registro_nuevo = "";
        $registro_viejo = "";
        # START CONFIGURATION DO NOT REMOVE THIS LINE
        $this->title_field         = "id";
        $this->limit               = "20";
        $this->orderby             = "id,desc";
        $this->global_privilege    = false;
        $this->button_table_action = true;
        $this->button_bulk_action  = true;
        $this->button_action_style = "button_icon";
        $this->button_add          = true;
        $this->button_edit         = true;
        $this->button_delete       = false;
        $this->button_detail       = true;
        $this->button_show         = true;
        $this->button_filter       = true;
        $this->button_import       = false;
        $this->button_export       = false;
        $this->table               = "orden";
        # END CONFIGURATION DO NOT REMOVE THIS LINE

        # START COLUMNS DO NOT REMOVE THIS LINE
        $this->col   = [];
        $this->col[] = ["label" => "No Orden", "name" => "id"];
        $this->col[] = ["label" => "Observación", "name" => "tx_observacion"];
        $this->col[] = ["label" => "Vendedor", "name" => "id_vendedor", "join" => "cms_users,name"];
        $this->col[] = ["label" => "Cliente", "name" => "clientes_id", "join" => "clientes,tx_nombre"];
        $this->col[] = ["label" => "Rep. Producción", "name" => "id_rep_produccion", "join" => "cms_users,name"];
        $this->col[] = ["label" => "Contrato", "name" => "tx_contrato"];
        $this->col[] = ["label" => "F.Inicio Producción", "name" => "fe_inic_produccion"];
        # END COLUMNS DO NOT REMOVE THIS LINE

        # START FORM DO NOT REMOVE THIS LINE
        $this->form   = [];
        $this->form[] = ['label' => 'Observación', 'name' => 'tx_observacion', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];
        $this->form[] = ['label' => 'Vendedor', 'name' => 'id_vendedor', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'datatable' => 'cms_users,name'];
        $this->form[] = ['label' => 'Cliente', 'name' => 'clientes_id', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'datatable' => 'clientes,tx_nombre'];
        $this->form[] = ['label' => 'Representante Producción', 'name' => 'id_rep_produccion', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'datatable' => 'cms_users,name'];
        $this->form[] = ['label' => 'Contrato', 'name' => 'tx_contrato', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];
        $this->form[] = ['label' => 'Fecha Inicio Producción', 'name' => 'fe_inic_produccion', 'type' => 'date', 'validation' => 'required|date', 'width' => 'col-sm-10'];
        $this->form[] = ['label' => 'Posventa', 'name' => 'posventa_id', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'datatable' => 'posventa,tx_posventa'];
        $this->form[] = ['label' => 'Fecha Entrega', 'name' => 'fe_entrega', 'type' => 'date', 'validation' => 'required|date', 'width' => 'col-sm-10'];
        $this->form[] = ['label' => 'Fecha Orden de Pedido', 'name' => 'fe_orden_pedido', 'type' => 'date', 'validation' => 'required|date', 'width' => 'col-sm-10'];
        $this->form[] = ['label' => 'Orden de Pedido', 'name' => 'orden_pedido', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];
        $this->form[] = ['label' => 'Fabricado para', 'name' => 'fabricado_para', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];
        # END FORM DO NOT REMOVE THIS LINE

        # OLD START FORM
        //$this->form = [];
        //$this->form[] = ['label'=>'No Orden','name'=>'co_orden','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
        //$this->form[] = ['label'=>'Tx Observacion','name'=>'tx_observacion','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
        //$this->form[] = ['label'=>'Vendedor','name'=>'id_vendedor','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'cms_users,name'];
        //$this->form[] = ['label'=>'Clientes Id','name'=>'clientes_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'clientes,id'];
        //$this->form[] = ['label'=>'Rep Produccion','name'=>'id_rep_produccion','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'cms_users,name'];
        //$this->form[] = ['label'=>'Tx Contrato','name'=>'tx_contrato','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
        //$this->form[] = ['label'=>'Fe Inic Produccion','name'=>'fe_inic_produccion','type'=>'date','validation'=>'required|date','width'=>'col-sm-10'];
        //$this->form[] = ['label'=>'Posventa Id','name'=>'posventa_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'posventa,tx_posventa'];
        //$this->form[] = ['label'=>'Fe Entrega','name'=>'fe_entrega','type'=>'date','validation'=>'required|date','width'=>'col-sm-10'];
        # OLD END FORM

        /*
        | ----------------------------------------------------------------------
        | Sub Module
        | ----------------------------------------------------------------------
        | @label          = Label of action
        | @path           = Path of sub module
        | @foreign_key       = foreign key of sub table/module
        | @button_color   = Bootstrap Class (primary,success,warning,danger)
        | @button_icon    = Font Awesome Class
        | @parent_columns = Sparate with comma, e.g : name,created_at
        |
         */
        $this->sub_module   = array();
        $this->sub_module[] = ['label' => 'Detalle Orden', 'path' => 'orden_detalle', 'parent_columns' => 'id', 'foreign_key' => 'orden_id', 'button_color' => 'success', 'button_icon' => 'fa fa-bars'];
        $this->sub_module[] = ['label' => 'Avance', 'path' => 'avance_produccion', 'parent_columns' => 'id,tx_observacion', 'foreign_key' => 'orden_id', 'button_color' => 'success', 'button_icon' => 'fa fa-bars'];
        /*
        | ----------------------------------------------------------------------
        | Add More Action Button / Menu
        | ----------------------------------------------------------------------
        | @label       = Label of action
        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
        | @icon        = Font awesome class icon. e.g : fa fa-bars
        | @color        = Default is primary. (primary, warning, succecss, info)
        | @showIf        = If condition when action show. Use field alias. e.g : [id] == 1
        |
         */
        $this->addaction = array();

        /*
        | ----------------------------------------------------------------------
        | Add More Button Selected
        | ----------------------------------------------------------------------
        | @label       = Label of action
        | @icon        = Icon from fontawesome
        | @name        = Name of button
        | Then about the action, you should code at actionButtonSelected method
        |
         */
        $this->button_selected = array();

        /*
        | ----------------------------------------------------------------------
        | Add alert message to this module at overheader
        | ----------------------------------------------------------------------
        | @message = Text of message
        | @type    = warning,success,danger,info
        |
         */
        $this->alert = array();

        /*
        | ----------------------------------------------------------------------
        | Add more button to header button
        | ----------------------------------------------------------------------
        | @label = Name of button
        | @url   = URL Target
        | @icon  = Icon from Awesome.
        |
         */
        $this->index_button = array();

        /*
        | ----------------------------------------------------------------------
        | Customize Table Row Color
        | ----------------------------------------------------------------------
        | @condition = If condition. You may use field alias. E.g : [id] == 1
        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.
        |
         */
        $this->table_row_color = array();

        /*
        | ----------------------------------------------------------------------
        | You may use this bellow array to add statistic at dashboard
        | ----------------------------------------------------------------------
        | @label, @count, @icon, @color
        |
         */
        $this->index_statistic = array();

        /*
        | ----------------------------------------------------------------------
        | Add javascript at body
        | ----------------------------------------------------------------------
        | javascript code in the variable
        | $this->script_js = "function() { ... }";
        |
         */
        $this->script_js = NULL;

        /*
        | ----------------------------------------------------------------------
        | Include HTML Code before index table
        | ----------------------------------------------------------------------
        | html code to display it before index table
        | $this->pre_index_html = "<p>test</p>";
        |
         */
        $this->pre_index_html = '

        <div class="panel panel-warning">
            <div class="panel-heading">
                <strong>
                ¡AVISO IMPORTANTE! Sea cuidadoso llenando los datos. Recuerde que si se ingresan datos erróneos, el sistema arrojará datos erróneos
                </strong>
            </div>
        </div>

        ';

        /*
        | ----------------------------------------------------------------------
        | Include HTML Code after index table
        | ----------------------------------------------------------------------
        | html code to display it after index table
        | $this->post_index_html = "<p>test</p>";
        |
         */
        $this->post_index_html = null;

        /*
        | ----------------------------------------------------------------------
        | Include Javascript File
        | ----------------------------------------------------------------------
        | URL of your javascript each array
        | $this->load_js[] = asset("myfile.js");
        |
         */
        $this->load_js = array();

        /*
        | ----------------------------------------------------------------------
        | Add css style at body
        | ----------------------------------------------------------------------
        | css code in the variable
        | $this->style_css = ".style{....}";
        |
         */
        $this->style_css = NULL;

        /*
        | ----------------------------------------------------------------------
        | Include css File
        | ----------------------------------------------------------------------
        | URL of your css each array
        | $this->load_css[] = asset("myfile.css");
        |
         */
        $this->load_css = array();

    }

    /*
    | ----------------------------------------------------------------------
    | Hook for button selected
    | ----------------------------------------------------------------------
    | @id_selected = the id selected
    | @button_name = the name of button
    |
     */
    public function actionButtonSelected($id_selected, $button_name) {
        //Your code here

    }

    /*
    | ----------------------------------------------------------------------
    | Hook for manipulate query of index result
    | ----------------------------------------------------------------------
    | @query = current sql query
    |
     */
    public function hook_query_index(&$query) {
        //Your code here
    }

    /*
    | ----------------------------------------------------------------------
    | Hook for manipulate row of index table html
    | ----------------------------------------------------------------------
    |
     */
    public function hook_row_index($column_index, &$column_value) {
        //Your code here
    }

    /*
    | ----------------------------------------------------------------------
    | Hook for manipulate data input before add data is execute
    | ----------------------------------------------------------------------
    | @arr
    |
     */
    public function hook_before_add(&$postdata) {
        //Your code here
        foreach ($postdata as $key => $value) {
            $this->registro_nuevo .= $key . ": <strong>" . $value . "</strong> &nbsp;";
        }
    }

    /*
    | ----------------------------------------------------------------------
    | Hook for execute command after add public static function called
    | ----------------------------------------------------------------------
    | @id = last insert id
    |
     */
    public function hook_after_add($id) {
        //Your code here
        $this->clases->auditoria("Orden - Manufactura", "Insertar", $this->registro_nuevo, '');
    }

    /*
    | ----------------------------------------------------------------------
    | Hook for manipulate data input before update data is execute
    | ----------------------------------------------------------------------
    | @postdata = input post data
    | @id       = current id
    |
     */
    public function hook_before_edit(&$postdata, $id) {
        //Your code here
        foreach ($postdata as $key => $value) {
            $this->registro_nuevo .= $key . ": <strong>" . $value . "</strong> &nbsp;";
        }
    }

    /*
    | ----------------------------------------------------------------------
    | Hook for execute command after edit public static function called
    | ----------------------------------------------------------------------
    | @id       = current id
    |
     */
    public function hook_after_edit($id) {
        //Your code here
        $orden = DB::table()->where()->get();
        foreach ($orden as $key => $value) {
            $this->registro_viejo .= $key . ": <strong>" . $value . "</strong> &nbsp;";
        }
    }

    /*
    | ----------------------------------------------------------------------
    | Hook for execute command before delete public static function called
    | ----------------------------------------------------------------------
    | @id       = current id
    |
     */
    public function hook_before_delete($id) {
        //Your code here
        $orden = DB::table('orden')->where('id', '=', $id)->first();
        foreach ($orden as $key => $value) {
            $this->registro_viejo .= $key . ": <strong>" . $value . "</strong> &nbsp;";
        }
    }

    /*
    | ----------------------------------------------------------------------
    | Hook for execute command after delete public static function called
    | ----------------------------------------------------------------------
    | @id       = current id
    |
     */
    public function hook_after_delete($id) {
        //Your code here
        $this->clases->auditoria("Orden - Manufactura", "Eliminar", '', $this->registro_viejo);
    }

    //By the way, you can still create your own method in here... :)

}