<?php

namespace App\Http\Controllers;

use App\Http\Controllers\clases;
use DB;
use PDF;
use Request;
use Session;

class tareas extends Controller {

    public function __construct() {
        $this->clases = new clases();
    }

    public function REPORTES() {
        $data['reportes'] = DB::table('reportes')->orderBy('codigo')->get();
        return view('reportes.index', $data);
    }
    public function PGP2_R4_4_FILTRO() {
        $data['reporte'] = $this->PGP2_R4_4_QUERY();
        return view('reportes.PGP2_R4_4.filtros', $data);
    }
    public function PGP2_R4_4_REPORTE_DESCARGAR() {
        $vista           = 'reportes.PGP2_R4_4.reporte';
        $data['reporte'] = $this->PGP2_R4_4_QUERY();
        $nombreArchivo   = "PGP2_R4_4.pdf";

        $pdf = PDF::setOptions(['images' => true])
            ->loadView($vista, $data);
        return $pdf->download($nombreArchivo);
    }
    public function PGP2_R4_4_REPORTE() {
        $vista           = 'reportes.PGP2_R4_4.reporte';
        $data['reporte'] = $this->PGP2_R4_4_QUERY();
        $nombreArchivo   = "PGP2_R4_4.pdf";
        return view($vista, $data);
    }
    public function PGP2_R4_4_QUERY() {
        return DB::table('pgp2_r4_4')->get();
    }
    public function PGR1_R2_FILTRO() {
        $data['combos'] = $this->PGR1_R2_QUERY(0);
        return view('reportes.PGR1_R2.filtros', $data);
    }
    public function PGR1_R2_REPORTE_DESCARGAR() {
        $proveedor_id    = Request::get('proveedor_id');
        $vista           = 'reportes.PGR1_R2.reporte';
        $data['esPDF']   = 1;
        $data['reporte'] = $this->PGR1_R2_QUERY($proveedor_id);
        $nombreArchivo   = "PGR1_R2.pdf";

        $pdf = PDF::setOptions(['images' => true])
            ->loadView($vista, $data);
        return $pdf->download($nombreArchivo);
        // return $this->pdf($vista, $data, $nombreArchivo);
    }
    public function PGR1_R2_REPORTE() {
        $proveedor_id    = Request::get('proveedor_id');
        $vista           = 'reportes.PGR1_R2.reporte';
        $data['esPDF']   = 0;
        $data['reporte'] = $this->PGR1_R2_QUERY($proveedor_id);
        $nombreArchivo   = "PGR1_R2.pdf";
        return view($vista, $data);
    }
    public function PGR1_R2_QUERY($proveedor_id) {
        if ($proveedor_id > 0) {
            if (Session::get('admin_privileges') > 2) {
                return DB::table('pgr1_r2')->where('pais', '=', 'Colombia')->where('proveedor_id', '=', $proveedor_id)->get();
            } else {
                return DB::table('pgr1_r2')->where('proveedor_id', '=', $proveedor_id)->get();
            }
        } else {
            if (Session::get('admin_privileges') > 2) {
                return DB::table('pgr1_r2')->where('pais', '=', 'Colombia')->get();
            } else {
                return DB::table('pgr1_r2')->get();
            }
        }
    }
    public function PGP2_R4_5_FILTRO() {
        $data['reporte'] = $this->PGP2_R4_5_QUERY();
        return view('reportes.PGP2_R4_5.filtros', $data);
    }
    public function PGP2_R4_5_REPORTE_DESCARGAR() {
        $vista           = 'reportes.PGP2_R4_5.reporte';
        $data['reporte'] = $this->PGP2_R4_5_QUERY();
        $nombreArchivo   = "PGP2_R4_5.pdf";

        $pdf = PDF::setOptions(['images' => true])
            ->loadView($vista, $data);
        return $pdf->download($nombreArchivo);
    }
    public function PGP2_R4_5_REPORTE() {
        $vista           = 'reportes.PGP2_R4_5.reporte';
        $data['reporte'] = $this->PGP2_R4_5_QUERY();
        $nombreArchivo   = "PGP2_R4_5.pdf";
        return view($vista, $data);
    }
    public function PGP2_R4_5_QUERY() {
        return DB::table('pgp2_r4_5')->get();
    }
    public function PGP2_R4_3_FILTRO() {
        $data['reporte'] = $this->PGP2_R4_3_QUERY();
        return view('reportes.PGP2_R4_3.filtros', $data);
    }
    public function PGP2_R4_3_REPORTE_DESCARGAR() {
        $vista           = 'reportes.PGP2_R4_3.reporte';
        $data['reporte'] = $this->PGP2_R4_3_QUERY();
        $nombreArchivo   = "PGP2_R4_3.pdf";

        $pdf = PDF::setOptions(['images' => true])
            ->loadView($vista, $data);
        return $pdf->download($nombreArchivo);
    }
    public function PGP2_R4_3_REPORTE() {
        $vista           = 'reportes.PGP2_R4_3.reporte';
        $data['reporte'] = $this->PGP2_R4_3_QUERY();
        $nombreArchivo   = "PGP2_R4_3.pdf";
        return view($vista, $data);
    }
    public function PGP2_R4_3_QUERY() {
        return DB::table('pgp2_r4_3')->get();
    }
    public function PGP2_R4_2_FILTRO() {
        $data['reporte'] = $this->PGP2_R4_2_QUERY();
        return view('reportes.PGP2_R4_2.filtros', $data);
    }
    public function PGP2_R4_2_REPORTE_DESCARGAR() {
        $vista           = 'reportes.PGP2_R4_2.reporte';
        $data['reporte'] = $this->PGP2_R4_2_QUERY();
        $nombreArchivo   = "PGP2_R4_2.pdf";

        $pdf = PDF::setOptions(['images' => true])
            ->loadView($vista, $data);
        return $pdf->download($nombreArchivo);
    }
    public function PGP2_R4_2_REPORTE() {
        $vista           = 'reportes.PGP2_R4_2.reporte';
        $data['reporte'] = $this->PGP2_R4_2_QUERY();
        $nombreArchivo   = "PGP2_R4_2.pdf";
        return view($vista, $data);
    }
    public function PGP2_R4_2_QUERY() {
        return DB::table('pgp2_r4_2')->get();
    }
    public function PGP2_R4_1_FILTRO() {
        $data['reporte'] = $this->PGP2_R4_1_QUERY();
        return view('reportes.PGP2_R4_1.filtros', $data);
    }
    public function PGP2_R4_1_REPORTE_DESCARGAR() {
        $vista           = 'reportes.PGP2_R4_1.reporte';
        $data['reporte'] = $this->PGP2_R4_1_QUERY();
        $nombreArchivo   = "PGP2_R4_1.pdf";

        $pdf = PDF::setOptions(['images' => true])
            ->loadView($vista, $data);
        return $pdf->download($nombreArchivo);
    }
    public function PGP2_R4_1_REPORTE() {
        $vista           = 'reportes.PGP2_R4_1.reporte';
        $data['reporte'] = $this->PGP2_R4_1_QUERY();
        $nombreArchivo   = "PGP2_R4_1.pdf";
        return view($vista, $data);
    }
    public function PGP2_R4_1_QUERY() {
        return DB::table('pgp2_r4_1')->get();
    }
    public function PGP2_R6_FILTRO() {
        $data['combos'] = $this->PGP2_R6_QUERY(0);
        return view('reportes.PGP2_R6.filtros', $data);
    }
    public function PGP2_R6_REPORTE_DESCARGAR() {
        $orden_id        = Request::get('orden_id');
        $vista           = 'reportes.PGP2_R6.reporte';
        $data['esPDF']   = 1;
        $data['reporte'] = $this->PGP2_R6_QUERY($orden_id);
        $nombreArchivo   = "PGP2_R6.pdf";

        $pdf = PDF::setOptions(['images' => true])
            ->loadView($vista, $data);
        return $pdf->download($nombreArchivo);
    }
    public function PGP2_R6_REPORTE() {
        $orden_id        = Request::get('orden_id');
        $vista           = 'reportes.PGP2_R6.reporte';
        $data['esPDF']   = 0;
        $data['reporte'] = $this->PGP2_R6_QUERY($orden_id);
        $nombreArchivo   = "PGP2_R6.pdf";
        return view($vista, $data);
    }
    public function PGP2_R6_QUERY($orden_id) {
        if ($orden_id > 0) {
            return DB::table('pgp2_r6')->where('orden_id', '=', $orden_id)->get();
        } else {
            return DB::table('pgp2_r6')->get();
        }
    }
    public function PGP3_R3_FILTRO() {
        $data['orden_reparacion'] = DB::table('orden_reparacion')->get();
        $data['orden_inspeccion'] = DB::table('orden_inspeccion')->get();
        return view('reportes.PGP3_R3.filtros', $data);
    }
    public function PGP3_R3_REPORTE_DESCARGAR() {
        $orden_servicio  = Request::get('orden_servicio');
        $tipo            = Request::get('tipo');
        $vista           = 'reportes.PGP3_R3.reporte';
        $data['esPDF']   = 1;
        $data['reporte'] = $this->PGP3_R3_QUERY($orden_servicio, $tipo);
        $nombreArchivo   = "PGP3_R3.pdf";

        $pdf = PDF::setOptions(['images' => true])
            ->loadView($vista, $data);
        return $pdf->download($nombreArchivo);
    }
    public function PGP3_R3_REPORTE() {
        $orden_servicio  = Request::get('orden_servicio');
        $tipo            = Request::get('tipo');
        $vista           = 'reportes.PGP3_R3.reporte';
        $data['esPDF']   = 0;
        $data['reporte'] = $this->PGP3_R3_QUERY($orden_servicio, $tipo);
        $nombreArchivo   = "PGP3_R3.pdf";
        return view($vista, $data);
    }
    public function PGP3_R3_QUERY($orden_servicio, $tipo) {
        if ($orden_servicio > 0) {
            if ($tipo == 1) {
                return DB::table('pgp3_r3_rep')->where('orden_servicio', '=', $orden_servicio)->get();
            } elseif ($tipo == 2) {
                return DB::table('pgp3_r3_insp')->where('orden_servicio', '=', $orden_servicio)->get();
            }
        } else {
            $combo = '<option value="0">Seleccione **</option>';
            if ($tipo == 1) {
                $resultado = DB::table('pgp3_r3_rep')->get();
                foreach ($resultado as $value) {
                    $combo .= '<option value="' . $value->orden_servicio . '">Orden de Servicio:' . $value->orden_servicio . ' &nbsp;&nbsp;Cliente:' . $value->tx_nombre . '&nbsp;&nbsp;VIN:' . $value->tx_numero_vin . '</option>';
                }
            } elseif ($tipo == 2) {
                $resultado = DB::table('pgp3_r3_insp')->get();
                foreach ($resultado as $value) {
                    $combo .= '<option value="' . $value->orden_servicio . '">Orden de Servicio:' . $value->orden_servicio . ' &nbsp;&nbsp;Cliente:' . $value->tx_nombre . '</option>';
                }
            }
            return $combo;
        }
    }
    public function PGP2_R5_FILTRO() {
        $data['combos'] = $this->PGP2_R5_QUERY(0);
        return view('reportes.PGP2_R5.filtros', $data);
    }
    public function PGP2_R5_REPORTE_DESCARGAR() {
        $orden_id        = Request::get('orden_id');
        $vista           = 'reportes.PGP2_R5.reporte';
        $data['esPDF']   = 1;
        $data['reporte'] = $this->PGP2_R5_QUERY($orden_id);
        $nombreArchivo   = "PGP2_R5.pdf";

        $pdf = PDF::setOptions(['images' => true])
            ->loadView($vista, $data);
        return $pdf->download($nombreArchivo);
        // return $this->pdf($vista, $data, $nombreArchivo);
    }
    public function PGP2_R5_REPORTE() {
        $orden_id        = Request::get('orden_id');
        $vista           = 'reportes.PGP2_R5.reporte';
        $data['esPDF']   = 0;
        $data['reporte'] = $this->PGP2_R5_QUERY($orden_id);
        $nombreArchivo   = "PGP2_R5.pdf";
        return view($vista, $data);
    }
    public function PGP2_R5_QUERY($orden_id) {
        if ($orden_id > 0) {
            return DB::table('pgp2_r5')->where('orden_id', '=', $orden_id)->get();
        } else {
            return DB::table('pgp2_r5')->get();
        }
    }
    public function PGR2_R1_FILTRO() {
        $data['combos'] = DB::table('anio')->get();
        return view('reportes.PGR2_R1.filtros', $data);
    }
    public function PGR2_R1_REPORTE_DESCARGAR() {
        $anio_id         = Request::get('anio_id');
        $vista           = 'reportes.PGR2_R1.reporte';
        $data['esPDF']   = 1;
        $data['reporte'] = $this->PGR2_R1_QUERY($anio_id);
        $nombreArchivo   = "PGR2_R1.pdf";

        $pdf = PDF::setOptions(['images' => true])
            ->loadView($vista, $data)
            ->setPaper('a4', 'landscape');
        return $pdf->download($nombreArchivo);
        // return $this->pdf($vista, $data, $nombreArchivo);
    }
    public function PGR2_R1_REPORTE() {
        $anio_id         = Request::get('anio_id');
        $vista           = 'reportes.PGR2_R1.reporte';
        $data['esPDF']   = 0;
        $data['reporte'] = $this->PGR2_R1_QUERY($anio_id);
        $nombreArchivo   = "PGR2_R1.pdf";
        return view($vista, $data);
    }
    public function PGR2_R1_QUERY($anio_id) {
        return DB::table('pgr2_r1')->where('anio_id', '=', $anio_id)->get();
    }
    public function PGR1_R6_FILTRO() {
        // $data['combos'] = $this->PRG1_R3_QUERY(0);
        if (Session::get('admin_privileges') > 2) {
            $data['combos'] = DB::table('proveedor')->where('pais', '=', 'Colombia')->get();
        } else {
            $data['combos'] = DB::table('proveedor')->get();
        }
        return view('reportes.PGR1_R6.filtros', $data);
    }
    public function PGR1_R6_REPORTE_DESCARGAR() {
        $proveedor_id    = Request::get('proveedor_id');
        $vista           = 'reportes.PGR1_R6.reporte';
        $data['esPDF']   = 1;
        $data['reporte'] = $this->PGR1_R6_QUERY($proveedor_id);
        $nombreArchivo   = "PGR1_R6.pdf";

        $pdf = PDF::setOptions(['images' => true])
            ->loadView($vista, $data)
            ->loadView($vista, $data);
        return $pdf->download($nombreArchivo);
        // return $this->pdf($vista, $data, $nombreArchivo);
    }
    public function PGR1_R6_REPORTE() {
        $proveedor_id    = Request::get('proveedor_id');
        $vista           = 'reportes.PGR1_R6.reporte';
        $data['esPDF']   = 0;
        $data['reporte'] = $this->PGR1_R6_QUERY($proveedor_id);
        $nombreArchivo   = "PGR1_R6.pdf";
        return view($vista, $data);
    }
    public function PGR1_R6_QUERY($proveedor_id) {
        if ($proveedor_id > 0) {
            return DB::table('pgr1_r6')
                ->join('cms_users', 'pgr1_r6.id_responsable', 'cms_users.id')
                ->where('pgr1_r6.proveedor_id', '=', $proveedor_id)->get();
        } else {
            return DB::table('pgr1_r6')->join('cms_users', 'pgr1_r6.id_responsable', 'cms_users.id')->get();
        }
    }
    public function PGR2_R3_FILTRO() {
        return view('reportes.PGR2_R3.filtros');
    }
    public function PGR2_R3_REPORTE_DESCARGAR() {
        $vista           = 'reportes.PGR2_R3.reporte';
        $data['esPDF']   = 1;
        $data['reporte'] = $this->PGR2_R3_QUERY();
        $nombreArchivo   = "PGR2_R3.pdf";

        $pdf = PDF::setOptions(['images' => true])
            ->loadView($vista, $data);
        return $pdf->download($nombreArchivo);
        // return $this->pdf($vista, $data, $nombreArchivo);
    }
    public function PGR2_R3_REPORTE() {
        $vista           = 'reportes.PGR2_R3.reporte';
        $data['esPDF']   = 0;
        $data['reporte'] = $this->PGR2_R3_QUERY();
        $nombreArchivo   = "PGR2_R3.pdf";
        return view($vista, $data);
    }
    public function PGR2_R3_QUERY() {
        return DB::table('pgr2_r3')->get();
    }
    public function PGP2_R3_FILTRO() {
        $data['combos'] = $this->PGP2_R3_QUERY(0);
        return view('reportes.PGP2_R3.filtros', $data);
    }
    public function PGP2_R3_REPORTE_DESCARGAR() {
        $orden_id        = Request::get('orden_id');
        $vista           = 'reportes.PGP2_R3.reporte';
        $data['esPDF']   = 1;
        $data['reporte'] = $this->PGP2_R3_QUERY($orden_id);
        $nombreArchivo   = "PGP2_R3.pdf";

        $pdf = PDF::setOptions(['images' => true])
            ->loadView($vista, $data)
            ->loadView($vista, $data);
        return $pdf->download($nombreArchivo);
        // return $this->pdf($vista, $data, $nombreArchivo);
    }
    public function PGP2_R3_REPORTE() {
        $orden_id        = Request::get('orden_id');
        $vista           = 'reportes.PGP2_R3.reporte';
        $data['esPDF']   = 0;
        $data['reporte'] = $this->PGP2_R3_QUERY($orden_id);
        $nombreArchivo   = "PGP2_R3.pdf";
        return view($vista, $data);
    }
    public function PGP2_R3_QUERY($orden_id) {
        if ($orden_id > 0) {
            return DB::table('pgp2_r3')->where('orden_id', '=', $orden_id)->get();
        } else {
            return DB::table('pgp2_r3')->get();
        }
    }
    public function PGP3_R5_FILTRO() {
        $data['combos'] = $this->PGP3_R5_QUERY(0);
        return view('reportes.PGP3_R5.filtros', $data);
    }
    public function PGP3_R5_REPORTE_DESCARGAR() {
        $orden_reparacion_id = Request::get('orden_reparacion_id');
        $vista               = 'reportes.PGP3_R5.reporte';
        $data['esPDF']       = 1;
        $data['reporte']     = $this->PGP3_R5_QUERY($orden_reparacion_id);
        $nombreArchivo       = "PGP3_R5.pdf";

        $pdf = PDF::setOptions(['images' => true])
            ->loadView($vista, $data)
            ->loadView($vista, $data);
        return $pdf->download($nombreArchivo);
        // return $this->pdf($vista, $data, $nombreArchivo);
    }
    public function PGP3_R5_REPORTE() {
        $orden_reparacion_id = Request::get('orden_reparacion_id');
        $vista               = 'reportes.PGP3_R5.reporte';
        $data['esPDF']       = 0;
        $data['reporte']     = $this->PGP3_R5_QUERY($orden_reparacion_id);
        $nombreArchivo       = "PGP3_R5.pdf";
        return view($vista, $data);
    }
    public function PGP3_R5_QUERY($orden_reparacion_id) {
        if ($orden_reparacion_id > 0) {
            return DB::table('pgp3_r5')->where('orden_reparacion_id', '=', $orden_reparacion_id)->get();
        } else {
            return DB::table('pgp3_r5')->get();
        }
    }
    public function PGP3_R4_FILTRO() {
        $data['combos'] = $this->PGP3_R4_QUERY(0);
        return view('reportes.PGP3_R4.filtros', $data);
    }
    public function PGP3_R4_REPORTE_DESCARGAR() {
        $orden_inspeccion_id = Request::get('orden_inspeccion_id');
        $vista               = 'reportes.PGP3_R4.reporte';
        $data['esPDF']       = 1;
        $data['reporte']     = $this->PGP3_R4_QUERY($orden_inspeccion_id);
        $nombreArchivo       = "PGP3_R4.pdf";

        $pdf = PDF::setOptions(['images' => true])
            ->loadView($vista, $data)
            ->loadView($vista, $data);
        return $pdf->download($nombreArchivo);
        // return $this->pdf($vista, $data, $nombreArchivo);
    }
    public function PGP3_R4_REPORTE() {
        $orden_inspeccion_id = Request::get('orden_inspeccion_id');
        $vista               = 'reportes.PGP3_R4.reporte';
        $data['esPDF']       = 0;
        $data['reporte']     = $this->PGP3_R4_QUERY($orden_inspeccion_id);
        $nombreArchivo       = "PGP3_R4.pdf";
        return view($vista, $data);
    }
    public function PGP3_R4_QUERY($orden_inspeccion_id) {
        if ($orden_inspeccion_id > 0) {
            return DB::table('pgp3_r4')->where('orden_inspeccion_id', '=', $orden_inspeccion_id)->get();
        } else {
            return DB::table('pgp3_r4')->get();
        }
    }
    public function PGP2_R7_FILTRO() {
        $data['ordenes']  = DB::table('orden')->get();
        $data['clientes'] = DB::table('clientes')->get();
        return view('reportes.PGP2_R7.filtros', $data);
    }
    public function PGP2_R7_REPORTE_DESCARGAR() {
        $cliente         = Request::get('cliente');
        $vista           = 'reportes.PGP2_R7.reporte';
        $data['esPDF']   = 1;
        $data['reporte'] = $this->PGP2_R7_QUERY($cliente);
        $nombreArchivo   = "PGP2_R7.pdf";

        $pdf = PDF::setOptions(['images' => true])
            ->loadView($vista, $data)
            ->loadView($vista, $data);
        return $pdf->download($nombreArchivo);
        // return $this->pdf($vista, $data, $nombreArchivo);
    }
    public function PGP2_R7_REPORTE() {
        $cliente         = Request::get('cliente');
        $vista           = 'reportes.PGP2_R7.reporte';
        $data['esPDF']   = 0;
        $data['reporte'] = $this->PGP2_R7_QUERY($cliente);
        $nombreArchivo   = "PGP2_R7.pdf";
        return view($vista, $data);
    }
    public function PGP2_R7_QUERY($cliente) {
        if ($cliente != 'todo') {
            return DB::table('pgp2_r7')
                ->Where(function ($query) use ($cliente) {
                    $query->Where('cliente', '=', $cliente);
                })
                ->get();
        } else {
            return DB::table('pgp2_r7')->get();
        }
    }
    public function PGR1_R4_FILTRO() {
        if (Session::get('admin_privileges') > 2) {
            $data['proveedores'] = DB::table('proveedor')->where('pais', '=', 'Colombia')->get();
        } else {
            $data['proveedores'] = DB::table('proveedor')->get();
        }
        return view('reportes.PGR1_R4.filtros', $data);
    }
    public function PGR1_R4_REPORTE_DESCARGAR() {
        $fecha_inicio    = Request::get('fecha_inicio');
        $fecha_fin       = Request::get('fecha_fin');
        $proveedor_id    = Request::get('proveedor_id');
        $vista           = 'reportes.PGR1_R4.reporte';
        $data['esPDF']   = 1;
        $data['reporte'] = $this->PGR1_R4_QUERY($fecha_inicio, $fecha_fin, $proveedor_id);
        $nombreArchivo   = "PGR1_R4.pdf";

        $pdf = PDF::setOptions(['images' => true])
            ->loadView($vista, $data)
            ->loadView($vista, $data);
        return $pdf->download($nombreArchivo);
        // return $this->pdf($vista, $data, $nombreArchivo);
    }
    public function PGR1_R4_REPORTE() {
        $fecha_inicio    = Request::get('fecha_inicio');
        $fecha_fin       = Request::get('fecha_fin');
        $proveedor_id    = Request::get('proveedor_id');
        $vista           = 'reportes.PGR1_R4.reporte';
        $data['esPDF']   = 0;
        $data['reporte'] = $this->PGR1_R4_QUERY($fecha_inicio, $fecha_fin, $proveedor_id);
        $nombreArchivo   = "PGR1_R4.pdf";
        return view($vista, $data);
    }
    public function PGR1_R4_QUERY($fecha_inicio, $fecha_fin, $proveedor_id) {
        if ((strlen($fecha_inicio) > 0) && (strlen($fecha_fin) > 0)) {
            return DB::table('pgr1_r4')
                ->whereBetween('fecha_evaluacion', [$fecha_inicio, $fecha_fin])
                ->where('proveedor_id', '=', $proveedor_id)
                ->get();
        } else {
            return DB::table('pgr1_r4')->get();
        }
    }
    public function PGR1_R3_FILTRO() {
        if (Session::get('admin_privileges') > 2) {
            $data['combos'] = DB::table('pgr1_r3')->where('pais', '=', 'Colombia')->groupBy('compania')->get();
        } else {
            $data['combos'] = DB::table('pgr1_r3')->groupBy('compania')->get();
        }

        return view('reportes.PGR1_R3.filtros', $data);
    }
    public function PGR1_R3_REPORTE_DESCARGAR() {
        $proveedor_id    = Request::get('proveedor_id');
        $vista           = 'reportes.PGR1_R3.reporte';
        $data['esPDF']   = 1;
        $data['reporte'] = $this->PGR1_R3_QUERY($proveedor_id);
        $nombreArchivo   = "PGR2_R2.pdf";

        $pdf = PDF::setOptions(['images' => true])
            ->loadView($vista, $data)
            ->loadView($vista, $data);
        return $pdf->download($nombreArchivo);
        // return $this->pdf($vista, $data, $nombreArchivo);
    }
    public function PGR1_R3_REPORTE() {
        $proveedor_id    = Request::get('proveedor_id');
        $vista           = 'reportes.PGR1_R3.reporte';
        $data['esPDF']   = 0;
        $data['reporte'] = $this->PGR1_R3_QUERY($proveedor_id);
        $nombreArchivo   = "PGR1_R3.pdf";
        return view($vista, $data);
    }
    public function PGR1_R3_QUERY($proveedor_id) {
        if ($proveedor_id > 0) {
            if (Session::get('admin_privileges') > 2) {
                return DB::table('pgr1_r3')->where('pais', '=', 'Colombia')->where('proveedor_id', '=', $proveedor_id)->get();
            } else {
                return DB::table('pgr1_r3')->where('proveedor_id', '=', $proveedor_id)->get();
            }
        } else {
            if (Session::get('admin_privileges') > 2) {
                return DB::table('pgr1_r3')->where('pais', '=', 'Colombia')->get();
            } else {
                return DB::table('pgr1_r3')->get();
            }
        }
    }
    public function PGR2_R2_FILTRO() {
        $data['combos'] = $this->PRG2_R2_QUERY(0);
        return view('reportes.PGR2_R2.filtros', $data);
    }
    public function PGR2_R2_REPORTE_DESCARGAR() {
        $orden_reparacion_id = Request::get('orden_reparacion_id');
        $vista               = 'reportes.PGR2_R2.reporte';
        $data['esPDF']       = 1;
        $data['reporte']     = $this->PRG2_R2_QUERY($orden_reparacion_id);
        $nombreArchivo       = "PGR2_R2.pdf";

        $pdf = PDF::setOptions(['images' => true])
            ->loadView($vista, $data)
            ->loadView($vista, $data);
        return $pdf->download($nombreArchivo);
        // return $this->pdf($vista, $data, $nombreArchivo);
    }
    public function PGR2_R2_REPORTE() {
        $orden_reparacion_id = Request::get('orden_reparacion_id');
        $vista               = 'reportes.PGR2_R2.reporte';
        $data['esPDF']       = 0;
        $data['reporte']     = $this->PRG2_R2_QUERY($orden_reparacion_id);
        $nombreArchivo       = "PGR2_R2.pdf";
        return view($vista, $data);
    }
    public function PRG2_R2_QUERY($orden_reparacion_id) {
        return DB::table('orden_reparacion')
            ->join('orden', 'orden_reparacion.orden_id', 'orden.id')
            ->join('clientes', 'orden.clientes_id', 'clientes.id')
            ->join('modelo', 'orden_reparacion.modelo_id', 'modelo.id')
            ->join('numero_vin', 'orden_reparacion.numero_vin_id', 'numero_vin.id')
            ->select(
                'orden_reparacion.id',
                'orden_reparacion.orden_id',
                'clientes.tx_nombre',
                'orden_reparacion.comentario_ent',
                'modelo.tx_modelo',
                'orden_reparacion.talla',
                'numero_vin.tx_numero_vin',
                'orden_reparacion.guia_correo_ent',
                'orden_reparacion.fecha_reparacion',
                'orden_reparacion.guia_correo_sal',
                'orden_reparacion.created_at as fecha_solicitud',
                'orden_reparacion.comentario_sal'
            )
            ->Where(function ($query) use ($orden_reparacion_id) {
                if ($orden_reparacion_id > 0) {
                    $query->Where('orden_reparacion.id', '=', $orden_reparacion_id);
                }
            })
            ->get();
    }
    public function PGR1_R1_FILTRO() {
        $data['combos'] = $this->PRG1_R1_QUERY('0', '0', 0);
        return view('reportes.PGR1_R1.filtros', $data);
    }
    public function PGR1_R1_REPORTE_DESCARGAR() {
        $nit              = Request::get('nit');
        $nombre           = Request::get('nombre');
        $bien_servicio_id = Request::get('bien_servicio_id');
        $vista            = 'reportes.PGR1_R1.reporte';
        $data['esPDF']    = 1;
        $data['reporte']  = $this->PRG1_R1_QUERY($nit, $nombre, $bien_servicio_id);
        $nombreArchivo    = "PGR1_R1.pdf";
        return $this->pdf($vista, $data, $nombreArchivo);
    }
    public function PGR1_R1_REPORTE() {
        $nit              = Request::get('nit');
        $nombre           = Request::get('nombre');
        $bien_servicio_id = Request::get('bien_servicio_id');
        $vista            = 'reportes.PGR1_R1.reporte';
        $data['esPDF']    = 0;
        $data['reporte']  = $this->PRG1_R1_QUERY($nit, $nombre, $bien_servicio_id);
        $nombreArchivo    = "PGR1_R1.pdf";
        return view($vista, $data);
    }
    public function PRG1_R1_QUERY($nit, $nombre, $bien_servicio_id) {
        return DB::table('detalle_servicio')
            ->join('orden_bien_servicio', 'detalle_servicio.orden_bien_servicio_id', 'orden_bien_servicio.id')
            ->join('proveedor', 'orden_bien_servicio.proveedor_id', 'proveedor.id')
            ->join('bien_ser_proveedor', 'detalle_servicio.bien_ser_proveedor_id', 'bien_ser_proveedor.id')
            ->join('bien_servicio', 'bien_ser_proveedor.bien_id', 'bien_servicio.id')
            ->select(
                'bien_ser_proveedor.id',
                // 'proveedor.tx_razon_social as empresa',
                'bien_servicio.id as bien_servicio_id',
                'proveedor.nu_tributaria as nit',
                'proveedor.tx_nombre as nombre',
                'bien_servicio.tx_nombre as bien_servicio',
                'detalle_servicio.descripcion'
            )
        // ->where($filtro1A, $filtro1B, $filtro1C)
            ->Where(function ($query) use ($nit, $nombre, $bien_servicio_id) {
                if ($nit != '0') {
                    $query->where('proveedor.nu_tributaria', '=', $nit);
                }
                if ($nombre != '0') {
                    $query->where('proveedor.tx_nombre', '=', $nombre);
                }
                if ($bien_servicio_id > 0) {
                    $query->where('bien_servicio.id', '=', $bien_servicio_id);
                }

            })
            ->get();
    }

