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

        $zipcode = Zipcode::where('d_codigo',$newid)->get();
        $newdata = [];

        if(isset($zipcode)){
            $firstItem = $zipcode->first();

        $newdata = array('zip_code' => $id, 'locality' => strtoupper($firstItem->d_ciudad), 
            'federal_entity' => array('key' => intval($firstItem->c_estado), 'name' =>  strtoupper($firstItem->d_estado), 'code' => null),
            'settlements' => array(),
            //'municipality' => array()
        );
        $newdata['municipality']['key'] = intval($firstItem->c_mnpio);
        $newdata['municipality']['name'] =  strtoupper($firstItem->D_mnpio) ;


        //$zip = Zipcode::where('d_codigo',$newid)->get();


        foreach($zipcode as $settle) {
            array_push($newdata['settlements'], array('key' => intval($settle->id_asenta_cpcons), 'name' =>  strtoupper($settle->d_asenta), 'zone_type' =>  strtoupper($settle->d_zona), 'settlement_type' => array('name' => $settle->d_tipo_asenta) ));
        }

        

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
