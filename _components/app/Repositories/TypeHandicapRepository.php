<?php

namespace App\Repositories;

use App\Models\TypeHandicap;
use App\Repositories\BaseRepository;

class TypeHandicapRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'nom',
        'description'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return TypeHandicap::class;
    }
}
