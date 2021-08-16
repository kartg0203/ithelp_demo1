@extends('layouts.layout')

@section('main')
    <h1 class="">文章列表</h1>
    <a href="{{ route('articles.create') }}">新增文章</a>
    <div class="row">
        <div class="col-md-8">
            <ul class="list-group list-group-flush table-light">
                @foreach ($articles as $article)
                    <li class="list-group-item list-group-item-action pt-4">
                        <h3 class="font-weight-bold"><a
                                href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
                        </h3>
                        <div>{{ $article->created_at }} 由 {{ $article->user->name }} 分享</div>
                        <div class="d-flex">
                            @auth
                                <a href="{{ route('articles.edit', $article) }}">編輯</a>
                                <form action="{{ route('articles.destroy', $article) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('你確定要刪除嗎?')">刪除</button>
                                </form>
                            @endauth
                        </div>
                    </li>
                @endforeach
            </ul>
            <div class="page mt-3">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
@endsection
