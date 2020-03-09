<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Brand;

class BrandController extends Controller
{

    public function all()
    {
        return Brand::all();
    }

    public function get($id)
    {
        return Brand::find($id);
    }

}