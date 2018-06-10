<?php
namespace App\Http\Controllers;

use Session;
use Request;
use DB;
use CRUDBooster;

class AdminDetalleSalidaMatController extends \crocodicstudio\crudbooster\controllers\CBController {

    public function cbInit() {
        $id       = Request::get('parent_id');
        $material = DB::table('historico_salida_mat')->where('id', '=', $id)->first();
        $a        = $material->codigo_material;
        # START CONFIGURATION DO NOT REMOVE THIS LINE
        $this->title_field         = "id";
        $this->limit               = "20";
        $this->orderby             = "id,desc";
        $this->global_privilege    = false;
        $this->button_table_action = true;
        $this->button_bulk_action  = true;
        $this->button_action_style = "button_icon";
        $this->button_add          = true;
        $this->button_edit         = false;
        $this->button_delete       = false;
        $this->button_detail       = true;
        $this->button_show         = true;
        $this->button_filter       = true;
        $this->button_import       = false;
        $this->button_export       = false;
        $this->table               = "detalle_salida_mat";
        # END CONFIGURATION DO NOT REMOVE THIS LINE

        # START COLUMNS DO NOT REMOVE THIS LINE
        $this->col   = [];
        $this->col[] = ["label" => "Historico Salida Mat", "name" => "historico_salida_mat_id", "join" => "historico_salida_mat,id"];
        $this->col[] = ["label" => "Lote", "name" => "lote_id"];
        $this->col[] = ["label" => "Cantidad Salida", "name" => "cantidad_salida"];
        $this->col[] = ["label" => "Comentario", "name" => "comentario"];
        # END COLUMNS DO NOT REMOVE THIS LINE

        # START FORM DO NOT REMOVE THIS LINE
        $this->form   = [];
        $this->form[] = ['label' => 'Historico Salida Mat', 'name' => 'historico_salida_mat_id', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'datatable' => 'historico_salida_mat,id'];
        $this->form[] = ['label' => 'Lote', 'name' => 'lote_id', 'type' => 'select', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10', 'dataquery' => 'SELECT detalle_entrada_mat.lote AS label ,detalle_entrada_mat.id as value FROM historico_entrada_mat INNER JOIN detalle_entrada_mat ON historico_entrada_mat.id = detalle_entrada_mat.historico_entrada_mat_id where codigo_material="' . $a . '"'];
        $this->form[] = ['label' => 'Cantidad Salida', 'name' => 'cantidad_salida', 'type' => 'text', 'validation' => 'required', 'width' => 'col-sm-10'];
        $this->form[] = ['label' => 'Comentario', 'name' => 'comentario', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];
        # END FORM DO NOT REMOVE THIS LINE

        # OLD START FORM
        //$this->form = [];
        //$this->form[] = ["label"=>"Historico Salida Mat Id","name"=>"historico_salida_mat_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"historico_salida_mat,id"];
        //$this->form[] = ["label"=>"Lote Id","name"=>"lote_id","type"=>"select2","required"=>TRUE,"validation"=>"required|min:1|max:255","datatable"=>"lote,id"];
        //$this->form[] = ["label"=>"Cantidad Salida","name"=>"cantidad_salida","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
        //$this->form[] = ["label"=>"Comentario","name"=>"comentario","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
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
        $this->script_js = "
        $('#cantidad_salida').on('keyup', function(){
                this.value = this.value.replace(/[^.0-9]/g,'');
        })
        $('#cantidad_salida').on('focusout', function(){
            $.ajax({
            url: '/admin/detalle_salida_mat/disponibilidad/' + $('#lote_id').val(),
            type: 'get',
                success: function(msg) {
                 disponible = msg;
                    if( $('#cantidad_salida').val() > disponible ){
                            alert('La cantidad solicitada no esta disponible, en Stock: ' + disponible);
                            $('#cantidad_salida').val('');
                            $('#cantidad_salida').focus();
                            return false;
                        }
                    },
                error: function(jqXHR, textStatus, errorThrown) {}
                });
        })";

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
        $lotes   = DB::table('detalle_salida_mat')->where('id', '=', $id)->first();
        $id_his  = $lotes->lote_id;
        $dispo   = 0;
        $entrada = DB::table('detalle_entrada_mat')->where('id', '=', $id_his)->first();

        $disp_base = $entrada->disponible;

        $dispo = $disp_base - $lotes->cantidad_salida;

        DB::table('detalle_entrada_mat')
            ->where('id', $id_his)
            ->update(['disponible' => $dispo]);
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

    public function disponibilidad($id) {
        $disponible = DB::table('detalle_entrada_mat')->where('id', '=', $id)->get();
        foreach ($disponible as $disp) {
            $disponibles = (int) $disp->disponible;
        }
        return $disponibles;
    }

    //By the way, you can still create your own method in here... :)

}