<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Project::orderBy('id', 'desc')->get();

        return view('projects.index', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required',
            'link' => 'string',
            'tech' => 'string',
            'password' => 'string',
            'type' => 'string',
        ], [
            '*.required' => ':attribute harus diisi.',
            '*.string' => ':attribute harus berupa string.',
        ]);

        $image = json_decode($request->image);
        $name = now()->timestamp . '-' . str_replace(' ', '-', $image->name);
        $dataImage = base64_decode($image->data);

        Storage::put('public/projects/' . $name, $dataImage);

        $dataTech = explode(',', $data['tech']);

        $project = Project::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'link' => $data['link'],
            'tech' => $dataTech,
            'password' => $data['password'],
            'type' => $data['type'],
            'image' => $name,
        ]);

        return to_route('projects.index')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('projects.edit', [
            'data' => $project,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required',
            'link' => 'string',
            'tech' => 'string',
            'password' => 'string',
            'type' => 'string',
        ], [
            '*.required' => ':attribute harus diisi.',
            '*.string' => ':attribute harus berupa string.',
        ]);

        if ($request->has('image')) {
            $image = json_decode($request->image);
            $name = now()->timestamp . '-' . str_replace(' ', '-', $image->name);
            $dataImage = base64_decode($image->data);

            if (file_exists(public_path('storage/projects/') . $project->image)) {
                unlink(public_path('storage/projects/') . $project->image);
            }
            Storage::put('public/projects/' . $name, $dataImage);
            $project->update([
                'image' => $name,
            ]);
        }

        $dataTech = explode(',', $data['tech']);
        $project->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'link' => $data['link'],
            'tech' => $dataTech,
            'password' => $data['password'],
            'type' => $data['type'],
        ]);

        return to_route('projects.index')->with('success', 'Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        if (!is_null($project->image)) {
            if (file_exists(public_path('storage/projects/') . $project->image)) {
                unlink(public_path('storage/projects/') . $project->image);
            }
        }
        $project->delete();

        return to_route('projects.index')->with('success', 'Data berhasil dihapus');
    }

}
