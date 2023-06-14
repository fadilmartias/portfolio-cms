@extends('layouts.master')
@section('title', 'Edit Project')
@section('content')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <form action="{{ route('projects.update', $data->id) }}" id="form" method="post" enctype="multipart/form-data">
                    @csrf
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
                                <input type="hidden" name="description" id="descriptionInput"
                                    value="{{ old('description', $data->description) }}">
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
                                    <option value="wordpress">Wordpress</option>
                                    <option value="laravel">Laravel</option>
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
                                    <option disabled selected>-- Pilih Type --</option>
                                    <option value="Freelance Project">Freelance Project</option>
                                    <option value="Personal Project">Personal Project</option>
                                    <option value="Coursework">Coursework</option>
                                    <option value="Work Project">Course Work</option>
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
                                <div class="my-2 alert alert-info" id="info-foto">
                                    <span>Foto projecy yang sudah diinput: </span>
                                    <div class="d-flex flex-wrap gap-2 my-2">

                                        <a href="{{ $data->image }}" data-fancybox="gallery2"
                                            data-caption="{{ $data->title }}">
                                            <div class="position-relative">
                                                <img src="{{ $data->image }}" alt="{{ $data->title }}"
                                                    width="80" class="img-fluid img-thumbnail">

                                                <div class="position-absolute" style="top: -10px; right: -5px;"
                                                    id="foto-{{ $data->id }}"
                                                    onclick="event.preventDefault();imgDestroy({{ $data->id }});">
                                                    <i class="ri-close-circle-fill text-danger fs-4"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <p class="m-0">Tekan tombol silang untuk menghapus foto.</p>
                                    <p class="m-0">Upload foto jika ingin menambahkan foto serah terima.</p>
                                </div>
                                @endif
                                <input type="file" class="filepond" name="image" id="image"
                                    data-allow-reorder="true" data-max-file-size="3MB">

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
    <link href="{{ asset('assets/libs/choices.js/public/assets/styles/base.min.css') }}" type="text/css" />
    <link href="{{ asset('assets/libs/choices.js/public/assets/styles/choices.min.css') }}" type="text/css" />
@endpush

@push('scripts')
    <!-- quill js -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="{{ asset('assets/libs/quill/quill.min.js') }}"></script>
    <!-- filepond js -->
    <script src="{{ asset('assets/libs/filepond/filepond.min.js') }}"></script>
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
            FilePondPluginImagePreview,
            FilePondPluginImageExifOrientation,
            FilePondPluginFileValidateSize,
        );

        const pond = FilePond.create(document.querySelector('#image'), {
            server: {
                process: '{{ route('projects.upload') }}',
                revert: '{{ route('projects.imgDestroy') }}',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                }
            }
        });

        const quill = new Quill('#description', {
            theme: 'snow'
        });

        const choices = new Choices('[data-choices]', {
            placeholder: true,
            placeholderValue: '-- Pilih Tech --',
            removeItems: true,
            removeItemButton: true,
        });
        const form = document.querySelector('#form');
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            const desc = quill.root.innerHTML;
            document.querySelector('#descriptionInput').value = desc
            document.querySelector('#techInput').value = choices.getValue(true);
            form.submit();
        })

        let dataFoto = {{ $data->image }}

        function imgDestroy(id) {
        let el = event.target.parentElement.parentElement.parentElement;

        Swal.fire({
            html: '<div class="mt-3">' +
                '<lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>' +
                '<div class="mt-4 pt-2 fs-15 mx-5">' +
                '<h4>Anda Yakin ?</h4>' +
                '<p class="text-muted mx-4 mb-0">Anda yakin ingin menghapus foto ini ?</p>' +
                '</div>' +
                '</div>',
            showCancelButton: true,
            reverseButtons: true,
            confirmButtonClass: 'btn btn-primary w-xs mb-1',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonClass: 'btn btn-danger w-xs mb-1 me-2',
            cancelButtonText: 'Batal',
            buttonsStyling: false,
            showCloseButton: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/nup/foto/hapus/' + id,
                    method: 'put',
                    context: el,
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(data) {
                        Toastify({
                            text: "Foto berhasil dihapus",
                            duration: 5000,
                            close: true,
                            gravity: "top", // `top` or `bottom`
                            position: "right", // `left`, `center` or `right`
                            stopOnFocus: true, // Prevents dismissing of toast on hover
                            className: 'bg-primary',
                            style: {
                                background: "linear-gradient(to right, rgb(10, 179, 156), rgb(64, 81, 137))"
                            },
                            onClick: function() {} // Callback after click
                        }).showToast();

                        el.remove();

                        dataFoto ? hideInfoFoto() : '';
                    }
                })
            }
        })
    }

    const hideInfoFoto = () => {
        return $('#info-foto').addClass('d-none');
    }

    </script>
@endpush
