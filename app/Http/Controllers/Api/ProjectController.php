<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProjectResource;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        try {
            // Get all projects
            $projects = Project::orderBy('id', 'desc')->get();

            // Return collection of projects as a resource
            return new ProjectResource(200, 'Berhasil mendapatkan list data project', $projects);
        } catch (\Exception $e) {
            // Tangani kesalahan yang terjadi
            return response()->json([
                'rc' => 500,
                'message' => 'Terjadi kesalahan saat mengambil data project',
                'log' => $e,
                'data' => null,
            ], 500);
        }
    }
}
