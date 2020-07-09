<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\tbl_keterangan;

/**
 * Class ContohRepo
 * @package App\Repositories
 * @version December 10, 2019, 1:09 pm UTC
*/

class KeteranganRepo extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return tbl_keterangan::class;
    }

    //get keterangan flow page cara kerja
    function get_keterangan_by_flow(){
        $data = tbl_keterangan::where('keterangan_type',1)
        ->select('keterangan.*')
        ->get();
        return $data;
    }

    //get keterangan deskripsi page tentang kami
    function get_keterangan_by_deskripsi(){
        $data = tbl_keterangan::where('keterangan_type',2)
        ->select('keterangan.*')
        ->get();
        return $data;
    }
}
