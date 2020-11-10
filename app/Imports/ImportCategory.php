<?php

namespace App\Imports;

use App\CategoryProductModel;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportCategory implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new CategoryProductModel([
            'category_name'=>$row[0],
            'category_desc'=>$row[1],
            'category_status'=>$row[2],
        ]);
    }
}
