<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticlesStoreRequest;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    public function index(Request $request)
    {
        if(auth()->user()->type == 'A') {
            $data = Article::latest()->take(3)->get();
        } elseif(auth()->user()->type == 'B') {
            $data = Article::latest()->take(10)->get();
        } else {
            $data = Article::latest()->get();
        }

        return view('pages.articles.index', compact('data'));
    }

    public function create(Request $request)
    {
        return view('pages.articles.create');
    }

    public function store(ArticlesStoreRequest $request)
    {
//        image handler
        $data = $request->all();

        Article::create($data);

        return redirect()->route('articles.index')->with('success', 'Article created successfully');
    }

    public function edit(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        return view('pages.articles.edit', compact('article'));
    }

    public function show(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        return view('pages.articles.show', compact('article'));
    }

    public function update(Request $request, $id)
    {
        $data = Article::findOrFail($id);
        $data->update($request->all());
        return redirect()->route('articles.index')->with('success', 'Article updated successfully');
    }

    public function destroy(Request $request, $id)
    {
        $data = Article::findOrFail($id);
        $data->delete();
        return redirect()->route('articles.index')->with('success', 'Article deleted successfully');
    }
}
