<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use App\Models\Issue;


class IssueController extends Controller
{
    public function index()
    {
        $issues = Issue::all();

        return view('issue.index', compact('issues'));
    }

    public function create()
    {
        $users = User::all();
        $projects = Project::all();
        return view('issue.create', compact('users', 'projects'));
    }

    public function store()
    {
        $creator_id = auth()->user()->id;
        $data = request()->validate([
            'name' => 'string',
            'description' => 'string',
            'project_id' => 'integer',
            'reporter_id' => 'integer',
        ]);
        $data['creator_id'] = $creator_id;
        Issue::create($data);
        return redirect()->route('issue.index');
    }

    public function show(Issue $issue)
    {
        return view('issue.show', compact('issue'));
    }

    public function edit(Issue $issue)
    {
        $users = User::all();
        $projects = Project::all();
        return view('issue.edit', compact('issue', 'users', 'projects'));
    }

    public function update(Issue $issue)
    {
        $data = request()->validate([
            'name' => 'string',
            'description' => 'string',
            'project_id' => 'integer',
            'reporter_id' => 'integer',
        ]);
        $issue->update($data);
        return redirect()->route('issue.show', $issue->id);
    }

    public function destroy(Issue $issue)
    {
        $issue->delete();
        return redirect()->route('issue.index');
    }


}
