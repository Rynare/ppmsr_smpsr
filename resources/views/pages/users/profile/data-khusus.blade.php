<div>
    <h6><i class="bi bi-pass-fill"></i> Data Pelengkap</h6>
    <hr class="mt-0 mb-4">
    <div class="row pt-1">
        <div class="col-12  mb-3">
            <h6>Asal Desa Sambung</h6>
            <p class="text-muted">{{ $santri->asal_desa_sambung }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>Asal Daerah Sambung</h6>
            <p class="text-muted">{{ $santri->asal_daerah_sambung }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>Asal Kelompok Sambung</h6>
            <p class="text-muted">{{ $santri->asal_kelompok_sambung }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6><i class="bi bi-file-post"></i> Surat Sambung</h6>
            <a class="btn btn-warning" href="{{ asset('storage/santri/' . $santri->surat_sambung) }}"
                target="_blank">{{ $santri->surat_sambung }}</a>
        </div>
        <div class="col-12  mb-3">
            <h6><i class="bi bi-person-vcard"></i> Kartu Tanda Penduduk</h6>
            <a class="btn btn-success" href="{{ asset('storage/santri/' . $santri->ktp) }}"
                target="_blank">{{ $santri->ktp }}</a>
        </div>

        <div class="col-12  mb-3">
            <h6><i class="bi bi-file-earmark-text"></i> Kartu Keluarga</h6>
            <a class="btn btn-info" href="{{ asset('storage/santri/' . $santri->kartu_keluarga) }}"
                target="_blank">{{ $santri->kartu_keluarga }}</a>
        </div>
    </div>
</div>
