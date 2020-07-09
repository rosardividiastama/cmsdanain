<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tbl_statistik extends Model
{
    //
    public $table = 'statistik';
	public $primaryKey = 'statistik_id';
    public $incrementing = true;
    
    protected $guarded = [
    	'created_at','updated_at'  
    ];

    public $fillable = [
        'statistik_id',
        'statistik_pendanaan',
        'statistik_pinjaman',
        'statistik_tkb',
        'statistik_npl',
        'stat_tot_pinjaman',
        'stat_tot_outstanding',
        'stat_jml_borrower',
        'stat_jml_borrower_aktif',
        'stat_nilai_pinj_terendah',
        'stat_nilai_pinj_tertinggi',
        'created_at',
        'updated_at'
    ];
}
