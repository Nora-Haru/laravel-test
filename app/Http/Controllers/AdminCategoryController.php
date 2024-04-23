<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $this->authorize('admin');

        return view('dashboard.categories.index', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.categories.create', [
            'categories'    => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:50',
            'slug' => 'required|unique:categories'
        ]);
    
        Category::create($validateData);
    
        return redirect('/dashboard/categories')->with('success', 'New Category has been added!');
    }

    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', [
            'category'      => $category,
            'categories'    => Category::all()
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $rules = [
            'name' => 'required|unique:categories|max:50'
        ];
    
        if ($request->slug != $category->slug) {
            $rules['slug'] = 'required|unique:categories';
        }
    
        $validateData = $request->validate($rules);
    
        Category::where('id', $category->id)->update($validateData);
    
        return redirect('/dashboard/categories')->with('success', 'Category has been updated!');
    }

    public function destroy(Category $category)
    {
        Category::destroy($category->id);

        return redirect('/dashboard/categories')->with('success', 'Category has been deleted!');
    }

    public function checkSlug(Request $request) {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' =>$slug]);
    }
}
