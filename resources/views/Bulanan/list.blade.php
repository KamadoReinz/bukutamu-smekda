@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Data Bulanan</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Bulanan</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col -->
                <div class="col-md-12">


                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr style="text-align: center;">
                                        <th>Bulan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($bulananTamu as $item)
                                        <tr style="text-align: center;">
                                            <td>{{ \Carbon\Carbon::parse('01-' . $item->new_date)->isoFormat('MMMM Y') }}</td>
                                            <td>
                                                <a href="{{ route('bulanan.show', $item->new_date) }}"
                                                    class="btn btn-warning"
                                                    style="font-weight: bold; color: rgb(0, 0, 0)">Detail</a>
                                                <a href="{{ route('bulanan.cetak', $item->new_date) }}"
                                                    class="btn btn-success"
                                                    style="font-weight: bold; color: rgb(0, 0, 0)"><i class="bi bi-printer"
                                                        style="color: white"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center fs-5">Belum ada Data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
