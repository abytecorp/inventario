<?php
namespace App\Http\Controllers;

use App\Http\Controllers\clases;
use CRUDBooster;
use DB;

class AdminRegistroEntradaMatController extends \crocodicstudio\crudbooster\controllers\CBController {

    public function cbInit() {
        $this->clases   = new clases();
        $registro_nuevo = "";
        $registro_viejo = "";
        # START CONFIGURATION DO NOT REMOVE THIS LINE
        $this->title_field         = "id";
        $this->limit               = "200";
        $this->orderby             = "id,desc";
        $this->global_privilege    = false;
        $this->button_table_action = true;
        $this->button_bulk_action  = true;
        $this->button_action_style = "button_icon";
        $this->button_add          = true;
        $this->button_edit         = false;
        $this->button_delete       = true;
        $this->button_detail       = true;
        $this->button_show         = false;
        $this->button_filter       = true;
        $this->button_import       = false;
        $this->button_export       = false;
        $this->table               = "registro_entrada_mat";
        # END CONFIGURATION DO NOT REMOVE THIS LINE

        # START COLUMNS DO NOT REMOVE THIS LINE
        $this->col   = [];
        $this->col[] = ["label" => "Fecha Entrada", "name" => "fecha_entrada"];
        $this->col[] = ["label" => "Factura", "name" => "factura"];
        $this->col[] = ["label" => "Prueba Tecnica", "name" => "id_prueba_tecnica", "join" => "garantia,nombre"];
        $this->col[] = ["label" => "Descripcion", "name" => "descripcion"];
        # END COLUMNS DO NOT REMOVE THIS LINE

        # START FORM DO NOT REMOVE THIS LINE
        $this->form   = [];
        $this->form[] = ['label' => 'Fecha Entrada', 'name' => 'fecha_entrada', 'type' => 'date', 'validation' => 'required|date', 'width' => 'col-sm-10'];
        $this->form[] = ['label' => 'Factura', 'name' => 'factura', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];
        $this->form[] = ['label' => 'Prueba Tecnica', 'name' => 'id_prueba_tecnica', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'datatable' => 'garantia,nombre'];
        $this->form[] = ['label' => 'Descripcion', 'name' => 'descripcion', 'type' => 'textarea', 'validation' => 'required|string|min:5|max:5000', 'width' => 'col-sm-10'];

        $columns[] = ['label' => 'Lote', 'name' => 'lote', 'type' => 'text', 'required' => true];
        $columns[] = ['label' => 'Cantidad Disponible', 'name' => 'cantidad_entrada', 'type' => 'number', 'required' => true];
        $columns[] = ['label' => 'Material', 'name' => 'material_id', 'type' => 'datamodal', 'datamodal_table' => 'material', 'datamodal_columns' => 'codigo,tx_descripcion', 'datamodal_where' => '', 'datamodal_size' => 'large'];

        $columns[] = ['label' => 'Entrada', 'name' => 'entrada', 'type' => 'hidden', 'required' => true];

        $this->form[] = ['label' => 'Registro de Materiales', 'name' => 'registro_detalle_entrada_mat', 'type' => 'child', 'columns' => $columns, 'table' => 'registro_detalle_entrada_mat', 'foreign_key' => 'registro_entrada_mat_id'];
        # END FORM DO NOT REMOVE THIS LINE

        # OLD START FORM
        //$this->form = [];
        //$this->form[] = ["label"=>"Fecha Entrada","name"=>"fecha_entrada","type"=>"date","required"=>TRUE,"validation"=>"required|date"];
        //$this->form[] = ["label"=>"Factura","name"=>"factura","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
        //$this->form[] = ["label"=>"Prueba Tecnica","name"=>"id_prueba_tecnica","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"prueba_tecnica,id"];
        //$this->form[] = ["label"=>"Descripcion","name"=>"descripcion","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
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
            $("#registrodematerialescantidad_entrada").on("blur",function(){
                var cant = $("#registrodematerialescantidad_entrada").val();
                $("#registrodematerialesentrada").val(cant);
                //alert($("#registrodematerialesentrada").val());
            });
        ';

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
        foreach ($postdata as $key => $value) {
            $this->registro_nuevo .= $key . ": <strong>" . $value . "</strong><br>";
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
        $lotes = DB::table('registro_detalle_entrada_mat')
            ->join('material', 'registro_detalle_entrada_mat.material_id', 'material.id')
            ->select(
                'registro_detalle_entrada_mat.registro_entrada_mat_id',
                'registro_detalle_entrada_mat.lote',
                'registro_detalle_entrada_mat.cantidad_entrada',
                'registro_detalle_entrada_mat.material_id',
                'registro_detalle_entrada_mat.created_at',
                'registro_detalle_entrada_mat.updated_at',
                'material.codigo'
            )
            ->where('registro_entrada_mat_id', '=', $id)->get();
        foreach ($lotes as $lote) {
            $entrada   = DB::table('material')->where('id', '=', $lote->material_id)->first();
            $disp_base = $entrada->nu_disponible;
            $dispo     = $disp_base + $lote->cantidad_entrada;
            DB::table('material')
                ->where('id', $lote->material_id)
                ->update(['nu_disponible' => $dispo]);
        }
        // $registro = $this->registro_nuevo . "Material: <strong>" . $entrada->codigo . "</strong><br>";
        $registro = "";
        foreach ($lotes as $lot) {
            $registro .= "Material: " . $lot->codigo . ", Lote " . $lot->lote . ", Cantidad: " . $lot->cantidad_entrada . "; ";
        }
        // dd($registro);
        $this->clases->auditoria("Materiales - Registro Entrada Detalles", "Insertar", $registro, '');

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
        $this->registro_viejo = '';
        $entrada              = DB::table('registro_entrada_mat')->where('id', '=', $id)->get();
        foreach ($entrada as $ent) {
            $this->registro_viejo .= "Fecha de Entrada: " . ": <strong>" . $ent->fecha_entrada . "</strong> Factura: <strong>" . $ent->factura . "</strong> Descripción: <strong>" . $ent->descripcion . "</strong><br>";
        }
        // dd($this->registro_viejo);
        $lotes = DB::table('registro_detalle_entrada_mat')
            ->join('material', 'registro_detalle_entrada_mat.material_id', 'material.id')
            ->select(
                'registro_detalle_entrada_mat.registro_entrada_mat_id',
                'registro_detalle_entrada_mat.lote',
                'registro_detalle_entrada_mat.cantidad_entrada',
                'registro_detalle_entrada_mat.material_id',
                'registro_detalle_entrada_mat.created_at',
                'registro_detalle_entrada_mat.updated_at',
                'material.codigo'
            )
            ->where('registro_entrada_mat_id', '=', $id)->get();
        // $registro = $this->registro_viejo . "Material: <strong>" . $entrada->codigo . "</strong><br>";

        foreach ($lotes as $lot) {
            $registro .= "Material: " . $lot->codigo . ", Lote " . $lot->lote . ", Cantidad: " . $lot->cantidad_entrada . "; ";
        }
        foreach ($lotes as $lote) {
            $entrada   = DB::table('material')->where('id', '=', $lote->material_id)->first();
            $disp_base = $entrada->nu_disponible;
            $dispo     = $disp_base - $lote->cantidad_entrada;
            DB::table('material')
                ->where('id', $lote->material_id)
                ->update(['nu_disponible' => $dispo]);
            DB::table('registro_detalle_entrada_mat')->where('registro_entrada_mat_id', '=', $id)->delete();
        }
        // dd($registro);
        $registro = $this->registro_viejo . $registro;
        $this->clases->auditoria("Materiales - Registro Entrada Detalles", "Eliminar", '', $registro);
    }

    /*
    | ----------------------------------------------------------------------
    | Hook for execute command after delete public static function called
    | ----------------------------------------------------------------------
    | @id       = current id
    |
     */
    public function hook_after_delete($id) {

    }

    //By the way, you can still create your own method in here... :)

}