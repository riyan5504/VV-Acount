<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function adminSettings()
    {
        return view('backend.settings');
    }
    public function settingsItemEntry()
    {
        $categories = Category::all();
        $items = Item::with('category')->get();
        return view('backend.items.create', compact('categories', 'items'));
    }

    public function saveItemEntry(Request $request)
    {
        $exists = Item::where('code', $request->code)
            ->orWhere('name', $request->name)
            ->exists();

        if ($exists) {
            return back()->with('error', 'This item already exists!');
        }
        $items = new Item();

        $items->code = $request->code;
        $items->name = $request->name;
        $items->cat_id = $request->cat_id;
        $items->pack_size = $request->pack_size;
        $items->unit = $request->unit;
        $items->price = $request->price;

        $items->save();

        $categories = Category::all();
        $items = Item::with('category')->get();

        return view('backend.items.create', compact('categories', 'items'))
        ->with('success', 'Item saved successfully.');
    }

    public function editItemEntry($id)
    {
        $categories = Category::all();
        $item = Item::where('id', $id)->with('category')->first();
        $items = Item::with('category')->get();

        return view('backend.items.edit', compact('categories', 'items', 'item'));
    }

    public function updateItemEntry(Request $request, $id)
    {
        $item = Item::where('id', $id)->with('category')->first();

        $item->code = $request->code;
        $item->name = $request->name;
        $item->cat_id = $request->cat_id;
        $item->pack_size = $request->pack_size;
        $item->unit = $request->unit;
        $item->price = $request->price;

        $item->save();
        return redirect('/settings/items-entry')->with('success', 'Item update successfully.');
    }

    public function deleteItemEntry($id)
    {
        $item = Item::find($id);

        $item->delete();

        return redirect()->back()->with('success', 'Item delete successfully.');
    }



    public function settingsCategoryEntry()
    {
        $categories = Category::all();
        return view('backend.category.create', compact('categories'));
    }
    public function settingsCategorySave(Request $request)
    {
        $exists = Category::Where('name', $request->cat_name)->exists();

        if ($exists) {
            return back()->with('error', 'This category already exists!');
        }
        $category = new Category();
        $category->name = $request->cat_name;
        $category->save();

        $categories = Category::all();
        return view('backend.category.create', compact('categories'))
        ->with('success', 'Category saved successfully.');
    }
    public function settingsCategoryEdit($id)
    {
        $category = Category::find($id);
        $categories = Category::all();
        return view('backend.category.edit', compact('categories', 'category'));
    }
    public function settingsCategoryUpdate(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->cat_name;
        $category->save();
        return redirect('/settings/category-entry')
        ->with('success', 'Category update successfully.');
    }
    public function settingsCategoryDelete($id)
    {
        $categories = Category::find($id);
        $categories->delete();
        return redirect()->back()->with('success', 'Category delete successfully.');
    }
}
