@extends('layouts.layout')

@section('main')
    <h1 class="">文章>新增文章</h1>
    <div class="row">
        <div class="col-md-6">
            <form action="{{ route('articles.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">標題</label>
                    <input type="text" class="form-control" name="title" placeholder="請輸入標題" value="{{ old('title') }}">
                    @error('title')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="content">內容</label>
                    <textarea name="content" id="content" cols="30" rows="10" class="form-control"
                        placeholder="請輸入內容">{{ old('content') }}</textarea>
                    @error('content')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="actions text-right">
                    <button type="submit" class="btn btn-secondary mr-1">提交</button>
                    <button type="reset" class="btn btn-outline-danger">清除</button>
                </div>
            </form>
        </div>
    </div>

@endsection
