<?php

namespace App\Http\Controllers;

use CRUDBooster;
use Session;

class AdminProveedorController extends \crocodicstudio\crudbooster\controllers\CBController {

    public function cbInit() {

        if (Session::get('admin_privileges') > 2) {

            $pais = ['label' => 'Pais', 'name' => 'pais', 'type' => 'text', 'validation' => 'required|max:255', 'width' => 'col-sm-10', 'value' => 'Colombia', 'readonly' => 'true'];

        } else {

            $pais = ['label' => 'Pais', 'name' => 'pais', 'type' => 'text', 'validation' => 'required|max:255', 'width' => 'col-sm-10', 'placeholder' => 'Colombia'];

        }

        # START CONFIGURATION DO NOT REMOVE THIS LINE

        $this->title_field = "id";

        $this->limit = "20";

        $this->orderby = "id,desc";

        $this->global_privilege = false;

        $this->button_table_action = true;

        $this->button_bulk_action = true;

        $this->button_action_style = "button_icon";

        $this->button_add = true;

        $this->button_edit = true;

        $this->button_delete = true;

        $this->button_detail = true;

        $this->button_show = false;

        $this->button_filter = true;

        $this->button_import = false;

        $this->button_export = false;

        $this->table = "proveedor";

        # END CONFIGURATION DO NOT REMOVE THIS LINE

        # START COLUMNS DO NOT REMOVE THIS LINE

        $this->col = [];

        $this->col[] = ["label" => "Nombre", "name" => "tx_nombre"];

        $this->col[] = ["label" => "Número Teléfono", "name" => "nu_telefono"];

        $this->col[] = ["label" => "Contacto", "name" => "tx_contacto"];

        $this->col[] = ["label" => "Fecha de Registro", "name" => "created_at"];

        # END COLUMNS DO NOT REMOVE THIS LINE

        # START FORM DO NOT REMOVE THIS LINE

        $this->form = [];

        $this->form[] = ['label' => 'Nombre', 'name' => 'tx_nombre', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];

        $this->form[] = ['label' => 'Número de Teléfono', 'name' => 'nu_telefono', 'type' => 'text', 'validation' => 'required', 'width' => 'col-sm-10'];

        $this->form[] = ['label' => 'Número de Celular', 'name' => 'celular', 'type' => 'text', 'validation' => 'required', 'width' => 'col-sm-10'];

        $this->form[] = ['label' => 'Número de Fax', 'name' => 'fax', 'type' => 'text', 'validation' => 'required', 'width' => 'col-sm-10'];

        $this->form[] = ['label' => 'Razon Social', 'name' => 'tx_razon_social', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];

        $this->form[] = ['label' => 'Nombre del Contacto', 'name' => 'tx_contacto', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];

        $this->form[] = ['label' => 'Tipo Tributaria', 'name' => 'tipo_tributaria_id', 'type' => 'select2', 'validation' => 'required|min:0', 'width' => 'col-sm-10', 'datatable' => 'tipo_tributaria,tx_tipo'];

        $this->form[] = ['label' => 'Número Tributaria', 'name' => 'nu_tributaria', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];

        $this->form[] = ['label' => 'Dirección', 'name' => 'tx_direccion', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];

        $this->form[] = ['label' => 'Ciudad', 'name' => 'tx_ciudad', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];

        $this->form[] = $pais;

        $this->form[] = ['label' => 'Correo', 'name' => 'tx_correo', 'type' => 'email', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];

        $this->form[] = ['label' => 'Observacion', 'name' => 'tx_observacion', 'type' => 'textarea', 'validation' => 'required|string|min:5|max:5000', 'width' => 'col-sm-10'];

        $this->form[] = ['label' => 'Nombre del Banco', 'name' => 'tx_banco', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];

        $this->form[] = ['label' => 'Número de Cuenta', 'name' => 'nu_cuenta', 'type' => 'text', 'validation' => 'required', 'width' => 'col-sm-10'];

        $this->form[] = ['label' => 'Tipo Cuenta', 'name' => 'tipo_cuenta_id', 'type' => 'select2', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10', 'datatable' => 'tipo_cuenta,tx_tipo_cuenta'];

        $this->form[] = ['label' => 'Nombre Cuenta', 'name' => 'tx_nombre_cuenta', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];

        $this->form[] = ['label' => 'Nu Cc', 'name' => 'nu_cc', 'type' => 'text', 'validation' => 'required|min:1|max:255', 'width' => 'col-sm-10'];

        $this->form[] = ["label" => "", "name" => "custom_field", "type" => "custom", "html" => '<div class="bg-primary"><strong><h4 align="center">RÉGIMEN DE IVA</h4></strong></div>', 'width' => 'col-sm-10'];

        $this->form[] = ['label' => 'Régimen', 'name' => 'regimen_iva_id', 'type' => 'select2', 'width' => 'col-sm-10', 'datatable' => 'regimen_iva,regimen_iva'];

        $this->form[] = ['label' => 'Resol. N°', 'name' => 'regimen_iva_resol', 'type' => 'text', 'width' => 'col-sm-10'];

        $this->form[] = ["label" => "", "name" => "custom_field", "type" => "custom", "html" => '<div class="bg-primary"><strong><h4 align="center">GRAN CONTRIBUYENTE</h4></strong></div>', 'width' => 'col-sm-10'];

        $this->form[] = ['label' => 'Gran Contribuyente', 'name' => 'gran_contribuyente_sino_id', 'type' => 'select2', 'width' => 'col-sm-10', 'datatable' => 'sino,sino'];

        $this->form[] = ['label' => 'Resol. N°', 'name' => 'gran_contribuyente_resol', 'type' => 'text', 'width' => 'col-sm-10'];

        $this->form[] = ["label" => "", "name" => "custom_field", "type" => "custom", "html" => '<div class="bg-primary"><strong><h4 align="center">AGENTE RETENEDOR</h4></strong></div>', 'width' => 'col-sm-10'];

        $this->form[] = ['label' => 'Agente Retenedor', 'name' => 'agente_retenedor_sino_id', 'type' => 'select2', 'width' => 'col-sm-10', 'datatable' => 'sino,sino'];

        $this->form[] = ['label' => 'Resol. N°', 'name' => 'agente_retenedor_resol', 'type' => 'text', 'width' => 'col-sm-10'];

        $this->form[] = ["label" => "", "name" => "custom_field", "type" => "custom", "html" => '<div class="bg-primary"><strong><h4 align="center">RETENCIÓN EN LA FUENTE</h4></strong></div>', 'width' => 'col-sm-10'];

        $this->form[] = ['label' => 'Retención en la Fuente', 'name' => 'retencion_fuente_sino_id', 'type' => 'select2', 'width' => 'col-sm-10', 'datatable' => 'sino,sino'];

        $this->form[] = ["label" => "", "name" => "custom_field", "type" => "custom", "html" => '<div class="bg-primary"><strong><h4 align="center">ACTIVIDAD ECONÓMICA PRINCIPAL</h4></strong></div>', 'width' => 'col-sm-10'];

        $this->form[] = ['label' => 'Actividad Principal', 'name' => 'actividad_principal', 'type' => 'text', 'width' => 'col-sm-10'];

        $this->form[] = ['label' => 'Código Actividad Principal', 'name' => 'codigo_actividad_principal', 'type' => 'text', 'width' => 'col-sm-10'];

        # END FORM DO NOT REMOVE THIS LINE

        # OLD START FORM

        //$this->form = [];

        //$this->form[] = ['label'=>'Nombre','name'=>'tx_nombre','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];

        //$this->form[] = ['label'=>'Nit','name'=>'tx_nit','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];

        //$this->form[] = ['label'=>'Número de Teléfono','name'=>'nu_telefono','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];

        //$this->form[] = ['label'=>'Razon Social','name'=>'tx_razon_social','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];

        //$this->form[] = ['label'=>'Nombre del Contacto','name'=>'tx_contacto','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];

        //$this->form[] = ['label'=>'Tipo Tributaria','name'=>'tipo_tributaria_id','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'tipo_tributaria,tx_tipo_tributaria'];

        //$this->form[] = ['label'=>'Número Tributaria','name'=>'nu_tributaria','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];

        //$this->form[] = ['label'=>'Dirección','name'=>'tx_direccion','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];

        //$this->form[] = ['label'=>'Ciudad','name'=>'tx_ciudad','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];

        //$this->form[] = ['label'=>'Correo','name'=>'tx_correo','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];

        //$this->form[] = ['label'=>'Observacion','name'=>'tx_observacion','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];

        //$this->form[] = ['label'=>'Nombre del Banco','name'=>'tx_banco','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];

        //$this->form[] = ['label'=>'Número de Cuenta','name'=>'nu_cuenta','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];

        //$this->form[] = ['label'=>'Tipo Cuenta','name'=>'tipo_cuenta_id','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'tipo_cuenta,tx_tipo_cuenta'];

        //$this->form[] = ['label'=>'Nombre Cuenta','name'=>'tx_nombre_cuenta','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];

        //$this->form[] = ['label'=>'Nu Cc','name'=>'nu_cc','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];

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

        $this->sub_module[] = ['label' => 'Bienes y Servicios', 'path' => 'bien_ser_proveedor', 'parent_columns' => 'tx_nombre', 'foreign_key' => 'proveedor_id', 'button_color' => 'success', 'button_icon' => 'fa fa-bars'];

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
        if (Session::get('admin_privileges') > 2) {
            $query->where('pais', '=', 'Colombia');
        }
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