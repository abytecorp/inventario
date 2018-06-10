<?php
namespace App\Http\Controllers;

use CRUDBooster;
use DB;

class AdminOrdenInspeccionController extends \crocodicstudio\crudbooster\controllers\CBController {

    public function cbInit() {

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
        $this->button_delete       = true;
        $this->button_detail       = true;
        $this->button_show         = true;
        $this->button_filter       = true;
        $this->button_import       = false;
        $this->button_export       = false;
        $this->table               = "orden_inspeccion";
        # END CONFIGURATION DO NOT REMOVE THIS LINE

        # START COLUMNS DO NOT REMOVE THIS LINE
        $this->col   = [];
        $this->col[] = ["label" => "N°", "name" => "id"];
        $this->col[] = ["label" => "Orden de manufactura", "name" => "orden_id", "join" => "orden,id"];
        $this->col[] = ["label" => "VIN", "name" => "numero_vin_id", "join" => "numero_vin,tx_numero_vin"];
        $this->col[] = ["label" => "Fecha Llegada", "name" => "fecha_llegada"];
        $this->col[] = ["label" => "Fecha Salida", "name" => "fecha_salida"];
        $this->col[] = ["label" => "Garantia Salida", "name" => "id_garantia_sal", "join" => "garantia,nombre"];
        # END COLUMNS DO NOT REMOVE THIS LINE

        # START FORM DO NOT REMOVE THIS LINE
        $this->form     = [];
        $this->form[]   = ['label' => 'Orden de Manufactura', 'name' => 'orden_id', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'datatable' => 'orden,id'];
        $this->form[]   = ['label' => 'VIN', 'name' => 'numero_vin_id', 'type' => 'select2', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10', 'datatable' => 'numero_vin,tx_numero_vin'];
        $this->form[]   = ['label' => 'Modelo', 'name' => 'modelo_id', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'datatable' => 'modelo,tx_modelo'];
        $this->form[]   = ['label' => 'Talla', 'name' => 'talla', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];
        $this->form[]   = ['label' => 'Fecha Llegada', 'name' => 'fecha_llegada', 'type' => 'date', 'validation' => 'required', 'width' => 'col-sm-10'];
        $this->form[]   = ['label' => 'Guía Correo Entrada', 'name' => 'guia_correo_ent', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];
        $this->form[]   = ['label' => 'Garantía Entrada', 'name' => 'id_garantia_ent', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'datatable' => 'garantia,nombre'];
        $this->form[]   = ['label' => 'Comentario Entrada', 'name' => 'comentario_ent', 'type' => 'textarea', 'validation' => 'required|string|min:5|max:5000', 'width' => 'col-sm-10'];
        $this->form[]   = ['label' => 'Aprobado por', 'name' => 'id_aprobador', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'datatable' => 'cms_users,name'];
        $custom_element = view('separador')->render();
        $this->form[]   = ["label" => "", "name" => "custom_field", "type" => "custom", "html" => $custom_element];
        $this->form[]   = ['label' => 'Fecha Lavado', 'name' => 'fecha_lavado', 'type' => 'date', 'validation' => 'required|date', 'width' => 'col-sm-10'];
        $this->form[]   = ['label' => 'Fecha Secado', 'name' => 'fecha_secado', 'type' => 'date', 'validation' => 'required|date', 'width' => 'col-sm-10'];
        $this->form[]   = ['label' => 'Fecha Inspección', 'name' => 'fecha_inspeccion', 'type' => 'date', 'validation' => 'required|date', 'width' => 'col-sm-10'];
        $this->form[]   = ['label' => 'Fecha Salida', 'name' => 'fecha_salida', 'type' => 'date', 'validation' => 'required|date', 'width' => 'col-sm-10'];
        $this->form[]   = ['label' => 'Guia Correo Salida', 'name' => 'guia_correo_sal', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];
        $this->form[]   = ['label' => 'Garantía Salida', 'name' => 'id_garantia_sal', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'datatable' => 'garantia,nombre'];
        $this->form[]   = ['label' => 'Comentario Salida', 'name' => 'comentario_sal', 'type' => 'textarea', 'validation' => 'required|string|min:5|max:5000', 'width' => 'col-sm-10'];
        $this->form[]   = ['label' => 'Inspector', 'name' => 'id_inspector', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'datatable' => 'cms_users,name'];
        $this->form[]   = ['label' => 'Asesor', 'name' => 'id_asesor', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'datatable' => 'cms_users,name'];
        $this->form[]   = ['label' => 'Uniforme de Reemplazo', 'name' => 'uniforme_reemp', 'type' => 'text', 'width' => 'col-sm-10'];
        # END FORM DO NOT REMOVE THIS LINE

        # OLD START FORM
        //$this->form = [];
        //$this->form[] = ['label'=>'Orden de Manufactura','name'=>'orden_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'orden,id'];
        //$this->form[] = ['label'=>'VIN','name'=>'numero_vin_id','type'=>'select','validation'=>'required','width'=>'col-sm-9','dataquery'=>'SELECT numero_vin.id as label, numero_vin.tx_numero_vin as value FROM numero_vin INNER JOIN orden_detalle ON orden_detalle.numero_vin_id = numero_vin.id WHERE orden_detalle.id=1'];
        //$this->form[] = ['label'=>'Modelo','name'=>'modelo_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'garantia,nombre'];
        //$this->form[] = ['label'=>'Talla','name'=>'talla','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
        //$this->form[] = ['label'=>'Fecha Llegada','name'=>'fecha_llegada','type'=>'date','validation'=>'required','width'=>'col-sm-9'];
        //$this->form[] = ['label'=>'Guía Correo Entrada','name'=>'guia_correo_ent','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
        //$this->form[] = ['label'=>'Garantía Entrada','name'=>'id_garantia_ent','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
        //$this->form[] = ['label'=>'Comentario Entrada','name'=>'comentario_ent','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
        //$this->form[] = ['label'=>'Aprobado por','name'=>'id_aprobador','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'cms_users,name'];
        //$this->form[] = ['label'=>'Fecha Lavado','name'=>'fecha_lavado','type'=>'date','validation'=>'required|date','width'=>'col-sm-10'];
        //$this->form[] = ['label'=>'Fecha Secado','name'=>'fecha_secado','type'=>'date','validation'=>'required|date','width'=>'col-sm-10'];
        //$this->form[] = ['label'=>'Fecha Inspección','name'=>'fecha_inspeccion','type'=>'date','validation'=>'required|date','width'=>'col-sm-10'];
        //$this->form[] = ['label'=>'Fecha Salida','name'=>'fecha_salida','type'=>'date','validation'=>'required|date','width'=>'col-sm-10'];
        //$this->form[] = ['label'=>'Guia Correo Salida','name'=>'guia_correo_sal','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
        //$this->form[] = ['label'=>'Garantía Salida','name'=>'id_garantia_sal','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
        //$this->form[] = ['label'=>'Comentario Salida','name'=>'comentario_sal','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
        //$this->form[] = ['label'=>'Inspector','name'=>'id_inspector','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'cms_users,name'];
        //$this->form[] = ['label'=>'Asesor','name'=>'id_asesor','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'cms_users,name'];
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
        $this->sub_module[] = ['label' => 'Detalle', 'path' => 'detalle_inspeccion', 'parent_columns' => 'id', 'foreign_key' => 'orden_inspeccion_id', 'button_color' => 'warning', 'button_icon' => 'fa fa-bars'];

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
        $this->script_js = "
         $('#orden_id').on('change', function(){
            $.ajax({
            url: '/admin/tareas/listado_vin/' + $('#orden_id').val(),
            type: 'get',
                success: function(msg) {
                    $('#numero_vin_id').html(msg);
                    },
                });
        });
        $('#numero_vin_id').on('change', function(){
            $.ajax({
            url: '/admin/tareas/listado_modelo/' + $('#numero_vin_id').val(),
            type: 'get',
                success: function(msg) {
                    $('#modelo_id').html(msg);
                    },
                });
        });
         $('#modelo_id').on('change', function(){
            $.ajax({
            url: '/admin/tareas/talla/' + $('#numero_vin_id').val(),
            type: 'get',
                success: function(msg) {
                    $('#talla').val(msg);
                    },
                });
        });";

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
        $tipo_prueba = DB::table('tipo_prueba')->get();

        foreach ($tipo_prueba as $tp) {
            $inserts[] = [
                'orden_inspeccion_id' => $id,
                'tipo_prueba_id'      => $tp->id,
                'indicador_pasa_id'   => 0,
                'detalle'             => '',
            ];
        }
        // dd($inserts);
        DB::table('detalle_inspeccion')->insert($inserts);
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