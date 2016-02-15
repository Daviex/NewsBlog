<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\News;
use App\User;
use App\Category;
use App\Comment;
use App\Photo;
use Redirect;
use URL;
use View;

class NewsController extends Controller
{
    public function __construct()
    {
        $categories = Category::all();
        View::share('categories', $categories);
    }

    public function loadCategoryOrNews($category, $idNews = null)
    {
        if ($idNews == null) {

            $news = Category::where('title', $category)->first()->news()->orderBy('created_at', 'desc')->get();
            return view('category')->with('category', $category)->with('news', $news);

        } else {

            $news = News::find($idNews);
            if($news){
                $user = User::find($news->idUser);
                $photos = Photo::where('idNews', $news->id)->get();
                $comments = Comment::where('idNews', $news->id)->orderBy('created_at', 'DESC')->get();
                return view('news')->with('news', $news)->with('user', $user)->with('photos', $photos)->with('comments', $comments);
            }else{
                abort(404);
            }

        }
    }

    public function addVote(Request $request)
    {
        $vote = $request->input('vote');
        $idNews = $request->input('idNews');

        $news = News::find($idNews);
        $votes_sum = $news->votes_sum;
        $votes_count = $news->votes_count;

        $news->votes_sum = $votes_sum + $vote;
        $news->votes_count = $votes_count + 1;
        $news->save();

        return Redirect::to(URL::previous());
    }

    public function addCategory(Request $request)
    {
        $title = $request->input('title');
        $category = new Category;
        $category->title = $title;
        $category->save();
        return Redirect::to('home');
    }

    public function search(Request $request)
    {
        $results = array();
        $keyword = $request->input('keyword');
        $news = News::where('title', 'LIKE', '%' . $keyword . '%')->orWhere('subtitle', 'LIKE', '%' . $keyword . '%')->orderBy('created_at', 'desc')->get();

        foreach ($news as $single_news) {
            $result['category'] = Category::where('id', $single_news->idCategory)->first()->title;
            $result['news'] = $single_news;
            $results[] = $result;
        }

        return view('search')->with('results', $results);
    }

    public function addNews(Request $request)
    {
        $title = $request->input('title');
        $subtitle = $request->input('subtitle');
        $idCategory = $request->input('category');

        $previewImage = file_get_contents($_FILES['preview']['tmp_name']);
        $previewType = $_FILES['preview']['type'];
        $previewSize = $_FILES['preview']['size'];

        $isHighlighted = $request->input('highlighted');

        if($isHighlighted == "true")
            $isHighlighted = 1;
        else
            $isHighlighted = 0;

        $content = $request->input('content');

        $news = new News;
        $news->title = $title;
        $news->subtitle = $subtitle;
        $news->preview = $previewImage;
        $news->previewtype = $previewType;
        $news->previewsize = $previewSize;

        $news->isHighlighted = $isHighlighted;
        $news->content = $content;

        $news->idCategory = $idCategory;
        $news->idUser = $request->input('userid');

        $news->save();

        if(is_uploaded_file($_FILES['photos']['tmp_name'][0]))
        {
            foreach ($_FILES['photos']['tmp_name'] as $index => $tmpName) {
                $image = new Photo;
                $image->image = file_get_contents($_FILES['photos']['tmp_name'][$index]);
                $image->type = $_FILES['photos']['size'][$index];
                $image->size = $_FILES['photos']['size'][$index];
                $image->idNews = $news->id;
                $image->save();
            }
        }

        return Redirect::to('home');
    }

    public function addComment(Request $request)
    {
        $idNews = $request->input('idNews');
        $username = $request->input('username');
        $email = $request->input('email');
        $content = $request->input('content');

        $comment = new Comment;
        $comment->idNews = $idNews;
        $comment->username = $username;
        $comment->email = $email;
        $comment->content = $content;
        $comment->save();

        return Redirect::to(URL::previous());
    }

}
