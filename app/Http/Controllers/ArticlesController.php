<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        // $articles = Article::all();
        $articles = Article::with('user')->latest()->paginate(5);
        return view('articles.index', ['articles' => $articles]);
    }

    public function show(Article $article)
    {
        return view('articles.show', ['article' => $article]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        // dd(request()->all());
        $data = request()->validate(
            [
                'title' => 'required',
                'content' => 'required | min: 10',
            ],
            [
                'required' => ':attribute 不能為空白。',
                'min' => ':attribute 不能小於:min個字。'
            ]
        );
        // 用auth()->user()獲取當前使用者，使用使用者角度創建文章

        // dd(auth()->user());
        auth()->user()->articles()->create($data);

        return redirect()->route('root')->with('notice', '文章新增成功');

        // dd($data['title']);
    }

    public function edit($id)
    {

        $article = auth()->user()->articles()->find($id);
        return view('articles.edit', ['article' => $article]);
    }

    public function update(Request $request, $id)
    {
        $article = auth()->user()->articles()->find($id);
        $data = request()->validate(
            [
                'title' => 'required',
                'content' => 'required | min: 10',
            ],
            [
                'required' => ':attribute 不能為空白。',
                'min' => ':attribute 不能小於:min個字。'
            ]
        );

        $article->update($data);

        return redirect()->route('root')->with('notice', '文章修改成功');
    }

    public function destroy($id)
    {
        $article = auth()->user()->articles()->find($id);
        $article->delete();

        return redirect()->route('root')->with('notice', '文章刪除成功');
    }
}
