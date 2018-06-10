<?php
namespace App\Http\Controllers;

use CRUDBooster;
use DB;

class AdminTrazabilidadDetalle2Controller extends \crocodicstudio\crudbooster\controllers\CBController {

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
        $this->button_delete       = false;
        $this->button_detail       = false;
        $this->button_show         = false;
        $this->button_filter       = false;
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
        $this->form = [];
        // $this->form[] = ['label' => 'Orden Id', 'name' => 'orden_id', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'datatable' => 'orden,id'];
        // $this->form[] = ['label' => 'Orden Detalle Id', 'name' => 'orden_detalle_id', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'datatable' => 'orden_detalle,tx_nombre_persona'];
        // $this->form[] = ['label' => 'Material Id', 'name' => 'material_id', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'datatable' => 'material,id'];
        # END FORM DO NOT REMOVE THIS LINE

        # OLD START FORM
        //$this->form = [];
        //$this->form[] = ["label"=>"Orden Id","name"=>"orden_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"orden,id"];
        //$this->form[] = ["label"=>"Orden Detalle Id","name"=>"orden_detalle_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"orden_detalle,tx_nombre_persona"];
        //$this->form[] = ["label"=>"Material Id","name"=>"material_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"material,id"];
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

    public function getEdit($id) {
        //First, Add an auth
        if (!CRUDBooster::isView()) {
            CRUDBooster::denyAccess();
        }

        //Este id es el id de la orden de manufactura (orden_id)
        $data               = [];
        $data['id']         = $id;
        $data['page_title'] = 'Detalles de Trazabilidad';
        $data['ordenes']    = DB::table('orden')
            ->select(
                'orden.id',
                'clientes.tx_nombre',
                'orden.tx_contrato'
            )
            ->join('clientes', 'orden.clientes_id', 'clientes.id')
            ->orderby('id', 'desc')->get();

        foreach ($data['ordenes'] as $value) {
            # code...
        }

        $orden_id                       = $id;
        $data['detalMatEntregadoTraza'] = DB::table('lotes_salida_material')
            ->join('salida_orden_material', 'lotes_salida_material.salida_orden_material_id', 'salida_orden_material.id')
            ->where('salida_orden_material.orden_id', '=', $orden_id)
            ->select(
                DB::raw('SUM(lotes_salida_material.cantidad)as cantidad'),
                'lotes_salida_material.salida_orden_material_id',
                'lotes_salida_material.lote',
                'lotes_salida_material.id',
                'salida_orden_material.material_id'
            )
            ->groupBy('salida_orden_material_id', 'lote')
            ->get();
        // dd($data['detalMatEntregadoTraza']);

        $data['detalMatEntregado'] = DB::table('lotes_salida_material')
            ->join('salida_orden_material', 'lotes_salida_material.salida_orden_material_id', 'salida_orden_material.id')
            ->select(
                DB::raw('SUM(lotes_salida_material.cantidad) as entregado'),
                'salida_orden_material.material_id',
                'lotes_salida_material.lote',
                'lotes_salida_material.salida_orden_material_id'
            )
            ->where('salida_orden_material.orden_id', '=', $orden_id)
            ->groupBy('salida_orden_material_id')
            ->get();

        $data['detalleEntregado'] = DB::table('lotes_salida_material')
            ->join('salida_orden_material', 'lotes_salida_material.salida_orden_material_id', 'salida_orden_material.id')
            ->select(
                DB::raw('SUM(lotes_salida_material.cantidad) as entregado'),
                'salida_orden_material.material_id',
                'lotes_salida_material.lote',
                'lotes_salida_material.salida_orden_material_id'
            )
            ->where('salida_orden_material.orden_id', '=', $orden_id)
            ->groupBy('material_id', 'lote')
            ->get();
        $data['totalEntregado'] = DB::table('lotes_salida_material')
            ->join('salida_orden_material', 'lotes_salida_material.salida_orden_material_id', 'salida_orden_material.id')
            ->select(
                DB::raw('SUM(lotes_salida_material.cantidad) as entregado'),
                'salida_orden_material.material_id',
                'lotes_salida_material.lote',
                'lotes_salida_material.salida_orden_material_id'
            )
            ->where('salida_orden_material.orden_id', '=', $orden_id)
            ->groupBy('material_id')
            ->get();

        $data['totalRequerido'] = DB::table('salida_orden_material')
            ->join('material', 'salida_orden_material.material_id', 'material.id')
            ->select(
                DB::raw('sum(salida_orden_material.cant_requerida_material) as cant_requerida_material'),
                'salida_orden_material.id',
                'salida_orden_material.orden_id',
                'salida_orden_material.orden_detalle_id',
                'salida_orden_material.material_id',
                'material.tx_descripcion',
                'material.nu_disponible'
            )
            ->where('salida_orden_material.orden_id', '=', $orden_id)
            ->groupBy('material_id')
            ->get();
        $data['materialesSacados'] = DB::table('salida_orden_material')
            ->select(
                DB::raw('sum(lotes_salida_material.cantidad) as cantidad'),
                'lotes_salida_material.salida_orden_material_id',
                'lotes_salida_material.lote',
                'salida_orden_material.orden_detalle_id',
                'salida_orden_material.material_id'
            )
            ->join('lotes_salida_material', 'lotes_salida_material.salida_orden_material_id', 'salida_orden_material.id')
            ->where('salida_orden_material.orden_id', '=', $orden_id)
            ->groupBy('lote')
            ->get();
        // ->toSql();
        // dd($data['materialesSacados']);
        $data['detalles'] = DB::table('orden_detalle')
            ->select(
                'orden_detalle.orden_id',
                'salida_orden_material.id',
                'salida_orden_material.orden_detalle_id',
                'salida_orden_material.material_id',
                'salida_orden_material.cant_requerida_material',
                'material.codigo',
                'material.tx_descripcion',
                'material.nu_disponible',
                'material.disponibilidad_minima',
                'modelo.tx_modelo',
                'producto_terminado.tx_producto_terminado',
                'numero_vin.tx_numero_vin',
                'orden_detalle.tx_talla',
                'orden_detalle.tx_color',
                'orden_detalle.cantidad as modelo_cantidad'
            )
            ->join('numero_vin', 'orden_detalle.numero_vin_id', 'numero_vin.id')
            ->join('salida_orden_material', 'salida_orden_material.orden_detalle_id', 'orden_detalle.id')
            ->join('material', 'salida_orden_material.material_id', 'material.id')
            ->join('modelo', 'orden_detalle.modelo_id', 'modelo.id')
            ->join('producto_terminado', 'orden_detalle.producto_terminado_id', 'producto_terminado.id')
            ->where('orden_detalle.orden_id', '=', $orden_id)
            ->orderBy('producto_terminado.tx_producto_terminado', 'modelo.tx_modelo', 'desc')
            ->get();

        //Create a view. Please use `cbView` method instead of view method from laravel.
        $this->cbView('trazabilidad.index', $data);
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