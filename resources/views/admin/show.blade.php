@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            @guest
                <h1>You must be logged first!</h1>
            @else
            <div class="card">
                <h5 class="card-header">{{ $project->topic }}</h5>
                <div class="card-body">
                    <h5 class="card-title">{{ $project->title }}</h5>
                    <p class="card-text text-secondary">{{ $project->date }}</p>
                    <p class="card-text">{{ $project->gitHub }}</p>
                    <a href="{{ route('projects.index') }}" class="btn btn-primary">Back to list</a>
                </div>
            </div>
            @endguest
        </div>
    </div>
</div>
@endsection