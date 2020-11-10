<?php

namespace App\Exports;

use App\CategoryProductModel;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportCategory implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CategoryProductModel::all();
    }
}
