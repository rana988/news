<?php

namespace App\Http\Controllers;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use Illuminate\Http\Request;
use App\Models\Category;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->q ?? "";
        $items = News::where('title', 'like', "%$q%")
            ->paginate(10)
            ->appends(['q' => $q]);

        return view("news.index")->withItems($items);
    }


    public function search(Request $request)
    {
        $categories = Category::all();
        $q = $request->get('q');
        $bublish = $request->get('bublish');
        $cat_id = $request->get('cat_id');

        $items = News::whereRaw('true');
        if ($q) {
            $items->where('title', 'like', "%$q%");
        }

        if ('bublish' != null) {
            $items->where('bublish', $bublish);

        }

        if ('cat_id' != null) {
            $items->where('cat_id', $cat_id);

        }
        $items = $items->paginate(10)->appends(['q' => $q, 'bublish' => $bublish, 'cat_id' => $cat_id]);

        return view("news.search")->with('items', $items)->with("categories", $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $categories = Category::all();
        return view("news.create")->with("categories", $categories);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsRequest $request)
    {
        if (!$request->bublish) {
            $request['bublish'] = 0;
        }
        $imageName = basename($request->imageUp->store("public"));
        $request['image'] = $imageName;
        News::create($request->all());

        session()->flash("msg", "s: Created Successfully");
        return redirect(route("news.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\News $news
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $news = News::find($id);
        if (!$news) {
            session()->flash("msg", "e: The News was not found");
            return redirect(route("news.index"));
        }
        $categories = Category::all();
        return view("news.show")->withNews($news)->withCategories($categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\News $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        if (!$news) {
            session()->flash("msg", "e: The News was not found");
            return redirect(route("news.index"));
        }
        $categories = Category::all();
        return view("news.edit")->withNews($news)->withCategories($categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\News $news
     * @return \Illuminate\Http\Response
     */
    public function update(NewsRequest $request, $id)
    {
        if (!$request->bublish) {
            $request['bublish'] = 0;
        }
        if($request->imageUp) {
            $imageName = basename($request->imageUp->store("public"));
            $request['image'] = $imageName;
        }
        News::find($id)->update($request->all());

        session()->flash("msg", "i: Product Updated Successfully");
        return redirect(route("news.index"));

    }      /**
         * Remove the specified resource from storage.
         *
         * @param \App\News $news
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            $news = News::find($id);
            if(!$news){
                session()->flash("msg", "e: The news was not found");
                return redirect(route("news.index"));
            }
            $news->delete();
            session()->flash("msg", "w: Product Deleted Successfully");
            return redirect(route("news.index"));
        }



}

