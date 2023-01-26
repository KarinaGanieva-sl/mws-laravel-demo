<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectCollection;
use App\Http\Resources\ProjectResource;
use Illuminate\Http\Request;
use App\Models\Project;

class IndexController extends Controller
{
    public function index()
    {
        return new ProjectCollection(Project::all());
    }

    public function show()
    {
        return new ProjectResource(Project::find(1));
    }
}
