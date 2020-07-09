<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_keterangan extends Model
{
    //
    public $table = 'keterangan';
	public $primaryKey = 'keterangan_id';
    public $incrementing = true;
    
    protected $guarded = [
    	'created_at','updated_at'  
    ];

    public $fillable = [
        'keterangan_id',
        'keterangan_type',
        'keterangan_text',
        'created_at',
        'updated_at'
    ];
}