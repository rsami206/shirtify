<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
  public function create()
  {
    return view('admin.category.create');
  }

  public function store(Request $request)
  {
    $request->validate([
      'name' => 'required | string',
      'slug' => 'required'
    ]);

    //   create category

    Category::create([
      'name' => $request->input('name'),
      'slug' => $request->input('slug')
    ]);
    return redirect()->route('admin.category')->with('success', 'category created successfully!');
  }


  // delete category

  public function destroy($id)
  {
    $user_id = Category::FindOrFail($id);

    if ($user_id != null) {
      $user_id->delete();
      return redirect()->route("admin.category")->with("success", "successfully deleted");;
    }
  }


  // edit category

  public function edit($id)
  {
    $category = Category::findOrFail($id);
    return view('admin.category.edit_category', ['category' => $category]);
  }

  // update category

  public  function update(Request $request, $id)
  {
    $request->validate([
      'name' => 'required | string',
      'slug' => 'required'
    ]);
    $category = Category::findOrFail($id);
    $category->name = $request->input('name');
    $category->slug = $request->input('slug');
    $category->save();
    return redirect()->route('admin.category')->with('success', 'category edit successfully!');
  }
}
