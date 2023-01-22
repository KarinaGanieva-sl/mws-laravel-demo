@extends('layouts.main')
@section('content')
<div>
    <form action="{{  route('project.update', $project->id) }}" method="post">
        @csrf
        @method('patch')
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{$project->name}}">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea type="text" name="description" class="form-control" id="description" placeholder="Description" value="{{$project->description}}">{{$project->description}}</textarea>
        </div>
        <div class="form-group">
          <label for="owner">Owner</label>
          <select class="form-control" id="owner" name="owner_id">
            @foreach($users as $user)
              <option 
                {{ $user->id === $project->owner_id ? 'selected' : '' }}
              value="{{$user->id}}">{{$user->name}}</option>
            @endforeach  
          </select>
        </div>
        <div class="form-group">
          <label for="github_link">Github link</label>
          <input type="text" name="github_link" class="form-control" id="github_link" placeholder="Github link" value="{{$project->github_link}}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
</div>
@endsection('content')    