@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">記事編集</div>

                <div class="card-body">
                    <form action="{{ route('article.update', compact('article')) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        @include('article.form')
                        <button type="submit" class="btn btn-primary">登録する</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
