<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use App\News;
use App\User;
use App\Category;
use Illuminate\Support\Facades\Auth;
use View;
use Redirect;
use URL;

class PagesController extends Controller
{

    public function __construct()
    {
        $categories = Category::all();
        View::share('categories', $categories);
    }

    public function home()
    {
        $home_categories = array();
        $categories = Category::all();

        foreach($categories as $category){
            $home_category['title'] = $category->title;
            $home_category['news'] = News::where('idCategory',$category->id)->orderBy('created_at','desc')->take(3)->get();
            $home_categories[] = $home_category;
        }

        $carousel_news = array();
        $news = News::where('isHighlighted',true)->orderBy('created_at','desc')->take(5)->get();

        foreach($news as $single_news){
            $carousel_single_news['category'] = Category::where('id',$single_news->idCategory)->first()->title;
            $carousel_single_news['news'] = $single_news;
            $carousel_news[] = $carousel_single_news;

        }

        return view('home')->with('home_categories',$home_categories)->with('carousel_news',$carousel_news);
    }

    public function addNews(){
        if(Auth::check())
            return view('addNews');
        else
            return Redirect::to(URL::to('login'));
    }

    public function addCategory(){
        if(Auth::check())
            return view('addCategory');
        else
            return Redirect::to(URL::to('login'));
    }

}
