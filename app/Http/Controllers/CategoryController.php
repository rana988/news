<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->q??"";
        $items = Category::where('title','like',"%$q%")
            ->paginate(1)
            ->appends(['q'=>$q]);

        return view("category.index")->withItems($items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("category.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        if (!$request->show) {
        $request['show'] = 0;
    }

        Category::create($request->all());
        \Session::flash('msg', 'added succefully');

        return redirect(asset("/category"));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {

        $category = Category::find( $id);
        if (!$category->show) {
            $category['show'] = 0;
        }

        return view('/category.show')->with(["category"=>$category]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {

        $category = Category::find( $id);

        if($category==null){
            session()->flash("msg", "e: The category was not found");
        }
        //return view('/category.edit')->with(["category"=>$category]);
        return view('/category.edit')->with(["category"=>$category]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(CategoryRequest $request, $id)
    {

        $category = Category::find($id);
        if (!$category->show) {
            $category['show'] = 0;
        }

        Category::find($id)->update($request->all());

        \Session::flash('msg', "i: Category Updated Successfully");

        return redirect(asset("/category"));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        if(!$category){
            session()->flash("msg", "e: The product was not found");
            return redirect(route("category.index"));
        }
        $category->delete();
        session()->flash("msg", "w: Product Deleted Successfully");
        return redirect(route("category.index"));
    }
}
