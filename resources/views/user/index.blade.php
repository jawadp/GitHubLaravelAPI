@extends('layouts.app')
@section('body')
    <h2 class="mt-5">Search GitHub followers</h2>
    <form action="{{ route('search') }}" method="post" class="mt-5">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <input type="text" name="username" placeholder="Enter GitHub username" class="form-control" value="{{ old('username') }}">
                @error('username')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary w-100">Search</button>
            </div>
        </div>
    </form>
    
@endsection