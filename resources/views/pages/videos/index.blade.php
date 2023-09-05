@extends('layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y" xmlns="http://www.w3.org/1999/html">
        <h4 class="fw-bold py-3 mb-2"><span class="text-muted fw-light">Videos /</span> Home
        </h4>

        @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success!</strong> {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <a href="{{ route('videos.create') }}" class="btn btn-primary mb-3">
            <i class="menu-icon tf-16 bx bx-plus"></i>
            Create Video
        </a>

        <div class="row mb-5">
            @forelse($data as $video)
                <div class="col-md-6 col-lg-4 mb-3">
                    <div class="card h-80">
                        <iframe width="100%" height="315" src="{{ $video->url  }}" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                allowfullscreen></iframe>
                        <div class="card-body">
                            <h5 class="card-title">{{ $video->title  }}</h5>
                            <p class="card-text">
                                {{ $video->description  }}
                            </p>
                            <a href="{{ route('videos.edit', 1) }}" class="btn btn-outline-warning">
                                <i class="menu-icon tf-16 bx bx-edit"></i>
                            </a>
                            <form action="{{ route('videos.destroy', $video->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger" onclick="return confirm('Are you sure?')">
                                    <i class="menu-icon tf-16 bx bx-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-black text-center">
                    <h1>Videos is empty</h1>
                </div>
            @endforelse
        </div>
    </div>
@endsection
