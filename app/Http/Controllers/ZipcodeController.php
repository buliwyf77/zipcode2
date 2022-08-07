<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Zipcode;


class ZipcodeController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $newid = intval($id);

        $zipcode = Zipcode::where('d_codigo',$newid)->first();
        $newdata = [];

        if(isset($zipcode)){

        $newdata = array('zip_code' => $id, 'locality' => strtoupper($zipcode->d_ciudad), 
            'federal_entity' => array('key' => $zipcode->c_estado, 'name' =>  strtoupper($zipcode->d_estado), 'code' => "null"),
            'settlements' => array(),
            'municipality' => array()
        );


        $zip = Zipcode::where('d_codigo',$newid)->get();


        foreach($zip as $settle) {
            array_push($newdata['settlements'], array('key' => $settle->id_asenta_cpcons, 'name' =>  strtoupper($settle->d_asenta), 'zone_type' =>  strtoupper($settle->d_zona), 'settlement_type' => array('name' => $settle->d_tipo_asenta) ));
        }

        $newdata['municipality']['key'] = $settle->c_mnpio;
        $newdata['municipality']['name'] =  strtoupper($settle->D_mnpio) ;
        

        return response()->json($newdata, 200);

    }else {
        return response()->json(['message' => 'No se ha encontrado ningun registro con ese codigo'], 404);
    }
        
    }
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
