<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_background extends Model
{
    //
    public $table = 'background';
	public $primaryKey = 'background_id';
    public $incrementing = true;
    
    protected $guarded = [
    	'created_at','updated_at'  
    ];

    public $fillable = [
        'background_id',
        'background_title',
        'background_status',
        'background_file',
        'background_type',
        'created_at',
        'updated_at'
    ];
}
