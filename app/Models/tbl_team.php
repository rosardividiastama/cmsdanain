<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_team extends Model
{
    //
    public $table = 'team';
	public $primaryKey = 'team_id';
    public $incrementing = true;
    
    protected $guarded = [
    	'created_at','updated_at'  
    ];

    public $fillable = [
        'team_id',
        'team_nama',
        'team_file',
        'team_jabatan',
        'created_at',
        'updated_at'
    ];
}
