<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;


class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('project.index', compact('projects'));
    }

    public function create()
    {
        $users = User::all();
        return view('project.create', compact('users'));
    }

    public function store()
    {
        $creator_id = auth()->user()->id;
        $data = request()->validate([
            'name' => 'string',
            'description' => 'string',
            'owner_id' => 'integer',
        ]);
        $data['creator_id'] = $creator_id;
        Project::create($data);
        return redirect()->route('project.index');
    }

    public function show(Project $project)
    {
        return view('project.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $users = User::all();
        return view('project.edit', compact('project', 'users'));
    }

    public function update(Project $project)
    {
        $data = request()->validate([
            'name' => 'string',
            'description' => 'string',
            'owner_id' => 'integer',
        ]);
        $project->update($data);
        return redirect()->route('project.show', $project->id);
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('project.index');
    }


}
