@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @guest
                <h1>You must be logged first!</h1>
            @else
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('projects.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Title" name="title" value="{{ old('title', '') }}">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Topic" name="topic" value="{{ old('topic', '') }}">
                        </div>
                        <div class="col input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">https://github</span>
                            </div>
                            <input type="text" class="form-control" name="gitHub" value="{{ old('gitHub', '') }}">
                        </div>
                        <div class="col">
                            <button type="submit" class="btn btn-primary d-block">Save</button>
                        </div>
                    </div>
                </form>
                <a href="{{ route('projects.index') }}" class="btn btn-primary mt-6 d-block">Back to list</a>
            @endguest
        </div>
    </div>
</div>
@endsection