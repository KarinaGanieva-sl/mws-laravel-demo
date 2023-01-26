<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Exceptions\GithubProjectNotFound;
use Illuminate\Support\Facades\Http;

use App\Mail\Project\Creation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


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
        $email = auth()->user()->email;
        $data = request()->validate([
            'name' => 'string',
            'description' => 'string',
            'owner_id' => 'integer',
        ]);
        $data['creator_id'] = $creator_id;
        $data['github_link'] = session('github_link', '');
        Project::create($data);
        Mail::to($email)->send(new Creation($data['name']));
        return redirect()->route('project.index');
    }

    public function show(Project $project)
    {
        $end_point = 'https://api.github.com/repos/'.substr($project->github_link, 19);
        $github_info = Http::withToken(config('dns-manager.github-api-token'))
            ->withOptions(['verify' => false])->get($end_point);
        if($github_info->status() != 200) {
            throw new GithubProjectNotFound();
        }
        return view('project.show', compact('project', 'github_info'));
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
