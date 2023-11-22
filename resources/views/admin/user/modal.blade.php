<!-- Modal Create -->
<div class="modal fade" id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Pengguna</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('user.insert') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row pt-2">
                        <label for="name" class="col-sm-3 col-form-label">Nama Pengguna <small
                                class="text-danger">*</small> </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control " name="name" id="name"
                                placeholder="Masukan Nama Pengguna" autocomplete="name" required>
                        </div>
                    </div>

                    <div class="row pt-2">
                        <label for="email" class="col-sm-3 col-form-label">Email <small class="text-danger">*</small>
                        </label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Masukkan Email" autocomplete="email" required>
                        </div>
                    </div>

                    <div class="row pt-2">
                        <label for="password" class="col-sm-3 col-form-label">Password <small
                                class="text-danger">*</small> </label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Masukkan Password" required>
                        </div>
                    </div>

                    <div class="pt-4">
                        <div class="alert alert-warning" role="alert">
                            Note : Kelompok Pengguna Bawaan adalah
                            <b>Petugas</b>
                            <br>
                            Nama Pengguna Harus diawali dengan <b>Huruf Kapital</b>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach ($getRecord as $value)
    <!-- Modal Edit -->
    <div class="modal fade" id="edit{{ $value->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="edit">Edit Data Pengguna</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('admin/user/edit/' . $value->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row pt-2">
                            <label for="name" class="col-sm-3 col-form-label">Nama Pengguna <small
                                    class="text-danger">*</small> </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control " name="name" id="name"
                                    value="{{ old('name', $value->name) }}" placeholder="Masukan Nama Pengguna"
                                    autocomplete="name" required>
                            </div>
                        </div>

                        <div class="row pt-2">
                            <label for="email" class="col-sm-3 col-form-label">Email <small
                                    class="text-danger">*</small>
                            </label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="email" id="email"
                                    value="{{ old('email', $value->email) }}" placeholder="Masukkan Email"
                                    autocomplete="email" required>
                            </div>
                        </div>

                        <div class="row pt-2">
                            <label for="password" class="col-sm-3 col-form-label">Reset Password <small
                                    class="text-danger">*</small> </label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Masukkan Password" required>
                                <p>Silahkan input kolom ini jika ingin <b>Mengubah Password</b></p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
