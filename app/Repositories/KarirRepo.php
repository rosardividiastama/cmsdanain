<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\tbl_karir;

/**
 * Class ContohRepo
 * @package App\Repositories
 * @version December 10, 2019, 1:09 pm UTC
*/

class KarirRepo extends BaseRepository
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
        return tbl_karir::class;
    }

    // get karir by id
    function get_by_id($id){
        $data = tbl_karir::where('karir_id',$id)
        ->select('karir.*')
        ->get();
        return $data;
    }
}

