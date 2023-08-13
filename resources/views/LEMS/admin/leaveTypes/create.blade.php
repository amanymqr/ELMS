@extends('LEMS.master')
@section('title', 'craete leave Types')

@section('content')
    <h1>Create Leave Type</h1>

    <form action="{{ route('leave-types.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control ">{{ old('description') }}</textarea>

        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>

@endsection
