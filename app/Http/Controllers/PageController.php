<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Models\Category;
use App\Models\Items;

class PageController extends Controller
{
    public function setCategory(Request $request){
        $fields = $request->validate([
            'name' => 'required|string',
            'age' => 'required|string'
        ]);
        $category = Category::create([
            'name' => $fields['name'],
            'age' => $fields['age']
        ]);
        return response($category,201);
    }
    public function getCategory(){
        $arryCategories = Category::all();
        return response($arryCategories,201);
    }
    public fuction setItem(Request $request){
        $fields = $request->validate([
            'name' => 'required|string',
            'age' => 'required|integer'
        ]);
        $item = Item::create([
            'name' => $fields['name'],
            'age' => $fiels['age']
        ]);
        return res[pmse($item,201)]

    }
    public function getItems(){
        $arryItems = Item::all();
        return reponse($arryItems,201);
    }
    //
}
