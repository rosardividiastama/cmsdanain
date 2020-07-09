<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_syarat extends Model
{
    //
    public $table = 'syarat';
	public $primaryKey = 'syarat_id';
    public $incrementing = true;
    
    protected $guarded = [
    	'created_at','updated_at'  
    ];

    public $fillable = [
        'syarat_id',
        'syarat_type',
        'syarat_text',
        'created_at',
        'updated_at'
    ];
}
