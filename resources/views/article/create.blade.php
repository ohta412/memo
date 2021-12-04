@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">記事登録登録</div>

                <div class="card-body">
                    <form action="{{ route('article.store') }}" method="POST">
                        @csrf
                        @include('article.form')
                        <button type="submit" class="btn btn-primary">登録する</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
