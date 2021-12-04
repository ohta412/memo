<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        // 文字列検索
        $words = [];
        if( isset($_GET['s']) ){
            $words = e($_GET['s']);
            $words = str_replace('　', ' ', $words);
            $words = explode(' ', $words);
        }

        if( !empty($words) ){
            $title_query = [];
            $content_query = [];
            foreach( $words as $word ){
                $title_query[] = ['title', 'LIKE', '%'.$word.'%'];
                $content_query[] = ['content', 'LIKE', '%'.$word.'%'];
            }
            $query = Article::query();
            $query->where(function($query) use($title_query, $content_query){
                $query->orWhere($title_query)
                    ->orWhere($content_query);
            });
            $query->orderBy('created_at', 'DESC');
            $articles = $query->paginate(20);
        }else{
            $articles = Article::orderBy('created_at', 'DESC')->paginate(20);
        }

        return view('article.index', compact('articles', 'categories'));
    }

    public function category($id)
    {
        $categories = Category::all();
        $category = Category::find($id);
        $articles = $category->articles()->paginate(20);
        return view('article.index', compact('articles', 'category', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('article.create', compact('categories'));
    }

    public function store(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all())->save();
        $article->categories()->sync($request->categories);
        return redirect()->route('article.index');
    }

    public function show($id)
    {
        $categories = Category::all();
        $article = Article::find($id);
        return view('article.show', compact('article', 'categories'));
    }

    public function edit($id)
    {
        $article = Article::find($id);
        $categories = Category::all();
        return view('article.edit', compact('article', 'categories'));
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article->fill($request->all())->save();
        $article->categories()->sync($request->categories);
        return redirect()->route('article.show', compact('article'));
    }

    public function destroy(Article $article)
    {
        $article->delete();
        DB::table('article_category')->where('article_id', $article->id)->delete();
        return redirect()->route('article.index');
    }
}
