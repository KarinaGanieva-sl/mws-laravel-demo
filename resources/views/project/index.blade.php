@extends('layouts.main')
@section('content')
<div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Desciption</th>
                <th scope="col">Github link</th>
                <th scope="col">Created by</th>
            </tr>
            </thead>
            <tbody>
            @foreach($projects as $project)
                <tr>
                    <td><a href="{{ route('project.show', $project->id) }}">{{ $project->name }}</a></td>
                    <td>{{ $project->description }}</td>
                    <td><a href="{{ $project->github_link }}">{{ $project->github_link }}</a></td>
                    <td>{{ $project->creator->name }}</td>
                </tr>
            @endforeach    
            </tbody>
        </table>
        @if(auth()->user()->role === 'admin')
        <a class="btn btn-primary" href="{{ route('project.create') }}" role="button">Create new</a>
        @endif
</div>
@endsection('content')    