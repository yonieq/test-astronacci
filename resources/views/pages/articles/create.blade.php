@extends('layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y" xmlns="http://www.w3.org/1999/html">
        <h4 class="fw-bold py-3 mb-2"><span class="text-muted fw-light">Articles /</span> Create
        </h4>
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text"
                               class="form-control @error('title') is-invalid @enderror"
                               id="title"
                               name="title"
                               value="{{ old('title') }}"
                               placeholder="Enter title">
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="sub_title" class="form-label">Sub Title</label>
                        <input type="text"
                               class="form-control @error('sub_title') is-invalid @enderror"
                               id="sub_title"
                               name="sub_title"
                               value="{{ old('sub_title') }}"
                               placeholder="Enter sub title">
                        @error('sub_title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content</label>
                        <textarea class="form-control @error('content') is-invalid @enderror"
                                  id="content"
                                  name="contents"
                                  placeholder="Enter content">{{ old('content') }}</textarea>
                        @error('content')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Create</button>
                    <a href="{{ route('videos.index') }}" class="btn btn-outline-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection


