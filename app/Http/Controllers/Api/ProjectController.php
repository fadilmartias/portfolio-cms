<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;

class ProjectController extends Controller
{
    public function index()
    {
        //get all projects
        $projects = Project::latest()->paginate(5);

        //return collection of projects as a resource
        return new ProjectResource(200, 'List Data Projects', $projects);
    }
}
