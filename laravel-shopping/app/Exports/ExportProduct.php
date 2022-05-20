<?php

namespace App\Imports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;

class ExportProduct implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
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
