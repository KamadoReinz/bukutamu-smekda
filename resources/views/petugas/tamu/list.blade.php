@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Data Tamu</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('petugas/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Tamu</li>
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
                    <div>
                        <form action="" method="GET">
                            <div class="d-flex" style="gap: 10px;">
                                <div>
                                    <input type="date" class="form-control" name="date"
                                        value="{{ Request::get('date') }}">
                                </div>
                                <div>
                                    <button class="btn btn-outline-primary" type="submit">Cari</button>
                                </div>
                                <div>
                                    <a href="{{ url('petugas/tamu/list') }}" class="btn btn-outline-secondary">Reset</a>
                                </div>
                            </div>
                        </form>
                    </div>

                    <!-- Table with stripped rows -->
                    <table class="table table-striped">
                        <thead>
                            <tr style="text-align: center;">
                                <th scope="col">#</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Asal</th>
                                <th scope="col">Tujuan</th>
                                <th scope="col">Dibuat</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($getTamu as $key => $item)
                                <tr style="text-align: center;">
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->tujuan }}</td>
                                    <td>{{ date('d-m-Y H:i:s', strtotime($item->created_at)) }}</td>
                                    <td>
                                        <a href="#edit{{ $item->id }}" data-bs-toggle="modal"
                                            class="btn btn-warning btn-sm"><i class="bi bi-pencil" data-bs-toggle="tooltip"
                                                data-bs-placement="top" aria-label="Ubah"
                                                data-bs-original-title="Ubah"></i></a>
                                        <button class="btn btn-sm btn-danger btn-delete"
                                            onclick="deleteTamu('{{ route('tamu.delete', $item->id) }}')" id="delete"><i
                                                class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="padding: 10px; float: right;">
                        {!! $getTamu->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                    </div>
                    <!-- End Table with stripped rows -->
                </div>
            </div>
        </div>
    </section>
    @include('petugas.tamu.modal')
@endsection

@push('js')
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/sweetalert2/dist/sweetalert2.css') }}">
    <script src="{{ asset('assets/js/plugins/sweetalert2/dist/sweetalert2.js') }}"></script>

    <script>
        function deleteTamu(action) {
            Swal.fire({
                title: "Hapus Tamu?",
                text: "Apakah Anda Yakin Akan Menghapus Tamu Ini?",
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
