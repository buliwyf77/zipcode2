<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Zipcode;
use Illuminate\Support\Facades\DB;


class ZipcodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $newid = intval($id);

        $zipcode = Zipcode::where('d_codigo',$newid)->first();
        $newdata = [];

        if($zipcode){

        $newdata = array('zip-code' => $id, 'locality' => strtoupper($zipcode->d_ciudad), 
            'federal_entity' => array('key' => $zipcode->c_estado, 'name' =>  strtoupper($zipcode->d_estado), 'code' => null),
            'settlements' => array(),
            'municipality' => array()
        );


        $zip = Zipcode::where('d_codigo',$newid)->get();


        foreach($zip as $settle) {
            array_push($newdata['settlements'], array('key' => $settle->id_asenta_cpcons, 'name' =>  strtoupper($settle->d_asenta), 'zone_type' =>  strtoupper($settle->d_zona), 'settlement_type' => array('name' => $settle->d_tipo_asenta) ));
        }

        $newdata['municipality']['key'] = $settle->c_mnpio;
        $newdata['municipality']['name'] =  strtoupper($settle->D_mnpio) ;
        

        return response()->json($newdata);

    }else {
        return response()->json(['message' => 'No se ha encontrado ningun registro con ese codigo']);

    }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
