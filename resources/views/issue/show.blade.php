@extends('layouts.main')
@section('content')
<div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group me-1" role="group" aria-label="First group">
    <a class="btn btn-primary" href="{{ route('issue.index') }}" role="button">Back</a>
  </div>
  @if(auth()->user()->role === 'admin')
  <div class="btn-group me-1" role="group" aria-label="Second group">
    <a class="btn btn-primary" href="{{ route('issue.edit', $issue->id) }}" role="button">Edit</a>
  </div>
  @endif
  @if(auth()->user()->role === 'admin')
  <div class="btn-group me-1" role="group" aria-label="Third group">
    <form action="{{ route('issue.delete', $issue->id) }}" method="post">
      @csrf
      @method('delete')
      <input type="submit" value="Delete" class="btn btn-primary">
    </form>
  </div>
  @endif
</div>
<div>
    <form action="{{  route('issue.store') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" id="name" placeholder="{{ $issue->name}}" disabled>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea disabled type="text" name="description" class="form-control" id="description" placeholder="{{ $issue->description}}"></textarea>
          </div>
          <div class="form-group">
            <label for="project">Project</label>
            <input type="text" name="name" class="form-control" id="project" placeholder="{{ $issue->project->name}}" disabled>
          </div>  
          <div class="form-group">
            <label for="project">Created by</label>
            <input type="text" name="name" class="form-control" id="project" placeholder="{{ $issue->creator->name}}" disabled>
          </div>  
          <div class="form-group">
            <label for="project">Reporter</label>
            <input type="text" name="name" class="form-control" id="project" placeholder="{{ $issue->reporter->name}}" disabled>
          </div>  
      </form>
</div>
@endsection('content')    