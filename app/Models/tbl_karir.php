<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_karir extends Model
{
    //
    public $table = 'karir';
	public $primaryKey = 'karir_id';
    public $incrementing = true;
    
    protected $guarded = [
    	'created_at','updated_at'  
    ];

    public $fillable = [
        'karir_id',
        'karir_job',
        'karir_divisi',
        'karir_text',
        'created_at',
        'updated_at'
    ];
}
