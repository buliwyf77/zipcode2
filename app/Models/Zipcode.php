<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;





class Zipcode extends Model
{

    protected $table = 'zipcodes';

    protected $hidden = [
        'id',
    ];

    /**
     * @var array
     */
    protected $fillable = ['d_codigo', 'd_asenta', 'd_tipo_asenta', 'D_mnpio', 'd_estado', 'd_ciudad', 'd_CP', 'c_estado', 'c_oficina', 'c_CP', 'c_tipo_asenta', 'c_mnpio', 'id_asenta_cpcons', 'd_zona', 'c_cve_ciudad'];

    protected $visible = ['d_codigo', 'd_asenta', 'd_tipo_asenta', 'D_mnpio', 'd_estado', 'd_ciudad', 'd_CP', 'c_estado', 'c_oficina', 'c_CP', 'c_tipo_asenta', 'c_mnpio', 'id_asenta_cpcons', 'd_zona', 'c_cve_ciudad'];
}
