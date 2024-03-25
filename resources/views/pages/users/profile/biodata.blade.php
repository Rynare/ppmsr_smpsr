<div class="col-12">
    <h4><i class="bi bi-person-circle"></i>
        Informasi Santri</h4>
    <hr class="mt-0 mb-4">
    <div class="row pt-1">
        <div class="col-12  mb-3">
            <h6>Saudara</h6>
            <p class="text-muted">Anak ke-{{ $santri->anak_ke }}&nbsp;dari&nbsp;{{ $santri->jumlah_saudara }}&nbspSaudara
            </p>
        </div>
        <div class="col-12  mb-3">
            <h6>Tempat, Tanggal Lahir</h6>
            <p class="text-muted">{{ $santri->tempat_lahir_santri }},&nbsp;{{ $santri->tanggal_lahir_santri }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>Alamat</h6>
            <p class="text-muted">{{ $santri->alamat_santri }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>Email</h6>
            <p class="text-muted">{{ $santri->email_santri }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>No.HP</h6>
            <p class="text-muted">+{{ $santri->no_hp_santri }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>Asal Kota</h6>
            <p class="text-muted">{{ $santri->kabupaten }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>Peerguruan Tinggi</h6>
            <p class="text-muted">{{ $santri->universitas }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>Fakultas/Jurusan</h6>
            <p class="text-muted">{{ $santri->fakultas }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>Golongan Darah</h6>
            <p class="text-muted text-uppercase ">{{ $santri->golongan_darah }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>Riwayat Penyakit</h6>
            <p class="text-muted text-uppercase ">{{ $santri->riwayat_penyakit }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>Status Mubaligh</h6>
            <p class="text-muted">{{ $santri->status_mubaligh }} Mubaligh</p>
        </div>
        <div class="col-12  mb-3">
            <h6>Hafalan</h6>
            <p class="text-muted">{{ $santri->jumlah_hafalan }} Juz</p>
        </div>
    </div>
</div>
