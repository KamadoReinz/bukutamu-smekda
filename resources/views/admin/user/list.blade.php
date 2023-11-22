@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Data Pengguna</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Pengguna</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="pb-3">
                <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#create" class="btn btn-primary"><i
                        class="bi bi-plus"></i> Tambah</a>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="pt-3"></div>

                    <!-- Table with stripped rows -->
                    <table class="table table-striped">
                        <thead>
                            <tr style="text-align: center;">
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Kelompok Pengguna</th>
                                <th scope="col">Dibuat</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getRecord as $key => $value)
                                <tr style="text-align: center;">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $value->name }}</td>
                                    <td>
                                        @if ($value->role == 1)
                                            Admin
                                        @elseif ($value->role == 2)
                                            Petugas
                                        @else
                                            {{ $value->role }}
                                        @endif
                                    </td>
                                    <td>{{ date('d-m-Y H:i:s', strtotime($value->created_at)) }}</td>
                                    <td>
                                        <a href="#edit{{ $value->id }}" data-bs-toggle="modal"
                                            class="btn btn-warning btn-sm"><i class="bi bi-pencil" data-bs-toggle="tooltip"
                                                data-bs-placement="top" aria-label="Ubah"
                                                data-bs-original-title="Ubah"></i></a>
                                        <button class="btn btn-sm btn-danger btn-delete"
                                            onclick="deleteUser('{{ route('user.delete', $value->id) }}')" id="delete"><i
                                                class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    @include('admin.user.modal')
@endsection

@push('js')
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/sweetalert2/dist/sweetalert2.css') }}">
    <script src="{{ asset('assets/js/plugins/sweetalert2/dist/sweetalert2.js') }}"></script>

    <script>
        function deleteUser(action) {
            Swal.fire({
                title: "Hapus User?",
                text: "Apakah Anda Yakin Akan Menghapus User Ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Iya",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = action
                }
            });
        }
    </script>
@endpush
