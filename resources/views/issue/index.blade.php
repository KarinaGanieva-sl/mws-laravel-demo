@extends('layouts.main')
@section('content')
<div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Desciption</th>
                <th scope="col">Project</th>
                <th scope="col">Reporter</th>
                <th scope="col">Created by</th>
            </tr>
            </thead>
            <tbody>
            @foreach($issues as $issue)
                <tr>
                    <td><a href="{{ route('issue.show', $issue->id) }}">{{ $issue->name }}</a></td>
                    <td>{{ $issue->description }}</td>
                    <td>{{ $issue->project->name }}</td>
                    <td>{{ $issue->reporter->name }}</td>
                    <td>{{ $issue->creator->name }}</td>
                </tr>
            @endforeach    
            </tbody>
        </table>
        <a class="btn btn-primary" href="{{ route('issue.create') }}" role="button">Create new</a>
</div>
@endsection('content')    