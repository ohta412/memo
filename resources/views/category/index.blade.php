@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">カテゴリ一覧</div>
                <div class="card-body">
                    @if ($categories)
                        <table class="table">
                            <tr>
                                <th>カテゴリ名</th>
                                <th>編集</th>
                                <th>削除</th>
                            </tr>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td><a href="{{ route('category.edit', compact('category')) }}" class="btn btn-primary">編集する</a></td>
                                    <td>
                                        <button class="btn btn-danger" onClick="if( confirm('削除しますか？') ) document.delete_{{ $category->id }}.submit(); ">削除する</button>
                                        <form action="{{ route('category.destroy', compact('category')) }}" method="POST" name="delete_{{ $category->id }}">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @endif
                    <a href="{{ route('category.create') }}" class="btn btn-primary">登録する</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
