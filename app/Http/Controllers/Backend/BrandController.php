<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;

class BrandController extends Controller
{
    public function allBrand()
    {
        $brands = Brand::latest()->get();
        return view('backend.brand.brand_view', [
            'brands' => $brands,
        ]);
    }

    public function storeBrand(Request $request)
    {
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_jp' => 'required',
            'brand_image' => 'required',
        ],[
            'brand_name_en.required' => 'This field is required',
            'brand_name_jp.required' => 'This field is required',
            'brand_image' => 'This field is required',
        ]);

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,200)->save('upload/brands/'.$name_gen);
        $image_url = 'upload/brands/'.$name_gen;

        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_jp' => $request->brand_name_jp,
            'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
            'brand_slug_jp' => strtolower(str_replace(' ', '-', $request->brand_name_jp)),
            'brand_image' => $image_url,
        ]);

        return redirect()->back()->with([
            'message' => 'Brand Inserted Successfully',
            'alert-type' => 'success',
        ]);
    }

    public function editBrand($id)
    {   
        $brand = Brand::find($id);

        return view('backend.brand.brand_edit',[
            'brand' => $brand,
        ]);
    }

    public function updateBrand(Request $request, $id)
    {
        $request->validate([
            'brand_name_en' => 'required',
            'brand_name_jp' => 'required',
        ],[
            'brand_name_en.required' => 'This field is required',
            'brand_name_jp.required' => 'This field is required',
        ]);

        $old_image = $request->old_image;
        if($request->file('brand_image')){
            unlink($old_image);
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,200)->save('upload/brands/'.$name_gen);
            $image_url = 'upload/brands/'.$name_gen;

            Brand::find($id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_jp' => $request->brand_name_jp,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_jp' => strtolower(str_replace(' ', '-', $request->brand_name_jp)),
                'brand_image' => $image_url,
            ]);

            return redirect()->route('all.brand')->with([
                'message' => 'Brand Updated Successfully',
                'alert-type' => 'success',
            ]);
        } else {
            Brand::find($id)->update([
                'brand_name_en' => $request->brand_name_en,
                'brand_name_jp' => $request->brand_name_jp,
                'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
                'brand_slug_jp' => strtolower(str_replace(' ', '-', $request->brand_name_jp)),
            ]);

            return redirect()->route('all.brand')->with([
                'message' => 'Brand Updated Successfully',
                'alert-type' => 'success',
            ]);
        }
    }

    public function deleteBrand($id)
    {
        $brand = Brand::findOrFail($id);
        $img_url = $brand->brand_image;
        unlink($img_url);
        $brand->delete();
        return redirect()->back()->with([
            'message' => 'Brand Deleted Successfully',
            'alert-type' => 'success',
        ]);
    }
}
