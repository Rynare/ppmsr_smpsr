<div>
    <h6><i class="bi bi-people"></i>
        Data Orang tua</h6>
    <hr class="mt-0 mb-4">
    <div class="row pt-1">
        <div class="col-12  mb-3">
            <h6>Alamat Orang Tua</h6>
            <p class="text-muted">{{ $santri->alamat_orang_tua }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>Nama Ayah</h6>
            <p class="text-muted">{{ $santri->nama_ayah }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>Tempat, Tanggal Lahir Ayah</h6>
            <p class="text-muted">{{ $santri->tempat_lahir_ayah }},&nbsp;{{ $santri->tanggal_lahir_ayah }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>No.HP Ayah</h6>
            <p class="text-muted">+{{ $santri->no_hp_ayah }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>Pekerjaan Ayah</h6>
            <p class="text-muted">{{ $santri->pekerjaan_ayah }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>Nama Ibu</h6>
            <p class="text-muted">{{ $santri->nama_ibu }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>Tempat, Tanggal Lahir Ibu</h6>
            <p class="text-muted">{{ $santri->tempat_lahir_ibu }},&nbsp;{{ $santri->tanggal_lahir_ibu }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>No.HP Ibu</h6>
            <p class="text-muted">+{{ $santri->no_hp_ibu }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>Pekerjaan Ibu</h6>
            <p class="text-muted">{{ $santri->pekerjaan_ibu }}</p>
        </div>
    </div>
</div>
