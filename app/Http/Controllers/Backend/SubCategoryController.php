<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function allSubCategory()
    {
        $categories = Category::orderBy('category_name_en', 'ASC')->get();
        $subcategories = SubCategory::latest()->get();
        return view('backend.subcategory.subcategory_view', [
            'subcategories' => $subcategories,
            'categories' => $categories,
        ]);
    }

    public function storeSubCategory(Request $request)
    {
        $request->validate([
    		'category_id' => 'required',
    		'subcategory_name_en' => 'required',
    		'subcategory_name_jp' => 'required',
    	],[
    		'category_id.required' => 'Please select Any option',
    		'subcategory_name_en.required' => 'Input SubCategory English Name',
            'subcategory_name_jp.required' => 'Input SubCategory Japanese Name',
    	]);



	   SubCategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_jp' => $request->subcategory_name_jp,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-',$request->subcategory_name_en)),
            'subcategory_slug_jp' => str_replace(' ', '-',$request->subcategory_name_jp),
    	]);

	    $notification = array(
			'message' => 'SubCategory Inserted Successfully',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }

    public function editSubCategory($id)
    {
        $categories = Category::orderBy('category_name_en','ASC')->get();
    	$subcategory = SubCategory::findOrFail($id);
    	return view('backend.subcategory.subcategory_edit',[
            'subcategory' => $subcategory,
            'categories' => $categories,
        ]);
    }

    public function updateSubCategory(Request $request, $id)
    {
        $request->validate([
    		'category_id' => 'required',
    		'subcategory_name_en' => 'required',
    		'subcategory_name_jp' => 'required',
    	],[
    		'category_id.required' => 'Please select Any option',
    		'subcategory_name_en.required' => 'Input SubCategory English Name',
            'subcategory_name_jp.required' => 'Input SubCategory Japanese Name',
    	]);

        SubCategory::findOrFail($id)->update([
            'category_id' => $request->category_id,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_jp' => $request->subcategory_name_jp,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-',$request->subcategory_name_en)),
            'subcategory_slug_jp' => str_replace(' ', '-',$request->subcategory_name_jp),
    	]);

        $notification = array(
			'message' => 'SubCategory Updated Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('all.subcategory')->with($notification);
    }

    public function deleteSubCategory($id)
    {
        SubCategory::findOrFail($id)->delete();

        $notification = array(
			'message' => 'SubCategory Updated Successfully',
			'alert-type' => 'success'
		);

		return redirect()->route('all.subcategory')->with($notification);
    }
}
