<?php
namespace App\Http\Controllers;

use App\Http\Controllers\tareas;
use CRUDBooster;
use DB;
use Request;

class AdminDetalleTrazabilidadController extends \crocodicstudio\crudbooster\controllers\CBController {

    public function __construct() {
        $this->tareas = new tareas();
    }

    public function cbInit() {

        # START CONFIGURATION DO NOT REMOVE THIS LINE
        $this->title_field         = "id";
        $this->limit               = "20";
        $this->orderby             = "id,desc";
        $this->global_privilege    = false;
        $this->button_table_action = true;
        $this->button_bulk_action  = true;
        $this->button_action_style = "button_icon";
        $this->button_add          = false;
        $this->button_edit         = true;
        $this->button_delete       = true;
        $this->button_detail       = true;
        $this->button_show         = false;
        $this->button_filter       = true;
        $this->button_import       = false;
        $this->button_export       = false;
        $this->table               = "detalle_trazabilidad";
        # END CONFIGURATION DO NOT REMOVE THIS LINE

        # START COLUMNS DO NOT REMOVE THIS LINE
        $this->col   = [];
        $this->col[] = ["label" => "Material Id", "name" => "material_id", "join" => "material,id"];
        $this->col[] = ["label" => "Orden Detalle Id", "name" => "orden_detalle_id", "join" => "orden_detalle,tx_nombre_persona"];
        # END COLUMNS DO NOT REMOVE THIS LINE

        # START FORM DO NOT REMOVE THIS LINE
        $this->form   = [];
        $this->form[] = ['label' => 'Material Id', 'name' => 'material_id', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'datatable' => 'material,id'];
        $this->form[] = ['label' => 'Orden Detalle Id', 'name' => 'orden_detalle_id', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'datatable' => 'orden_detalle,tx_nombre_persona'];
        $this->form[] = ['label' => 'Trazabilidad Id', 'name' => 'trazabilidad_id', 'type' => 'select2', 'validation' => 'required', 'width' => 'col-sm-9'];
        # END FORM DO NOT REMOVE THIS LINE

        # OLD START FORM
        //$this->form = [];
        //$this->form[] = ['label'=>'Material Id','name'=>'material_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'material,id'];
        //$this->form[] = ['label'=>'Orden Detalle Id','name'=>'orden_detalle_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'orden_detalle,tx_nombre_persona'];
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
        $this->sub_module = array();

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
        $this->pre_index_html = null;

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

    public function getIndex() {
        //First, Add an auth
        if (!CRUDBooster::isView()) {
            CRUDBooster::denyAccess();
        }

        //Create your own query
        $data               = [];
        $data['page_title'] = 'Detalle Trazabilidad';
        $trazabilidad       = DB::table('trazabilidad')->where('id', '=', Request::get('parent_id'))->first();
        $co_orden           = $trazabilidad->orden_id;
        $data['orden']      = DB::table('orden')
            ->join('orden_detalle', 'orden_detalle.orden_id', 'orden.id')
            ->join('clientes', 'orden.clientes_id', 'clientes.id')
            ->join('numero_vin', 'orden_detalle.numero_vin_id', 'numero_vin.id')
            ->join('modelo', 'orden_detalle.modelo_id', 'modelo.id')
            ->where('orden.id', '=', $co_orden)
            ->get();

        $data['detalle_trazabilidad'] = DB::table('detalle_trazabilidad')
            ->join('trazabilidad', 'detalle_trazabilidad.trazabilidad_id', 'trazabilidad.id')
            ->join('material', 'material.id', 'detalle_trazabilidad.material_id')
            ->join('orden', 'trazabilidad.orden_id', 'orden.id')
            ->join('orden_detalle', 'orden_detalle.orden_id', 'orden.id')
            ->join('numero_vin', 'orden_detalle.numero_vin_id', 'numero_vin.id')
            ->join('producto_terminado', 'orden_detalle.producto_terminado_id', 'producto_terminado.id')
            ->where('trazabilidad.orden_id', '=', $co_orden)
            ->select('detalle_trazabilidad.id', 'material.codigo', 'trazabilidad.id as trazabilidad_id', 'numero_vin.tx_numero_vin', 'producto_terminado.tx_producto_terminado', 'orden_detalle.tx_talla', 'orden_detalle.tx_color')
            ->distinct()
            ->orderby('tx_producto_terminado', 'asc')
            ->orderBy('tx_talla', 'asc')
            ->orderBy('tx_color', 'asc')
            ->groupBy('codigo', 'tx_producto_terminado', 'tx_talla', 'tx_color')
            ->get();
        // dd($data['detalle_trazabilidad']);

        foreach ($data['detalle_trazabilidad'] as $result) {
            $data['botonesLotes'] = DB::table('lotes')->where('detalle_trazabilidad_id', '=', $result->id)->get();
        }
        $this->cbView('trazabilidad.trazabilidad', $data);
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

    }

    //By the way, you can still create your own method in here... :)

}