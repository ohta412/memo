@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">カテゴリ編集</div>

                <div class="card-body">
                    <form action="{{ route('category.update', compact('category')) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        @include('category.form')
                        <button type="submit" class="btn btn-primary">登録する</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
