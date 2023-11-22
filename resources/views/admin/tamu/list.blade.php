@extends('layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Data Tamu</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Tamu</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">

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
                                    <a href="{{ url('admin/tamu/list') }}" class="btn btn-outline-secondary">Reset</a>
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
                                <th scope="col">Alamat</th>
                                <th scope="col">Tujuan</th>
                                <th scope="col">Dibuat</th>
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div style="padding: 10px; float: right;">
                        {!! $getTamu->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
