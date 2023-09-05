@extends('layouts.master')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y" xmlns="http://www.w3.org/1999/html">
        <h4 class="fw-bold py-3 mb-2"><span class="text-muted fw-light">Videos /</span> Update
        </h4>
        <div class="card mb-4">
            <div class="card-body">
                <form action="{{ route('videos.update', $video->id) }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text"
                               class="form-control @error('title') is-invalid @enderror"
                               id="title"
                               name="title"
                                 value="{{ old('title', $video->title) }}"
                               placeholder="Enter title">
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror"
                                  id="description"
                                  name="description"
                                    placeholder="Enter description">{{ old('description', $video->description) }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="url" class="form-label">Url</label>
                        <input type="text"
                               class="form-control @error('url') is-invalid @enderror"
                               id="url"
                               name="url"
                               value="{{ old('url', $video->url) }}"
                               placeholder="https://www.youtube.com/embed/...">
                        @error('url')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Update</button>
                    <a href="{{ route('videos.index') }}" class="btn btn-outline-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
