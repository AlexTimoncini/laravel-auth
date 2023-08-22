@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            @guest
                <h1>You must be logged first!</h1>
            @else
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Topic</th>
                    <th scope="col">Date</th>
                    <th scope="col">Git Hub</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                    <tr>
                        <th scope="row">{{ $project->id }}</th>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->topic }}</td>
                        <td>{{ $project->date }}</td>
                        <td class="text-primary">{{ $project->gitHub }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endguest
        </div>
    </div>
</div>
@endsection