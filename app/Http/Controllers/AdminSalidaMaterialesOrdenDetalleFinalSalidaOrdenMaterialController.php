<?php
namespace App\Http\Controllers;

use CRUDBooster;
use DB;

class AdminSalidaMaterialesOrdenDetalleFinalSalidaOrdenMaterialController extends \crocodicstudio\crudbooster\controllers\CBController {

    public function cbInit() {

        # START CONFIGURATION DO NOT REMOVE THIS LINE
        $this->title_field         = "id";
        $this->limit               = "300";
        $this->orderby             = "id,desc";
        $this->global_privilege    = false;
        $this->button_table_action = false;
        $this->button_bulk_action  = false;
        $this->button_action_style = "button_icon";
        $this->button_add          = false;
        $this->button_edit         = false;
        $this->button_delete       = false;
        $this->button_detail       = false;
        $this->button_show         = false;
        $this->button_filter       = true;
        $this->button_import       = false;
        $this->button_export       = false;
        $this->table               = "salida_orden_material";
        # END CONFIGURATION DO NOT REMOVE THIS LINE

        # START COLUMNS DO NOT REMOVE THIS LINE
        $this->col   = [];
        $this->col[] = ["label" => "Material", "name" => "material_id", "join" => "material,codigo"];
        $this->col[] = ["label" => "Cant Requerida Material", "name" => "cant_requerida_material"];

        $this->col[] = ["label" => "Entregado", "name" => "(
        SELECT GROUP_CONCAT(' <strong>Lote:</strong>',lote,' <strong>Cant.:</strong>',cantidad) FROM lotes_salida_material WHERE salida_orden_material_id=salida_orden_material.id) as entregado", ];

        $this->col[] = ["label" => "Faltan", "name" => "salida_orden_material.cant_requerida_material - (
        SELECT
        SUM(cantidad)
        FROM
        lotes_salida_material
        WHERE salida_orden_material_id=salida_orden_material.id) as faltan", ];

        $this->col[] = ["label" => "Lote", "name" => "(
        SELECT GROUP_CONCAT(' <strong>Lote:</strong>',lote,' <strong>Cant.:</strong>',cantidad) FROM lotes_salida_material WHERE salida_orden_material_id=salida_orden_material.id) as lote", ];

        $this->col[] = ["label" => "Cant.", "name" => "(
        SELECT GROUP_CONCAT(' <strong>Lote:</strong>',lote,' <strong>Cant.:</strong>',cantidad) FROM lotes_salida_material WHERE salida_orden_material_id=salida_orden_material.id) as cantidad", ];

        // $this->col[] = ["label" => "Acciones", "name" => '(
        //     SELECT "
        //     <form action=\"#\" method=\"post\">
        //     <input size=\"5\" type=\"text\" name=\"salida_orden_material_id\">
        //     <input type=\"text\" name=\"lote\">
        //     <input type=\"text\" name=\"cantidad\">
        //     <button type=\"submit\"></button>
        //     </form>
        //     "
        // ) as acciones', ];
        // dd($this->col);
        # END COLUMNS DO NOT REMOVE THIS LINE

        # START FORM DO NOT REMOVE THIS LINE
        $this->form   = [];
        $this->form[] = ['label' => 'Orden Id', 'name' => 'orden_id', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'datatable' => 'orden,id'];
        $this->form[] = ['label' => 'Orden Detalle Id', 'name' => 'orden_detalle_id', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'datatable' => 'orden_detalle,tx_nombre_persona'];
        $this->form[] = ['label' => 'Material Id', 'name' => 'material_id', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'datatable' => 'material,id'];
        $this->form[] = ['label' => 'Cant Requerida Material', 'name' => 'cant_requerida_material', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];
        # END FORM DO NOT REMOVE THIS LINE

        # OLD START FORM
        //$this->form = [];
        //$this->form[] = ["label"=>"Orden Id","name"=>"orden_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"orden,id"];
        //$this->form[] = ["label"=>"Orden Detalle Id","name"=>"orden_detalle_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"orden_detalle,tx_nombre_persona"];
        //$this->form[] = ["label"=>"Material Id","name"=>"material_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"material,id"];
        //$this->form[] = ["label"=>"Cant Requerida Material","name"=>"cant_requerida_material","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
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
        $this->script_js = '
            // function formularioSacarMaterial(){
            //     alert("Acá se saca el material");
            // }
            // $(document).ready(function(){
            //     $("div.box.box-default div.box-body.table-responsive.no-padding table.table.table-bordered tbody tr").html("");
            //     $.ajax({
            //         url: "/admin/traerVinOrdenDetalle/' . $_GET["parent_id"] . '",
            //         type: "GET",
            //         dataType: "JSON",
            //     })
            //     .done(function(data) {
            //         $("div.box.box-default div.box-body.table-responsive.no-padding table.table.table-bordered tbody").html("<tr class=\"active\"><td colspan=\"5\"><strong><i class=\"fa fa-bars\"></i> Datos del Producto</strong></td></tr><tr><td width=\"20%\"><strong>"+data.modelo+"</strong></td><td width=\"20%\"><strong>"+data.producto+"</strong></td><td width=\"20%\"><strong>"+data.talla+"</strong></td><td width=\"20%\"><strong>"+data.color+"</strong></td><td width=\"20%\"><strong>"+data.vin+"</strong></td></tr>");
            //     });
            // });
        ';

        //
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
        $data                      = [];
        $data['page_title']        = 'Salida de Materiales';
        $orden_detalle_id          = $_GET['parent_id'];
        $data['return_url']        = $_GET['return_url'];
        $orden_detalle             = DB::table('orden_detalle')->where('id', '=', $orden_detalle_id)->first();
        $orden_id                  = $orden_detalle->orden_id;
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
        // dd($data['detalMatEntregado']);
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
        // ->where('orden_detalle.orden_id', '=', $orden_id)
            ->where('orden_detalle.id', '=', $orden_detalle_id)
            ->orderBy('producto_terminado.tx_producto_terminado', 'modelo.tx_modelo', 'desc')
            ->get();
        //return view('salidamaterial.editar_nueva', $data);
        $this->cbView('salidamaterial.editar_nueva', $data);
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