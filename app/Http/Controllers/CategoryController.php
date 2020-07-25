<?php

namespace App\Http\Controllers;

use App\Vacant;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $vacants = Vacant::where('category_id', $category->id)->where('active',true)->paginate(10);
        return view('categories.show')
                    ->with('vacants', $vacants)
                    ->with('category', $category);
    }
}
