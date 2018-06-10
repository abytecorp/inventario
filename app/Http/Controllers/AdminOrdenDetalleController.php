<?php
namespace App\Http\Controllers;

use App\Http\Controllers\clases;
use App\Http\Controllers\tareas;
use CRUDBooster;
use DB;
use Request;

class AdminOrdenDetalleController extends \crocodicstudio\crudbooster\controllers\CBController {

    public function cbInit() {
        $this->clases   = new clases();
        $this->tareas   = new tareas();
        $registro_nuevo = "";
        $registro_viejo = "";
        $orden_id       = Request::get('parent_id');
        $orden          = DB::table('orden')->where('id', '=', $orden_id)->first();
        $cliente        = DB::table('clientes')->where('id', '=', $orden->clientes_id)->first();
        # START CONFIGURATION DO NOT REMOVE THIS LINE
        $this->title_field         = "tx_nombre_persona";
        $this->limit               = "300";
        $this->orderby             = "id,desc";
        $this->global_privilege    = false;
        $this->button_table_action = true;
        $this->button_bulk_action  = false;
        $this->button_action_style = "button_icon";
        $this->button_add          = true;
        $this->button_edit         = false;
        $this->button_delete       = true;
        $this->button_detail       = true;
        $this->button_show         = false;
        $this->button_filter       = true;
        $this->button_import       = false;
        $this->button_export       = false;
        $this->table               = "orden_detalle";
        # END CONFIGURATION DO NOT REMOVE THIS LINE

        # START COLUMNS DO NOT REMOVE THIS LINE
        $this->col   = [];
        $this->col[] = ["label" => "Modelo", "name" => "modelo_id", "join" => "modelo,tx_modelo"];
        $this->col[] = ["label" => "Producto Terminado", "name" => "producto_terminado_id", "join" => "producto_terminado,tx_producto_terminado"];

        $this->col[] = ["label" => "VIN", 'name' => 'numero_vin_id', "join" => "numero_vin,tx_numero_vin"];
        $this->col[] = ["label" => "Talla", "name" => "tx_talla"];
        $this->col[] = ["label" => "Color", "name" => "tx_color"];
        $this->col[] = ["label" => "Marcaje", "name" => "tx_marcaje"];
        $this->col[] = ["label" => "Reflectivo", "name" => "tx_reflectivo"];
        $this->col[] = ["label" => "Persona", "name" => "tx_nombre_persona"];
        # END COLUMNS DO NOT REMOVE THIS LINE

        # START FORM DO NOT REMOVE THIS LINE
        $this->form   = [];
        $this->form[] = ['label' => 'No Orden', 'name' => 'orden_id', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'datatable' => 'orden,id'];
        $this->form[] = ['label' => 'Modelo', 'name' => 'modelo_id', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'datatable' => 'modelo,tx_modelo'];
        $this->form[] = ['label' => 'Producto Terminado', 'name' => 'producto_terminado_id', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'datatable' => 'producto_terminado,tx_producto_terminado'];
        $this->form[] = ['label' => 'Cantidad', 'name' => 'cantidad', 'type' => 'number', 'validation' => 'required|min:1|max:255|integer', 'width' => 'col-sm-10'];
        $this->form[] = ['label' => 'Talla', 'name' => 'tx_talla', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];
        $this->form[] = ['label' => 'Color', 'name' => 'tx_color', 'type' => 'select', 'validation' => 'required', 'width' => 'col-sm-10', 'dataquery' => 'SELECT distinct tx_color as label,tx_color as value FROM modelo_producto'];
        $this->form[] = ['label' => 'Marcaje', 'name' => 'tx_marcaje', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];
        $this->form[] = ['label' => 'Reflectivo', 'name' => 'tx_reflectivo', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];
        $this->form[] = ['label' => 'Detalle', 'name' => 'tx_detalle', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];
        $this->form[] = ['label' => 'Numero Vin', 'name' => 'numero_vin_id', 'type' => 'select2', 'validation' => 'required|integer|min:0', 'width' => 'col-sm-10', 'datatable' => 'numero_vin,tx_numero_vin'];
        $this->form[] = ['label' => 'Nombre Persona', 'name' => 'tx_nombre_persona', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];
        $this->form[] = ['label' => 'Uniforme de Reemplazo', 'name' => 'uniforme_reemp', 'type' => 'text', 'validation' => 'min:0|max:255', 'width' => 'col-sm-10'];
        # END FORM DO NOT REMOVE THIS LINE

        # OLD START FORM
        //$this->form = [];
        //$this->form[] = ["label"=>"Orden Id","name"=>"orden_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"orden,id"];
        //$this->form[] = ["label"=>"Modelo Id","name"=>"modelo_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"modelo,id"];
        //$this->form[] = ["label"=>"Producto Terminado Id","name"=>"producto_terminado_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"producto_terminado,id"];
        //$this->form[] = ["label"=>"Tx Talla","name"=>"tx_talla","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
        //$this->form[] = ["label"=>"Tx Color","name"=>"tx_color","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
        //$this->form[] = ["label"=>"Tx Marcaje","name"=>"tx_marcaje","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
        //$this->form[] = ["label"=>"Tx Reflectivo","name"=>"tx_reflectivo","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
        //$this->form[] = ["label"=>"Tx Detalle","name"=>"tx_detalle","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
        //$this->form[] = ["label"=>"Numero Vin Id","name"=>"numero_vin_id","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"numero_vin,id"];
        //$this->form[] = ["label"=>"Tx Nombre Persona","name"=>"tx_nombre_persona","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
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
        $this->pre_index_html = $id . '<br><div class="box box-default">
                        <div class="box-body table-responsive no-padding">
                            <table class="table table-bordered">
                              <tbody>
                                <tr class="active">
                                  <td colspan="2"><strong><i class="fa fa-bars"></i> Datos del Cliente</strong></td>
                            </tr>
                         <tr>
                          <td width="25%"><strong>
                             Nombre
                            </strong></td><td>' . $cliente->tx_nombre . '</td>
                         </tr>
                         <td width="25%"><strong>
                             Codigo del Cliente
                            </strong></td><td>' . $cliente->co_cliente . '</td>
                         </tr>

                </tbody>
                </table>
                </div>
                </div>';

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
        $orden_detalle_id = $id;
        //Acá me traigo el id de la orden
        $ordenDetalle = DB::table('orden_detalle')->where('id', '=', $id)->get();
        foreach ($ordenDetalle as $od) {
            $orden_id              = $od->orden_id;
            $modelo_id             = $od->modelo_id;
            $producto_terminado_id = $od->producto_terminado_id;
            $talla                 = $od->tx_talla;
            $color                 = $od->tx_color;
            break;
        }
        list($modelo_producto) = DB::table('modelo_producto')
            ->where('modelo_id', '=', $modelo_id)
            ->where('producto_terminado_id', '=', $producto_terminado_id)
            ->where('tx_talla', '=', $talla)
            ->where('tx_color', '=', $color)
            ->get();
        $modelo_producto_id = $modelo_producto->id;
        //Acá me traigo todos los id de materiales qie corresponden al modelo del producto
        $materiales_id = DB::table('detalle_modelo_materia')
            ->where('modelo_material_id', '=', $modelo_producto_id)
            ->select('material_id', 'cantidad')
            ->get();

        foreach ($materiales_id as $r) {
            $inserts[] = [
                'orden_id'                => $orden_id,
                'orden_detalle_id'        => $orden_detalle_id,
                'material_id'             => $r->material_id,
                'cant_requerida_material' => $r->cantidad,
            ];
        }
        // dd($materiales_id);
        // dd($modelo_producto);
        DB::table('salida_orden_material')->insert($inserts);
        $this->clases->auditoria("Detalles - Manufactura", "Insertar", $this->registro_nuevo, '');
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
        // ********************************
        $orden_detalle               = DB::table('orden_detalle')->where('id', '=', $id)->first();
        $lotes_salida_orden_material = DB::table('lotes_salida_material')
            ->join('salida_orden_material', 'lotes_salida_material.salida_orden_material_id', 'salida_orden_material.id')
            ->select('lotes_salida_material.id', 'lotes_salida_material.salida_orden_material_id', 'lotes_salida_material.lote', 'lotes_salida_material.cantidad', 'salida_orden_material.material_id')
            ->where('salida_orden_material.orden_detalle_id', '=', $orden_detalle->id)->get();
        // dd($lotes_salida_orden_material);
        foreach ($lotes_salida_orden_material as $value) { //Acá borro los lotes de salida de material y devuelvo los materiales sacados
            $this->tareas->devolverMatSacadoEliminarOrdenDetalle(
                $value->salida_orden_material_id,
                $value->lote,
                $value->cantidad,
                $value->material_id
            );
            DB::table('lotes_salida_material')->where('salida_orden_material_id', '=', $value->id)->delete();
        }
        DB::table('salida_orden_material')->where('orden_detalle_id', '=', $id)->delete();
        foreach ($orden_detalle as $key => $value) {
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
        $this->clases->auditoria("Detalles - Manufactura", "Eliminar", '', $this->registro_viejo);
    }

    //By the way, you can still create your own method in here... :)

}