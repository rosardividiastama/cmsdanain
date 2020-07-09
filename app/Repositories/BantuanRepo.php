<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\tbl_bantuan;
use App\Constant\typeBantuan;

/**
 * Class ContohRepo
 * @package App\Repositories
 * @version December 10, 2019, 1:09 pm UTC
*/

class BantuanRepo extends BaseRepository
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
        return tbl_bantuan::class;
    }

    // get bantaun by umum
    function get_by_type_umum(){
        $data = tbl_bantuan::where('bantuan_type',typeBantuan::UMUM)
        ->select('bantuan.*')
        ->get();
        return $data;
    }

    // get bantaun by pengaduan
    function get_by_type_pengaduan(){
        $data = tbl_bantuan::where('bantuan_type',typeBantuan::PENGADUAN)
        ->select('bantuan.*')
        ->get();
        return $data;
    }

    // get bantaun by lender
    function get_by_type_lender(){
        $data = tbl_bantuan::where('bantuan_type',typeBantuan::LENDER)
        ->select('bantuan.*')
        ->get();
        return $data;
    }

    // get bantaun by biaya
    function get_by_type_biaya(){
        $data = tbl_bantuan::where('bantuan_type',typeBantuan::BIAYA)
        ->select('bantuan.*')
        ->get();
        return $data;
    }
}
