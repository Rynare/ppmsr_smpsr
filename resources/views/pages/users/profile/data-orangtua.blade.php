<div>
    <h6>Data Orang tua</h6>
    <hr class="mt-0 mb-4">
    <div class="row pt-1">
        <div class="col-12  mb-3">
            <h6>Alamat Orang tua</h6>
            <p class="text-muted">{{ $santri->alamat_orang_tua }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>Nama ayah</h6>
            <p class="text-muted">{{ $santri->nama_ayah }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>Tempat,Tanggal lahir ayah</h6>
            <p class="text-muted">{{ $santri->tempat_lahir_ayah }},&nbsp;{{ $santri->tanggal_lahir_ayah }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>No.HP ayah</h6>
            <p class="text-muted">+{{ $santri->no_hp_ayah }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>Pekerjaan ayah</h6>
            <p class="text-muted">{{ $santri->pekerjaan_ayah }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>Nama ibu</h6>
            <p class="text-muted">{{ $santri->nama_ibu }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>Tempat,Tanggal lahir ibu</h6>
            <p class="text-muted">{{ $santri->tempat_lahir_ibu }},&nbsp;{{ $santri->tanggal_lahir_ibu }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>No.HP ibu</h6>
            <p class="text-muted">+{{ $santri->no_hp_ibu }}</p>
        </div>
        <div class="col-12  mb-3">
            <h6>Pekerjaan ibu</h6>
            <p class="text-muted">{{ $santri->pekerjaan_ibu }}</p>
        </div>
    </div>
</div>
