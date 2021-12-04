@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h1>{{ $article->title }}</h1>
                    <div class="d-flex">
                        
                        <p class="mr-4">投稿日：<time datetime="{{ $article->created_at->format('Y-m-d') }}">{{ $article->created_at->format('Y.n.j') }}</time></p>
                        @if (!$article->categories->isEmpty())
                            <p>
                                @foreach ($article->categories as $category)
                                    @if ($loop->index !== 0)
                                        ,
                                    @endif
                                    <a href="{{ route('article.category', compact('category')) }}">{{ $category->name }}</a>
                                @endforeach
                            </p>
                        @endif
                    </div>
                    <div class="pt-3 border-top">
                        {!! nl2br(e($article->content)) !!}
                    </div>
                    <div class="mt-4">
                        <a href="{{ route('article.index') }}" class="btn btn-primary">一覧へ戻る</a>
                        @auth
                            <a href="{{ route('article.edit', compact('article')) }}" class="btn btn-primary">編集する</a>
                            <button class="btn btn-danger" onClick="if( confirm('削除しますか？') ) document.delete.submit();">削除する</button>
                            <form action="{{ route('article.destroy', compact('article')) }}" method="POST" name="delete">
                                @csrf
                                @method('DELETE')
                            </form>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
