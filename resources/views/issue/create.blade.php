@extends('layouts.main')
@section('content')
<div>
    <form action="{{  route('issue.store') }}" method="post">
        @csrf
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" id="name" placeholder="Name">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea type="text" name="description" class="form-control" id="description" placeholder="Description"></textarea>
        </div>
        <div class="form-group">
          <label for="project">Project</label>
          <select class="form-control" id="project" name="project_id">
            @foreach($projects as $project)
              <option value="{{$project->id}}">{{$project->name}}</option>
            @endforeach  
          </select>
        </div>
        <div class="form-group">
          <label for="reporter">Reporter</label>
          <select class="form-control" id="reporter" name="reporter_id">
            @foreach($users as $user)
              <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach  
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
      </form>
</div>
@endsection('content')    