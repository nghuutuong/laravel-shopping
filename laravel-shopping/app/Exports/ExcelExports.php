<?php

namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExcelExports implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Category::all();
        return new Category([
            'category_id' => $row[0],
            'brand_id' => $row[1],
            'product_name' => $row[2],
            'product_desc' => $row[3],
            'product_content' => $row[4],
            'product_price' => $row[5],
            'product_image' => $row[6],
            'product_status' => $row[7],
            ]);
    }
}
