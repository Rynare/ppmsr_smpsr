<div>
    <h6>Data Pelengkap</h6>
    <hr class="mt-0 mb-4">
    <div class="row pt-1">
        <div class="col-12  mb-3">
            <h6>Asal desa sambung</h6>
            <p class="text-muted">{{ $santri->asal_desa_sambung }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>Asal daerah sambung</h6>
            <p class="text-muted">{{ $santri->asal_daerah_sambung }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>Asal Kelompok sambung</h6>
            <p class="text-muted">{{ $santri->asal_kelompok_sambung }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>Surat sambung</h6>
            <a class="" href="{{ asset('storage/santri/' . $santri->surat_sambung) }}"
                target="_blank">{{ $santri->surat_sambung }}</a>
        </div>
    </div>
</div>
