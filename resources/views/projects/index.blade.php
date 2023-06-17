@extends('layouts.master')
@section('title', 'Projects')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">List Projects</h5>
                    <a href="{{ route('projects.create') }}" class="btn btn-primary">Tambah Data</a>
                </div>
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive table-striped align-middle"
                        style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 10px;">
                                    <div class="form-check">
                                        <input class="form-check-input fs-15" type="checkbox" id="checkAll" value="option">
                                    </div>
                                </th>
                                <th>No</th>
                                <th>Judul</th>
                                <th data-ordering="false">Deskripsi</th>
                                <th data-ordering="false">Gambar</th>
                                <th data-ordering="false">Tech</th>
                                <th data-ordering="false">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input fs-15" type="checkbox" name="checkAll"
                                                value="option1">
                                        </div>
                                    </th>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{!! $item->description !!}</td>
                                    <td><img width="300px" height="200px" src="{{ asset('/storage/projects') . '/' . $item->image }}"
                                            alt="{{ $item->title }}"></td>
                                    <td>
                                        <ul>
                                            @foreach ($item->tech as $tech)
                                                <li>{{ ucfirst($tech) }}</li>
                                            @endforeach
                                        </ul>
                                    </td>

                                    <td>
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-primary btn-sm dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">

                                                <li><a href="{{ route('projects.edit', $item->id) }}"
                                                        class="dropdown-item edit-item-btn"><i
                                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                        Edit</a>
                                                </li>
                                                <li>
                                                    <form id="delete-{{ $item->id }}"
                                                        action="{{ route('projects.destroy', $item->id) }}" method="POST">
                                                        @csrf
                                                        <button type="button" onclick="confirmDelete({{ $item->id }})"
                                                            class="dropdown-item remove-item-btn">
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                            Delete
                                                        </button>
                                                        @method('DELETE')
                                                    </form>

                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection

@push('styles')
    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/libs/toastify-js/src/toastify.css') }}" type="text/css" />
    <!-- Sweet Alert css-->
    <link href="assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/libs/toastify-js/src/toastify.js') }}"></script>
    <script src="{{ asset('/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!--datatable js-->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            new DataTable("#datatable")
        });
    </script>
    @if (Session::has('success'))
        <script>
            Toastify({
                text: "{{ session()->get('success') }}",
                duration: 5000,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                className: 'bg-primary',
                style: {
                    background: "linear-gradient(to right, rgb(10, 179, 156), rgb(64, 81, 137))"
                },
            }).showToast();
        </script>
    @endif
    <script>
        const confirmDelete = id => {
            Swal.fire({
                html: '<div class="mt-3">' +
                    '<lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>' +
                    '<div class="mt-4 pt-2 fs-15 mx-5">' +
                    '<h4>Anda Yakin ?</h4>' +
                    '<p class="text-muted mx-4 mb-0">Anda yakin ingin menghapus data ini ?</p>' +
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
                    $(`#delete-${id}`).submit();
                }
            })
        }
    </script>
@endpush
