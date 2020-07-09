<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_testimoni extends Model
{
    //
    public $table = 'testimoni';
	public $primaryKey = 'testimoni_id';
    public $incrementing = true;
    
    protected $guarded = [
    	'created_at','updated_at'  
    ];

    public $fillable = [
        'testimoni_id',
        'testimoni_nama',
        'testimoni_pekerjaan',
        'testimoni_testi',
        'testimoni_status',
        'testimoni_foto',
        'created_at',
        'updated_at'
    ];
}
