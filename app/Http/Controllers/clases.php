<?php

namespace App\Http\Controllers;
use DB;
use Response;
use Session;

class clases extends Controller {

    public function traerVinOrdenDetalle($orden_detalle_id) {
        $info = DB::table('traerVinOrdenDetalle')->where('orden_detalle', '=', $orden_detalle_id)->first();
        // dd($info);
        // $data["modelo"]   = $info->modelo;
        // $data["producto"] = $info->producto;
        // $data["talla"]    = $info->talla;
        // $data["color"]    = $info->color;
        // $data["vin"]      = $info->vin;
        $data["modelo"]   = "modelo";
        $data["producto"] = "producto";
        $data["talla"]    = "talla";
        $data["color"]    = "color";
        $data["vin"]      = "vin";
        return response()->json($info);
    }
    public function auditoria($modulo, $accion, $registro_nuevo = '', $registro_viejo = '') {
        $cms_users_id = Session::get('admin_id');
        $usuario      = Session::get('admin_name');
        $created_at   = date('Y-m-d H:i:s');
        $inserts[]    = [
            'modulo'         => $modulo,
            'accion'         => $accion,
            'registro_nuevo' => $registro_nuevo,
            'registro_viejo' => $registro_viejo,
            'cms_users_id'   => $cms_users_id,
            'usuario'        => $usuario,
            'created_at'     => date('Y-m-d H:i:s'),
        ];
        DB::table('auditoria')->insert($inserts);
    }

    public function upload() {
        $path = $request->photo->storeAs('uploads', 'LuisCarneiro.jpg');
    }
}
