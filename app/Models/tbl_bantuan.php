<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_bantuan extends Model
{
    //
    public $table = 'bantuan';
	public $primaryKey = 'bantuan_id';
    public $incrementing = true;
    
    protected $guarded = [
    	'created_at','updated_at'  
    ];

    public $fillable = [
        'bantuan_id',
        'bantuan_type',
        'bantuan_title',
        'bantuan_text',
        'created_at',
        'updated_at'
    ];
}
