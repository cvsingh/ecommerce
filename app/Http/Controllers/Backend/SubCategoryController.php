<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\SubCategory;


class SubCategoryController extends Controller
{
  public function SubCategoryView()
  {
    $categories = Category::orderBy('category_name_en', 'ASC')->get();
    $subcategories = SubCategory::latest()->get();

    return view('backend.category.subcategory_view', compact('subcategories', 'categories'));
  }
  public function SubCategoryStore(Request $request)
  {
    $request->validate(
      [
        'category_id'          => 'required',
        'subcategory_name_en'  => 'required',
        'subcategory_name_hin' => 'required',

      ],
      [
        'category_id.required'          => 'Please Select Category',
        'subcategory_name_en.required'  => 'Input SubCategory English Name',
        'subcategory_name_hin.required' => 'Input SubCategory Hindi Name',

      ]
    );
    SubCategory::insert([
      'category_id'          => $request->category_id,
      'subcategory_name_en'  => $request->subcategory_name_en,
      'subcategory_name_hin' => $request->subcategory_name_hin,
      'subcategory_slug_en'  => strtolower(str_replace(' ', '_', $request->subcategory_name_en)),
      'subcategory_slug_hin'  => strtolower(str_replace(' ', '_', $request->subcategory_name_hin)),

    ]);
    $notification = array(
      'message'    => 'SubCategory Inserted Successfully',
      'alert-type' => 'success'
    );
    return redirect()->back()->with($notification);
  } //end of method
  public function SubCategoryEdit($id)
  {
    $categories = Category::orderBy('category_name_en', 'ASC')->get();
    $subcategory = SubCategory::findOrFail($id);
    $sub =  Category::findOrFail($subcategory->category_id);
    return view('backend.category.subcategory_edit', compact('subcategory', 'categories', 'sub'));
  }
  public function SubCategoryUpdate(Request $request)
  {
    $subcategory_id = $request->id;

    SubCategory::findOrFail($subcategory_id)->update([
      'category_id'          => $request->category_id,
      'subcategory_name_en'  => $request->subcategory_name_en,
      'subcategory_name_hin' => $request->subcategory_name_hin,
      'subcategory_slug_en'  => strtolower(str_replace(' ', '_', $request->subcategory_name_en)),
      'subcategory_slug_hin'  => strtolower(str_replace(' ', '_', $request->subcategory_name_hin)),
    ]);
    $notification = array(
      'message'    => 'SubCategory Updated Successfully',
      'alert-type' => 'info'
    );
    return redirect()->route('all.subcategory')->with($notification);
  }
  public function SubCategoryDelete($id)
  {
    SubCategory::findOrFail($id)->delete();

    $notification = array(
      'message'    => 'SubCategory Deleted Successfully',
      'alert-type' => 'info'
    );
    return redirect()->back()->with($notification);
  } // end method
}
