@extends('layouts.master')
@section('title', 'Edit Project')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="{{ route('projects.update', $data->id) }}" id="form" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <label for="labelInput" class="form-label">Title</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    name="title" id="labelInput" value="{{ old('title', $data->title) }}">
                            </div>
                            @error('title')
                                <div class="text-sm text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <label for="labelInput" class="form-label">Description</label>
                                <div id="description" style="height: 200px;">
                                </div>
                                <input type="hidden" name="description" id="descriptionInput">
                            </div>
                            @error('description')
                                <div class="text-sm text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <label for="labelInput" class="form-label">Link</label>
                                <input type="text" class="form-control @error('link') is-invalid @enderror"
                                    name="link" id="labelInput" value="{{ old('link', $data->link) }}">
                            </div>
                            @error('link')
                                <div class="text-sm text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="labelInput" class="form-label">Tech</label>
                                <select class="form-control" id="tech" data-choices multiple>
                                </select>
                                <input type="hidden" id="techInput" name="tech">
                            </div>
                            @error('tech')
                                <div class="text-sm text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <label for="labelInput" class="form-label">Type</label>
                                <select title="type" name="type" class="form-select">
                                    <option @selected(old('type') == $data->type)>{{ $data->type }}
                                    </option>
                                    <option value="Freelance Project">Freelance Project</option>
                                    <option value="Personal Project">Personal Project</option>
                                    <option value="Coursework">Coursework</option>
                                    <option value="Work Project">Work Project</option>
                                </select>
                            </div>
                            @error('type')
                                <div class="text-sm text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col-lg-12">
                                <label for="labelInput" class="form-label">Password</label>
                                <input type="text" class="form-control @error('password') is-invalid @enderror"
                                    name="password" id="labelInput" value="{{ old('password', $data->password) }}">
                            </div>
                            @error('password')
                                <div class="text-sm text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="labelInput" class="form-label">Image</label>
                                @if ($data->image)
                                    <div class="my-2 alert alert-info">
                                        <a data-fancybox data-type="image" class="text-primary"
                                            href="{{ asset('/storage/projects') . '/' . $data->image }}">Klik untuk melihat foto project yang sudah
                                            diupload</a><span>
                                            <br>Upload
                                            ulang jika ingin mengganti foto.</span>
                                    </div>
                                @endif
                                <input type="file" class="filepond" name="image" id="image"
                                    data-allow-reorder="true" data-max-file-size="3MB">
                                <small>Maksimum ukuran file adalah 3MB</small>

                                <!-- end card body -->
                            </div>
                            @error('image')
                                <div class="text-sm text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            <!-- end card -->
                        </div> <!-- end col -->

                    </div>
                    <div class="card-footer d-flex justify-content-end gap-3">
                        <a href="{{ route('projects.index') }}" class="btn btn-danger">Cancel</a>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

@endsection

@push('styles')
    <!-- quill css -->
    <link href="{{ asset('assets/libs/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />
    <!-- Filepond css -->
    <link rel="stylesheet" href="{{ asset('assets/libs/filepond/filepond.min.css') }}" type="text/css" />
    <link rel="stylesheet"
        href="{{ asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.css') }}"
        type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" type="text/css" />
    <link href="{{ asset('assets/libs/choices.js/public/assets/styles/base.min.css') }}" type="text/css" />
    <link href="{{ asset('assets/libs/choices.js/public/assets/styles/choices.min.css') }}" type="text/css" />
@endpush

@push('scripts')
    <!-- quill js -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="{{ asset('assets/libs/quill/quill.min.js') }}"></script>
    <!-- filepond js -->
    <script src="{{ asset('assets/libs/filepond/filepond.min.js') }}"></script>
    <script src="{{ asset('assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js') }}"></script>
    <script src="{{ asset('assets/libs/filepond-plugin-image-preview/filepond-plugin-image-preview.min.js') }}"></script>
    <script src="{{ asset('assets/libs/filepond-plugin-file-validate-size/filepond-plugin-file-validate-size.min.js') }}">
    </script>
    <script
        src="{{ asset('assets/libs/filepond-plugin-image-exif-orientation/filepond-plugin-image-exif-orientation.min.js') }}">
    </script>
    <script src="{{ asset('assets/libs/filepond-plugin-file-encode/filepond-plugin-file-encode.min.js') }}"></script>
    <script src="{{ asset('assets/libs/choices.js/public/assets/scripts/choices.min.js') }}"></script>

    <!-- prismjs plugin -->
    <script src="{{ asset('assets/libs/prismjs/prism.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>

    <!-- Delete Image -->
    <script src="{{ URL::asset('/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <script>
        FilePond.registerPlugin(
            FilePondPluginFileEncode,
            FilePondPluginImagePreview,
            FilePondPluginImageExifOrientation,
            FilePondPluginFileValidateSize,
        );

        const pond = FilePond.create(document.querySelector('#image'));

        const quill = new Quill('#description', {
            theme: 'snow'
        });
        quill.root.innerHTML = `{!! $data->description !!}`;

        const choices = new Choices('[data-choices]', {
            placeholder: true,
            placeholderValue: '-- Pilih Tech --',
            removeItems: true,
            removeItemButton: true,
            choices: [{
                    value: 'wordpress',
                    label: 'Wordpress'
                },
                {
                    value: 'laravel',
                    label: 'Laravel',
                },
            ],
        });

        let data = {!! html_entity_decode(json_encode($data->tech)) !!};
        choices.setChoiceByValue(data);

        const form = document.querySelector('#form');
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const desc = quill.root.innerHTML;
            document.querySelector('#descriptionInput').value = desc
            document.querySelector('#techInput').value = choices.getValue(true);
            form.submit();
        });
    </script>
@endpush
