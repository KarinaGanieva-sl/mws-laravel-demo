@extends('layouts.main')
@section('content')


<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group me-1" role="group" aria-label="First group">
    <a class="btn btn-primary" href="{{ route('project.index') }}" role="button">Back</a>
  </div>
  @if(auth()->user()->role === 'admin')
  <div class="btn-group me-1" role="group" aria-label="Second group">
    <a class="btn btn-primary" href="{{ route('project.edit', $project->id) }}" role="button">Edit</a>
  </div>
  @endif
@if(auth()->user()->role === 'admin')
  <div class="btn-group me-1" role="group" aria-label="Third group">
    <form action="{{ route('project.delete', $project->id) }}" method="post">
      @csrf
      @method('delete')
      <input type="submit" value="Delete" class="btn btn-primary">
    </form>
  </div>
@endif
</div>
<div>
    <form action="{{  route('project.store') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" id="name" placeholder="{{ $project->name}}" disabled>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea disabled type="text" name="description" class="form-control" id="description" placeholder="{{ $project->description}}"></textarea>
          </div>
          <div class="form-group">
            <label for="project">Created by</label>
            <input type="text" name="name" class="form-control" id="project" placeholder="{{ $project->creator->name}}" disabled>
          </div>  
      </form>
</div>
<div>
  <label for="issue">Issues</label>
  <div class="list-group">
    @foreach($project->issues as $issue)
    <a href="{{ route('issue.show', $issue->id)}}" class="list-group-item list-group-item-action">
      {{ $issue->name }}
    </a>
    @endforeach
  </div>
</div>
@endsection('content')    