    public function devolverMatSacado() {
        $salida_orden_material_id = Request::get('salida_orden_material_id');
        $lote                     = Request::get('lote');
        $cantidad                 = Request::get('cantidad');
        $material_id              = Request::get('material_id');
        list($mat)                = DB::table('material')->where('id', '=', $material_id)->get();

        $registro_viejo = 'material: ' . $mat->tx_descripcion . ', salida_orden_material_id: ' . $salida_orden_material_id . ', lote: ' . $lote . ', cantidad: ' . $cantidad . ', created_at: ' . date('Y-m-d H:i:s');

        DB::table('lotes_salida_material')
            ->where('salida_orden_material_id', '=', $salida_orden_material_id)
            ->where('lote', '=', $lote)
            ->delete();
        $cantMatDisponible = DB::table('material')->where('id', '=', $material_id)->first();
        $disponible        = $cantMatDisponible->nu_disponible + $cantidad;
        DB::table('material')
            ->where('id', '=', $material_id)
            ->update(['nu_disponible' => $disponible]);
        //Tambien debo devolverlo del lote de donde se sacó
        $cantMatLoteEntrada = DB::table('registro_detalle_entrada_mat')
            ->where('lote', '=', $lote)
            ->where('material_id', '=', $material_id)
            ->first();
        $disponibleLote = $cantMatLoteEntrada->cantidad_entrada + $cantidad;
        DB::table('registro_detalle_entrada_mat')
            ->where('lote', '=', $lote)
            ->where('material_id', '=', $material_id)
            ->update(['cantidad_entrada' => $disponibleLote]);

        return $this->clases->auditoria("Salida - Material", "Devolver Mat.", '', $registro_viejo);
    }
    public function devolverMatSacadoEliminarOrdenDetalle($salida_orden_material_id, $lote, $cantidad, $material_id) {
        list($mat) = DB::table('material')->where('id', '=', $material_id)->get();

        $registro_viejo = 'material: ' . $mat->tx_descripcion . ', salida_orden_material_id: ' . $salida_orden_material_id . ', lote: ' . $lote . ', cantidad: ' . $cantidad . ', created_at: ' . date('Y-m-d H:i:s');

        DB::table('lotes_salida_material')
            ->where('salida_orden_material_id', '=', $salida_orden_material_id)
            ->where('lote', '=', $lote)
            ->delete();
        $cantMatDisponible = DB::table('material')->where('id', '=', $material_id)->first();
        $disponible        = $cantMatDisponible->nu_disponible + $cantidad;
        DB::table('material')
            ->where('id', '=', $material_id)
            ->update(['nu_disponible' => $disponible]);
        //Tambien debo devolverlo del lote de donde se sacó
        $cantMatLoteEntrada = DB::table('registro_detalle_entrada_mat')
            ->where('lote', '=', $lote)
            ->where('material_id', '=', $material_id)
            ->first();
        $disponibleLote = $cantMatLoteEntrada->cantidad_entrada + $cantidad;
        DB::table('registro_detalle_entrada_mat')
            ->where('lote', '=', $lote)
            ->where('material_id', '=', $material_id)
            ->update(['cantidad_entrada' => $disponibleLote]);

        //return $this->clases->auditoria("Salida - Material", "Devolver Mat.", '', $registro_viejo);
    }
    public function mostrarMaterialesSalidaTrazabilidad() {
        //Este es el mismo que mostrarMaterialesSalida, pero con el llamado a otra vista
        $orden_id                       = Request::get('orden_id');
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
        return view('trazabilidad.edit', $data);
    }
    public function darSalidaMaterial() {
        if (Session::get('admin_id') > 0) {
            $registro_nuevo                  = '';
            $salida_orden_material_id        = Request::get('salida_orden_material_id');
            $registro_detalle_entrada_mat_id = Request::get('registro_detalle_entrada_mat_id');
            $cantidad                        = Request::get('cantidad');
            // dd($salida_orden_material_id . " " . $registro_detalle_entrada_mat_id . " " . $cantidad);
            try {
                $detalleEntradaMaterial = DB::table('registro_detalle_entrada_mat')
                    ->where('id', '=', $registro_detalle_entrada_mat_id)->first();
                $lote        = $detalleEntradaMaterial->lote;
                $material_id = $detalleEntradaMaterial->material_id;
                $disponible  = $detalleEntradaMaterial->cantidad_entrada;
                // $inserts[]   = [];
                $inserts[] = [
                    'salida_orden_material_id' => $salida_orden_material_id,
                    'lote'                     => $lote,
                    'cantidad'                 => $cantidad,
                    'created_at'               => date('Y-m-d H:i:s'),
                ];

                DB::table('lotes_salida_material')->insert($inserts);

                //Acá debo descontar del Lote correspondiente
                $cantidadEnLote = $disponible - $cantidad;

                DB::table('registro_detalle_entrada_mat')
                    ->where('id', '=', $registro_detalle_entrada_mat_id)
                    ->update(['cantidad_entrada' => $cantidadEnLote]);

                //Acá debo descontarle al total del Material
                $materiales = DB::table('material')->where('id', '=', $material_id)->first();
                // dd($materiales);
                // foreach ($materiales as $material) {
                $disponibleMaterial = $materiales->nu_disponible;
                $mat                = $materiales->codigo;
                // }
                $disponibleMaterial = $disponibleMaterial - $cantidad;

                DB::table('material')
                    ->where('id', '=', $material_id)
                    ->update(['nu_disponible' => $disponibleMaterial]);

                $registro_nuevo = 'material: ' . $mat . ', salida_orden_material_id: ' . $salida_orden_material_id . ', lote: ' . $lote . ', cantidad: ' . $cantidad . ', created_at: ' . date('Y-m-d H:i:s');
                return $this->clases->auditoria("Salida - Material", "Sacar Mat.", $registro_nuevo, '');
            } catch (Exception $e) {
                return $this->clases->auditoria("Salida - Material", "ERROR Sacar Mat.", $e->getMessage(), '');
            }
        } else {
            return $this->clases->auditoria("Salida - Material", "ERROR", 'Se intentó sacar material sin estar logueado', '');
        }

    }
    public function traerDisponibleLoteEntrada() {
        $cantDisponibleEntradaLote = DB::table('registro_detalle_entrada_mat')
            ->select('cantidad_entrada')
            ->where('id', '=', Request::get('id'))
            ->get();
        $disponible = 0;
        foreach ($cantDisponibleEntradaLote as $value) {
            $disponible = $value->cantidad_entrada;
        }
        return $disponible;
    }
    public function sacarMaterial() {
        $data['material_id']              = Request::get('material_id'); //36
        $data['salida_orden_material_id'] = Request::get('salida_orden_material_id'); //11
        $faltaEntregar                    = DB::table('lotes_salida_material')
            ->join('salida_orden_material', 'lotes_salida_material.salida_orden_material_id', 'salida_orden_material.id')
            ->select(
                DB::raw('SUM(lotes_salida_material.cantidad) as entregado'),
                'salida_orden_material.material_id',
                'salida_orden_material.cant_requerida_material',
                'lotes_salida_material.lote',
                'lotes_salida_material.salida_orden_material_id'
            )
            ->where('lotes_salida_material.salida_orden_material_id', '=', $data['salida_orden_material_id'])
            ->groupBy('salida_orden_material_id')
            ->get();
        $i = 0;

        foreach ($faltaEntregar as $key) {
            $i++;
        }
        if ($i > 0) {
            foreach ($faltaEntregar as $fe) {
                $falta                 = $fe->cant_requerida_material - $fe->entregado;
                $data['faltaEntregar'] = $falta;
            }
        } else {
            $salida_orden_material = DB::table('salida_orden_material')->where('id', '=', $data['salida_orden_material_id'])->get();
            foreach ($salida_orden_material as $som) {
                $data['faltaEntregar'] = $som->cant_requerida_material;
            }
        }

        $materiales = DB::table('material')->where('id', '=', $data['material_id']);
        foreach ($materiales as $material) {
            $data['tx_descripcion_material'] = $material->tx_descripcion;
            $data['codigo_material']         = $material->codigo;
        }

        $data['nombreInput'] = Request::get('nombreInput');
        $data['lotes']       = DB::table('registro_detalle_entrada_mat')
            ->select('registro_detalle_entrada_mat.id', 'registro_detalle_entrada_mat.lote')
            ->where('material_id', '=', $data['material_id'])
            ->where('cantidad_entrada', '>', 0)
            ->get();
        // dd($material_id);
        $i = 0;
        foreach ($data['lotes'] as $lote) {
            $i++;
        }
        if ($i > 0) {
            return view('salidamaterial.sacarMaterial', $data);
        } else {
            return "No hay materiales Disponibles";
        }
    }
    public function mostrarMaterialesSalida() {
        $orden_id                  = Request::get('orden_id');
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
            ->where('orden_detalle.orden_id', '=', $orden_id)
            ->orderBy('producto_terminado.tx_producto_terminado', 'modelo.tx_modelo', 'desc')
            ->get();
        return view('salidamaterial.edit', $data);
    }
    public function modificarDetalleInpeccion() {
        $indicador_pasa_id = Request::get('indicador_pasa_id');
        $detalle           = Request::get('detalle');
        $id                = Request::get('id');
        DB::table('detalle_inspeccion')
            ->where('id', $id)
            ->update(['indicador_pasa_id' => $indicador_pasa_id, 'detalle' => $detalle]);
        $operacion = "Listo";
        return $operacion;
    }
    public function agregarLote() {
        $detalle_trazabilidad_id = Request::get('detalle_trazabilidad_id');
        $lote                    = Request::get('lote');

        $id = DB::table('lotes')->insertGetId(
            ['lote' => $lote, 'detalle_trazabilidad_id' => $detalle_trazabilidad_id]
        );
        $this->traerBotonesLote($detalle_trazabilidad_id);
    }
    public function eliminarLote() {
        $lote_id                 = Request::get('lote_id');
        $detalle_trazabilidad_id = Request::get('detalle_trazabilidad_id');
        DB::table('lotes')->where('id', '=', $lote_id)->delete();
        $this->traerBotonesLote($detalle_trazabilidad_id);
        // echo $detalle_trazabilidad_id;
    }
    public function traerBotonesLote($detalle_trazabilidad_id) {
        $lotes   = DB::table('lotes')->where('detalle_trazabilidad_id', '=', $detalle_trazabilidad_id)->get();
        $botones = '';
        if (@$lotes) {
            foreach ($lotes as $lote) {
                $lote_id  = $lote->id;
                $traza_id = $lote->detalle_trazabilidad_id;
                $lote     = $lote->lote;
                $botones .= '<button type="button" id="' . $id . '" onclick="eliminarLote(\'' . $lote_id . '\',\'' . $detalle_trazabilidad_id . '\',\'botones' . $detalle_trazabilidad_id . '\')" class = "label label-primary btn btn-md">' . $lote . ' &nbsp;<i class="fa fa-times" aria-hidden="true"></i></button>&nbsp;';
            }
        }
        echo $botones;
    }
    public function traerBotonesLote2() {
        $detalle_trazabilidad_id = Request::get('detalle_trazabilidad_id');
        $lotes                   = DB::table('lotes')->where('detalle_trazabilidad_id', '=', $detalle_trazabilidad_id)->get();
        $botones                 = '';
        if (@$lotes) {
            foreach ($lotes as $lote) {
                $lote_id  = $lote->id;
                $traza_id = $lote->detalle_trazabilidad_id;
                $lote     = $lote->lote;
                $botones .= '<button type="button" id="' . $id . '" onclick="eliminarLote(\'' . $lote_id . '\',\'' . $detalle_trazabilidad_id . '\',\'botones' . $detalle_trazabilidad_id . '\')" class = "label label-primary btn btn-md">' . $lote . ' &nbsp;<i class="fa fa-times" aria-hidden="true"></i></button>&nbsp;';
            }
        }
        echo $botones;
    }
    public function listado_materiales($id) {
        // $material_id = Request::get('material_id');
        $materiales = DB::table('historico_entrada_mat')
            ->join('detalle_entrada_mat', 'historico_entrada_mat.id', 'detalle_entrada_mat.historico_entrada_mat_id')
            ->where('codigo_material', '=', $id)->get();

        if (@$materiales) {
            foreach ($materiales as $material) {
                $label = $material->lote;
                $value = $material->id;
                $select .= '<option value="' . $value . '">' . $label . '</option>';

            }
        }
        echo $select;
    }
    public function descripcion($id) {
        // $material_id = Request::get('material_id');
        $material = DB::table('material')
            ->where('codigo', '=', $id)->get();

        if (@$material) {
            foreach ($material as $mat) {
                $value = $mat->tx_descripcion;

            }
        }
        echo $value;
    }
    public function listado_vin($id) {
        // $material_id = Request::get('material_id');
        $vin = DB::table('orden_detalle')
            ->join('numero_vin', 'orden_detalle.numero_vin_id', 'numero_vin.id')
            ->select('numero_vin.tx_numero_vin', 'orden_detalle.numero_vin_id')
            ->where('orden_detalle.orden_id', '=', $id)->get();

        if (@$vin) {
            foreach ($vin as $numeros) {
                $label = $numeros->tx_numero_vin;
                $value = $numeros->numero_vin_id;
                $select .= '<option value="' . $value . '">' . $label . '</option>';

            }
        }
        echo $select;
    }
    public function listado_modelo($id) {
        // $material_id = Request::get('material_id');
        $vin = DB::table('orden_detalle')
            ->join('modelo', 'orden_detalle.modelo_id', 'modelo.id')
            ->join('producto_terminado', 'orden_detalle.producto_terminado_id', 'producto_terminado.id')
            ->select('orden_detalle.modelo_id', 'modelo.tx_modelo', 'producto_terminado.tx_producto_terminado')
            ->where('orden_detalle.numero_vin_id', '=', $id)->get();

        if (@$vin) {
            foreach ($vin as $numeros) {
                $label = $numeros->tx_modelo . ' / ' . $numeros->tx_producto_terminado;
                $value = $numeros->modelo_id;
                $select .= '<option value="' . $value . '">' . $label . '</option>';

            }
        }
        echo $select;
    }
    public function talla($id) {
        // $material_id = Request::get('material_id');
        $tallas = DB::table('orden_detalle')
            ->select('tx_talla')
            ->where('numero_vin_id', '=', $id)->get();

        if (@$tallas) {
            foreach ($tallas as $talla) {
                $value = $talla->tx_talla;
            }
        }
        echo $value;
    }

    public function pdf($cuerpo, $data, $nombreArchivo) {
        $pdf = PDF::setOptions(['images' => true])->loadView($cuerpo, $data);
        return $pdf->download($nombreArchivo); //Este funciona
        // return $pdf->stream();
    }
}
