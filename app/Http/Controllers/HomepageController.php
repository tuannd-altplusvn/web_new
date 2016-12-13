<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomepageController extends Controller
{
    private $limit = 8;
    private $offset = 0;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::getCategories();
        $arrivalProduct = Product::getArrivalProducts();
        $popularProducts = Product::getPopularProducts($this->limit, $this->offset);
        // dd($popularProducts);
        return view('homepage.index', [
            'categories' => $categories,
            'arrivalProduct' => $arrivalProduct,
            'popularProducts' => $popularProducts
        ]);
    }

    public function getContact()
    {
        $categories = Category::getCategories();
        return view('contact.index', [
            'categories' => $categories,
        ]);
    }

    public function getAbout()
    {
        $categories = Category::getCategories();
        return view('about.index', [
            'categories' => $categories,
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
