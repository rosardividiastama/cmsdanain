<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_video extends Model
{
    //
    public $table = 'video';
	public $primaryKey = 'video_id';
    public $incrementing = true;
    
    protected $guarded = [
    	'created_at','updated_at'  
    ];

    public $fillable = [
        'video_id',
        'video_link',
        'video_text',
        'video_hashtag',
        'video_title',
        'created_at',
        'updated_at'
    ];
}
