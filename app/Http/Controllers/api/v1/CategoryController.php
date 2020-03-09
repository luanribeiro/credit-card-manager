<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{

    public function all()
    {
        return Category::all();
    }

    public function get($id)
    {
        return Category::find($id);
    }

}