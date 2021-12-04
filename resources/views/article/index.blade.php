@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @isset($category->name)
                        「{{ $category->name }}」の記事一覧
                    @else
                        記事一覧
                    @endisset
                </div>
                <div class="card-body">
                    @if ($articles)
                        <table class="table">
                            <tr>
                                <th>タイトル</th>
                                <th>カテゴリ</th>
                                <th>投稿日</th>
                            </tr>
                            @foreach ($articles as $article)
                                <tr>
                                    <td><a href="{{ route('article.show', compact('article')) }}">{{ $article->title }}</a></td>
                                    <td>
                                        @foreach ($article->categories as $category)
                                            @if ($loop->index !== 0)
                                                ,
                                            @endif
                                            <a href="{{ route('article.category', compact('category')) }}">{{ $category->name }}</a>
                                        @endforeach
                                    </td>
                                    <td>{{ $article->created_at->format('Y.n.j') }}</td>
                                </tr>
                            @endforeach
                        </table>
                    @endif
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
