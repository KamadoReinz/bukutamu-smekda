<!-- Modal Create -->
<div class="modal fade" id="create" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Tamu</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('tamu.insert') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row pt-2">
                        <label for="nama" class="col-sm-3 col-form-label">Nama <small class="text-danger">*</small>
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control " name="nama" id="nama"
                                placeholder="Masukkan Nama" autocomplete="name" required>
                        </div>
                    </div>

                    <div class="row pt-2">
                        <label for="alamat" class="col-sm-3 col-form-label">Asal <small
                                class="text-danger">*</small>
                        </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="alamat" id="alamat"
                                placeholder="Masukkan Alamat" required>
                        </div>
                    </div>

                    <div class="row pt-2">
                        <label for="tujuan" class="col-sm-3 col-form-label">Tujuan <small
                                class="text-danger">*</small> </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="tujuan" id="tujuan"
                                placeholder="Masukkan Tujuan" required>
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

@foreach ($getTamu as $item)
    <!-- Modal Edit -->
    <div class="modal fade" id="edit{{ $item->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="edit">Edit Data Tamu</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('petugas/tamu/edit/' . $item->id) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="row pt-2">
                            <label for="nama" class="col-sm-3 col-form-label">Nama <small
                                    class="text-danger">*</small>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control " name="nama" id="nama"
                                    value="{{ old('nama', $item->nama) }}" placeholder="Masukkan Nama"
                                    autocomplete="name" required>
                            </div>
                        </div>

                        <div class="row pt-2">
                            <label for="alamat" class="col-sm-3 col-form-label">Asal <small
                                    class="text-danger">*</small>
                            </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="alamat" id="alamat"
                                    value="{{ old('alamat', $item->alamat) }}" placeholder="Masukkan Alamat" required>
                            </div>
                        </div>

                        <div class="row pt-2">
                            <label for="tujuan" class="col-sm-3 col-form-label">Tujuan <small
                                    class="text-danger">*</small> </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="tujuan" id="tujuan"
                                    value="{{ old('tujuan', $item->tujuan) }}" placeholder="Masukkan Tujuan" required>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" value="{{ $item->id }}" name="id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
