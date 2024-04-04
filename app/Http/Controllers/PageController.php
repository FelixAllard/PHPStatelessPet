<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Models\Category;
use App\Models\Item;

class PageController extends Controller
{
    public function setCategory(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'age' => 'required|string'
        ]);

        $category = Category::create([
            'name' => $fields['name'],
            'age' => $fields['age']
        ]);

        return response($category, 201);
    }

    public function getCategory()
    {
        $arrayCategories = Category::all();
        return response($arrayCategories, 200);
    }

    public function setItem(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'age' => 'required|string'
        ]);

        $item = Item::create([
            'name' => $fields['name'],
            'age' => $fields['age']
        ]);

        return response($item, 201);
    }

    public function getItems()
    {
        $arrayItems = Item::all();
        return response($arrayItems, 200);
    }

    public function getItem($search)
    {
        $arrayItems = Item::where('name', 'LIKE', '%' . $search . '%')->get();
        return response($arrayItems, 200);
    }
    //Used to display the form
    public function showForm()
    {
        return view('form');
    }
    //
}
