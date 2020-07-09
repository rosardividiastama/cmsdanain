<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\tbl_statistik;

/**
 * Class ContohRepo
 * @package App\Repositories
 * @version December 10, 2019, 1:09 pm UTC
*/

class StatRepo extends BaseRepository
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
        return tbl_statistik::class;
    }
}
