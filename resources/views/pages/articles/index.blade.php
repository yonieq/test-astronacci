@extends('layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-2"><span class="text-muted fw-light">Articles /</span> Home
        </h4>

        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <a href="{{ route('articles.create') }}" class="btn btn-primary mb-3">
            <i class="menu-icon tf-16 bx bx-plus"></i>
            Create Article
        </a>

        <div class="row mb-5">
            @forelse($data as $article)
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card">
                        <div class="card-header">{{ $article->title  }}</div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $article->sub_title  }}</h5>
                            <p class="card-text">
                                {{ substr($article->content, 0, 100)  }} ...
                            </p>
                            <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary" target="_blank">Read More</a>
{{--                           update, and delete --}}
                            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-outline-warning"><i class="menu-icon tf-16 bx bx-edit"></i></a>
                            <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger" onclick="return confirm('Are you sure?')"><i class="menu-icon tf-16 bx bx-trash"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Warning!</strong> No data found.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endsection
