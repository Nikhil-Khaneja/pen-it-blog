<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Requests\Categories\CreateCategoryRequest;
use App\Http\Requests\Categories\UpdateCategoryRequest;

class CategoriesController extends Controller
{
   
    public function index()
    {
        $categories = Category::all();
        return view('categories.index',compact([
            'categories'
        ]));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CreateCategoryRequest $request)
    {
        //1.validate the data -done in ccrequest file
        //2.store in db
        Category::create([
            'name'=>$request->name
        ]);

        //3. Session set something and return a view
        session()->flash('success','category added successfully');
        return redirect(route('categories.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('categories.edit',compact([
            'category'
        ]));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $category->name = $request->name;
        $category->save();
        session()->flash('success',"category edited successfully");
        return redirect(route("categories.index"));
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
       session()->flash('success',"category deleted successfully");
       return redirect(route("categories.index"));
    }
}
