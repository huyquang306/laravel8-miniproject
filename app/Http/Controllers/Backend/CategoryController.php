<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function allCategory()
    {
        $categories = Category::latest()->get();
        return view('backend.category.category_view', [
            'categories' => $categories,
        ]);
    }

    public function storeCategory(Request $request)
    {
        $request->validate([
            'category_name_en' => 'required',
            'category_name_jp' => 'required',
            'category_icon' => 'required',
        ],[
            'category_name_en.required' => 'This field is required',
            'category_name_jp.required' => 'This field is required',
            'category_icon' => 'This field is required',
        ]);

        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_jp' => $request->category_name_jp,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_jp' => strtolower(str_replace(' ', '-', $request->category_name_jp)),
            'category_icon' => $request->category_icon,
        ]);

        return redirect()->back()->with([
            'message' => 'Category Inserted Successfully',
            'alert-type' => 'success',
        ]);
    }

    public function editCategory($id)
    {
        $category = Category::find($id);

        return view('backend.category.category_edit',[
            'category' => $category,
        ]);
    }

    public function updateCategory(Request $request, $id){
        $request->validate([
            'category_name_en' => 'required',
            'category_name_jp' => 'required',
            'category_icon' => 'required',
        ],[
            'category_name_en.required' => 'This field is required',
            'category_name_jp.required' => 'This field is required',
            'category_icon' => 'This field is required',
        ]);

        Category::find($id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_jp' => $request->category_name_jp,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_jp' => strtolower(str_replace(' ', '-', $request->category_name_jp)),
            'category_icon' => $request->category_icon,
        ]);

        return redirect()->route('all.category')->with([
            'message' => 'Category Updated Successfully',
            'alert-type' => 'success',
        ]);
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('all.category')->with([
            'message' => 'Category Deleted Successfully',
            'alert-type' => 'success',
        ]);
    }
}
