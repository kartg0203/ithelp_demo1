@extends('layouts.layout')

@section('main')
    <h1 class="">文章>修改文章</h1>
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('articles.update', $article) }}" method="POST">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="title">標題</label>
                    <input type="text" class="form-control" name="title" placeholder="請輸入標題"
                        value="{{ $article->title }}">
                    @error('title')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">內容</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control"
                        placeholder="請輸入內容">{{ $article->content }}</textarea>
                    @error('content')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="actions text-right">
                    <button type="submit" class="btn btn-secondary mr-1">確定修改</button>
                </div>
            </form>
        </div>
    </div>

@endsection
