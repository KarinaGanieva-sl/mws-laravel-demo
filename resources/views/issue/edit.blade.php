@extends('layouts.main')
@section('content')
<a class="btn btn-primary me-1" href="{{ route('issue.show', $issue->id) }}" role="button">Back</a>
<div>
    <form action="{{  route('issue.update', $issue->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{$issue->name}}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea type="text" name="description" class="form-control" id="description" placeholder="Description" value="{{$issue->description}}">{{$issue->description}}</textarea>
        </div>
        <div class="form-group">
          <label for="owner">Project</label>
          <select class="form-control" id="project" name="project_id">
            @foreach($projects as $project)
              <option 
                {{ $project->id === $issue->project_id ? 'selected' : '' }}
              value="{{$project->id}}">{{$project->name}}</option>
            @endforeach  
          </select>
        </div>
        <div class="form-group">
          <label for="owner">Created by</label>
          <select class="form-control" id="project" name="creator_id" disabled>
            @foreach($users as $user)
              <option 
                {{ $user->id === $issue->creator_id ? 'selected' : '' }}
              value="{{$user->id}}">{{$user->name}}</option>
            @endforeach  
          </select>
        </div>
        <div class="form-group">
          <label for="owner">Reporter</label>
          <select class="form-control" id="project" name="reporter_id">
            @foreach($users as $user)
              <option 
                {{ $user->id === $issue->reporter_id ? 'selected' : '' }}
              value="{{$user->id}}">{{$user->name}}</option>
            @endforeach  
          </select>
        </div>
        <button type="submit" class="btn btn-primary me-1">Update</button>
      </form>
</div>
@endsection('content')    