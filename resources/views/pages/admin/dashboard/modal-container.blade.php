<div class="modal fade" id="new-gelombang" tabindex="-1" aria-labelledby="new-gelombangLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="new-gelombangLabel">Buka Gelombang</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    for="gelombang-reset-btn"></button>
            </div>
            <form action="{{ route('admin.buka-gelombang') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <p class="text-danger text-center ">Membuat gelombang baru akan menutup gelombang yang lama.</p>
                    <div class="mb-3">
                        <label for="nama_gelombang" class="form-label">Nama gelombang:</label>
                        <input required type="text" class="form-control" id="nama_gelombang"
                            placeholder="ex: Gelombang 1 tahun 2024 " name="nama_gelombang" required>
                    </div>
                    <div class="mb-3">
                        <label for="angkatan" class="form-label">Tahun Angkatan:</label>
                        <input required type="number" class="form-control" id="angkatan" placeholder="ex: 2024"
                            required name="angkatan">
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="gelombang-reset-btn" class="btn btn-secondary" data-bs-dismiss="modal"
                        type="reset">Close</button>
                    <button class="btn btn-primary" type="submit"
                        onclick="return confirm('Yakin, ingin membuka gelombang?')">Buka</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="new-pengumuman" tabindex="-1" aria-labelledby="new-pengumumanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="new-pengumumanLabel">Buat Pengumuman</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    for="gelombang-reset-btn"></button>
            </div>
            <form action="{{ route('admin.buat-pengumuman') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul:</label>
                        <input required type="text" class="form-control" id="judul"
                            placeholder="Judul/title pengumuman" name="judul" required>
                    </div>
                    <div class="mb-3">
                        <label for="isi" class="form-label">Isi:</label>
                        <input required type="text" class="form-control" id="isi"
                            placeholder="Ringkasan Pengumuman/Subjudul" required name="isi">
                    </div>
                    <div class="mb-3">
                        <label for="link" class="form-label">Link:</label>
                        <input type="link" class="form-control" id="link" placeholder="" name="link">
                        <div class="form-text text-danger " id="basic-addon4">Link bisa berisi tautan dokumen untuk
                            pengumuman lebih lanjut.</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="gelombang-reset-btn" class="btn btn-secondary" data-bs-dismiss="modal"
                        type="reset">Close</button>
                    <button class="btn btn-primary" type="submit"
                        onclick="return confirm('Simpan pengumuman?')">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="update-pengumuman" tabindex="-1" aria-labelledby="update-pengumumanLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="update-pengumumanLabel">Ubah Pengumuman</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                    for="gelombang-reset-btn"></button>
            </div>
            <form action="{{ route('admin.ubah-pengumuman') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="text" name="id" hidden>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul:</label>
                        <input required type="text" class="form-control" id="judul"
                            placeholder="Judul/title pengumuman" name="judul" required>
                    </div>
                    <div class="mb-3">
                        <label for="isi" class="form-label">Isi:</label>
                        <input required type="text" class="form-control" id="isi"
                            placeholder="Ringkasan Pengumuman/Subjudul" required name="isi">
                    </div>
                    <div class="mb-3">
                        <label for="link" class="form-label">Link:</label>
                        <input type="link" class="form-control" id="link" placeholder="" name="link">
                        <div class="form-text text-danger " id="basic-addon4">Isikan dengan link dokumen yang bisa di
                            download.</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="gelombang-reset-btn" class="btn btn-secondary" data-bs-dismiss="modal"
                        type="reset">Close</button>
                    <button class="btn btn-primary" type="submit"
                        onclick="return confirm('Simpan pengumuman?')">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('pages.admin.dashboard.santri-data-modal')
