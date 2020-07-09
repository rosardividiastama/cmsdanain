<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\tbl_syarat;

/**
 * Class ContohRepo
 * @package App\Repositories
 * @version December 10, 2019, 1:09 pm UTC
*/

class SyaratRepo extends BaseRepository
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
        return tbl_syarat::class;
    }

    // get syarat text by perusahaan
    function get_syarat_by_type_pt(){
        $data = tbl_syarat::where('syarat_type',1)
        ->select('syarat.*')
        ->get();
        return $data;
    }
    
    // get syarat text by perorangan
    function get_syarat_by_type_org(){
        $data = tbl_syarat::where('syarat_type',2)
        ->select('syarat.*')
        ->get();
        return $data;
    }
}
