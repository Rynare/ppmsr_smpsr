<div>
    <h6>Data Wali Santri</h6>
    <hr class="mt-0 mb-4">
    <div class="row pt-1">
        <div class="col-12  mb-3">
            <h6>Nama wali</h6>
            <p class="text-muted">{{ $santri->nama_wali }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>Tempat,Tanggal lahir wali</h6>
            <p class="text-muted">{{ $santri->tempat_lahir_wali }},&nbsp;{{ $santri->tanggal_lahir_wali }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>No.HP wali</h6>
            <p class="text-muted">+{{ $santri->no_hp_wali }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>Pekerjaan wali</h6>
            <p class="text-muted">{{ $santri->pekerjaan_wali }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>Alamat Wali</h6>
            <p class="text-muted">{{ $santri->alamat_wali }}</p>
        </div>
    </div>
</div>
