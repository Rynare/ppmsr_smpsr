<div>
    <h6><i class="bi bi-person-fill"></i>
        Data Imam Kelompok</h6>
    <hr class="mt-0 mb-4">
    <div class="row pt-1">
        <div class="col-12  mb-3">
            <h6>Nama Imam</h6>
            <p class="text-muted">{{ $santri->nama_imam_kelompok }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>Asal Kelompok Imam</h6>
            <p class="text-muted">{{ $santri->asal_kelompok_imam }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>No.HP Imam</h6>
            <p class="text-muted">+{{ $santri->no_hp_imam }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>Alamat Imam</h6>
            <p class="text-muted">{{ $santri->alamat_imam }}</p>
        </div>
    </div>
</div>
