<div data-section="data-wali" class="row gx-0" id="form-data-wali">
    <p class="text-center  py-2" style="border-radius: 5px; color:white; background-color: #3c3c3b">Data Wali (Opsional)
    </p>
    <div class="form-group mb-3 col-8 ">
        <label for="nama_wali" class="required">Nama wali:</label>
        <input type="text"
            class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none "
            id="nama_wali" name="nama_wali" regex="^[a-zA-Z.`\s]+$" maxlength="100">
        <small id="nama_wali-help" class="text-muted px-0 col-12 ">Masukkan nama sesuai dengan ktp</small>
    </div>
    <div class="form-group mb-3 col-auto row gx-0 row-cols-1">
        <label for="tempat_lahir_wali" class="required px-0 col-12 ">Tempat/Tanggal Lahir wali:</label>
        <div class="d-flex col-7 gx-0">
            <input type="text"
                class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none "
                id="tempat_lahir_wali" name="tempat_lahir_wali" maxlength="100">
            <input type="date"
                class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none w-75"
                id="tanggal_lahir_wali" name="tanggal_lahir_wali">
        </div>
        <small id="nama-help" class="text-muted px-0 col-12 ">Masukkan tempat dan tanggal sesuai dengan ktp</small>
    </div>
    <div class="form-group mb-3 col-8 ">
        <label for="pekerjaan_wali" class="required">Pekerjaan wali:</label>
        <input type="text"
            class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none "
            id="pekerjaan_wali" name="pekerjaan_wali">
        <small id="pekerjaan_wali-help" class="text-muted px-0 col-12 ">Masukkan pekerjaan sekarang</small>
    </div>
    <div class="form-group mb-3 ">
        <label for="alamat_wali" class="required">Alamat wali:</label>
        <input type="text"
            class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none "
            id="alamat_wali" name="alamat_wali" rows="3" placeholder="Masukkan alamat sesuai KTP">
    </div>
    <div class="form-group mb-3 col-7 ">
        <label for="no_hp_wali" class="required">No HP wali:</label>
        <div class="input-group">
            <span class="input-group-text border-0 rounded-0 bg-transparent border-bottom border-2 ">+62</span>
            <input type="number"
                class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none z-1"
                id="no_hp_wali" name="no_hp_wali" aria-describedby="no.hp-help" placeholder="8########"
                data-input="phone-number">
        </div>
        <small id="no.hp_wali-help" class="text-muted">Langsung tulis tanpa 62/+62 ataupun 0
            didepan</small>
    </div>
</div>
