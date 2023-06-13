<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Project::orderBy('created_at', 'desc')->get();

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
        $temporaryFile = TemporaryFile::where('folder', $request->image)->first();
        if ($temporaryFile) {
            $temporaryFilePath = 'public/projects/tmp/' . $request->image . '/' . $temporaryFile->filename;
            $destinationPath = 'public/projects/' . $temporaryFile->filename;
            Storage::move($temporaryFilePath, $destinationPath);
            rmdir(storage_path('app/public/projects/tmp/' . $request->image));
            $temporaryFile->delete();
        }
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

        $dataTech = explode(',', $data['tech']);

        $project = Project::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'link' => $data['link'],
            'tech' => $dataTech,
            'password' => bcrypt($data['password']),
            'type' => $data['type'],
            'image' => $request->image,
        ]);

        if ($project) {
            $project->update([
                'image' => $temporaryFile->filename,
            ]);
        }

        return to_route('projects.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }

    public function upload(Project $project, Request $request)
    {

        // if ($request->hasFile('image')) {
        //     $image_decode = json_decode($request->image);
        //     $path = rand() . '-' . str_replace(' ', '-', $image_decode->name);
        //     $file_image = base64_decode($image_decode->data);
        //     if (!is_null($project->image)) {
        //         if (file_exists(public_path('storage/projects/') . $project->foto)) {
        //             unlink(public_path('storage/projects/') . $project->foto);
        //         }
        //     }
        //     \Storage::put('public/projects/' . $path, $file_image);

        //     TemporaryFile::create([
        //         'nup_id' => $nup->id,
        //         'nama' => $image_decode->name,
        //         'path' => $path,
        //     ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = $file->getClientOriginalName();
            $folder = uniqid() . '-' . now()->timestamp;
            $file->storeAs('public/projects/tmp/' . $folder, $filename);

            TemporaryFile::create([
                'folder' => $folder,
                'filename' => $filename,
            ]);

            return $folder;
        }
        return '';
    }
}
