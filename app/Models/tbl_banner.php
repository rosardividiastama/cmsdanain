<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_banner extends Model
{
    //
    public $table = 'banner';
	public $primaryKey = 'banner_id';
    public $incrementing = true;
    
    protected $guarded = [
    	'created_at','updated_at'  
    ];

    public $fillable = [
        'banner_id',
        'banner_title',
        'banner_status',
        'banner_file',
        'banner_type',
        'created_at',
        'updated_at'
    ];
}
