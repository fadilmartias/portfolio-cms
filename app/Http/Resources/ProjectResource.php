<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    public $status;
    public $message;
    public $resource;


    public function __construct($status, $message, $resource)
    {
        parent::__construct($resource);
        $this->status  = $status;
        $this->message = $message;
    }

    public function toArray(Request $request): array
    {
        return [
            'rc'        => $this->status,
            'message'   => $this->message,
            'data'      => $this->transformProjects($this->resource)
        ];
    }

    private function transformProjects($projects)
    {
        return $projects->map(function ($project) {
            $projectData = $project->toArray();

            // Mendapatkan URL gambar dari storage
            $imageUrl = url('storage/projects/' . $project->image);

            // Menambahkan URL gambar ke data proyek
            $projectData['image'] = $imageUrl;

            return $projectData;
        });
    }
}
