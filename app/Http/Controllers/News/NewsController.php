<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\News;
use Illuminate\Support\Facades\Storage;


class NewsController extends Controller
{
    private const NEWS_LIST_VIEW_NAME = 'admin.admin-news-empty';
    public function create()
    {

    }
    public function listAdmin(Request $request)
    {
        if (Auth::check()) {
            $news = News::all();
            return view(self::NEWS_LIST_VIEW_NAME, ["news"=> $news]);
        }
        return redirect('/');
    }
    public function show(Request $request)
    {
        if (Auth::check()) {
            return view('admin.admin-news-add');
        }
        return redirect('/');
    }
    public function add(Request $request)
    {
        if (Auth::check()) {
        $request->validate([
            'name' => ['required', 'string'],
            'body' => ['required', 'string'],
            'img_path' => ['required', 'file'],
            'created_at' => ['required', 'string']
        ]);
        $path = Storage::putFile('public/news', $request->img_path);
        News::create([
            'name' => $request->name,
            'body' => $request->body,
            'img_path' => $path,
            'created_at' => $request->created_at,
        ]);
            return redirect("/news-admin");
        }
        return redirect('/');
    }

    public function store(Request $request, $id)
    {
        if (Auth::check()) {
            $creditails =  $request->validate([
                'name' => ['required', 'string'],
                'body' => ['required', 'string'],
                'created_at' => ['required', 'string']
            ]);
            $news = News::findOrFail($id);
            if($request->img_path){
                $path = Storage::putFile('public/news', $request->img_path);
                $news->img_path = $path;
            }
            $news->name = $creditails["name"];
            $news->body = $creditails["body"];
            $news->created_at = $creditails["created_at"];
            $news->save();
            return view('admin.admin-news-add',["newsItem"=> $news]);
        }
        return redirect('/');

    }
    public function delete(Request $request)
    {
        $credentials = $request->validate([
            'id' => ['required', 'string'],
        ]);
        if (Auth::check()) {
            $newsId = $credentials["id"];
            $news = News::findOrFail($newsId)->delete();
            
            return redirect("/news-admin");
        }
        return redirect('/');
    }
    public function editShow($id)
    {
        if (Auth::check()) {
            $news = News::findOrFail($id);
            return view('admin.admin-news-add',["newsItem"=> $news]);
        }
        return redirect('/');
    }
}
