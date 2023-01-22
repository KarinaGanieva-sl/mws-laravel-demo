@extends('layouts.main')
@section('content')
<div>
    <form action="{{  route('project.store') }}" method="post">
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
          <label for="github_link">Github link (not necessarily)</label>
          <input type="text" name="github_link" class="form-control" id="github_link" placeholder="">
        </div>
        <div class="form-group">
          <label for="owner">Owner</label>
          <select class="form-control" id="owner" name="owner_id">
            @foreach($users as $user)
              <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach  
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
      </form>
</div>
@endsection('content')    