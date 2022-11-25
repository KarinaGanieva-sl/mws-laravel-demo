@extends('layouts.main')
@section('content')
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
            <textarea type="text" name="description" class="form-control" id="description" placeholder="Description" value="{{$issue->description}}"></textarea>
        </div>
        <div class="form-group">
          <label for="owner">Owner</label>
          <select class="form-control" id="project" name="project_id">
            @foreach($projects as $project)
              <option 
                {{ $project->id === $issue->project_id ? 'selected' : '' }}
              value="{{$project->id}}">{{$project->name}}</option>
            @endforeach  
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
</div>
@endsection('content')    