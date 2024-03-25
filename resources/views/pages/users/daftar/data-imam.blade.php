<div data-section="data-imam" class="row gx-0" id="form-data-imam">
    <div class="form-group mb-3 col-8 ">
        <label for="nama_imam_kelompok" class="required">Nama imam kelompok:</label>
        <input type="text"
            class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none "
            id="nama_imam_kelompok" name="nama_imam_kelompok" required maxlength="100">
        <small id="nama_imam_kelompok-help" class="text-muted px-0 col-12 ">Masukkan nama sesuai dengan ktp</small>
    </div>
    <div class="form-group mb-3 col-7 ">
        <label for="no_hp_imam" class="required">No HP imam:</label>
        <div class="input-group">
            <span class="input-group-text border-0 rounded-0 bg-transparent border-bottom border-2 ">+62</span>
            <input type="number"
                class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none z-1"
                id="no_hp_imam" name="no_hp_imam" required aria-describedby="no.hp-help" placeholder="8########"
                data-input="phone-number" minlength="10" maxlength="12">
        </div>
        <small id="no.hp_wali-help" class="text-muted">Langsung tulis tanpa 62/+62 ataupun 0
            didepan</small>
    </div>
    <div class="form-group mb-3 col-8 ">
        <label for="asal_kelompok_imam" class="required">Asal kelompok imam kelompok:</label>
        <input type="text"
            class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none "
            id="asal_kelompok_imam" name="asal_kelompok_imam" required>
        <small id="asal_kelompok_imam-help" class="text-muted px-0 col-12 ">Masukkan nama sesuai dengan KTP</small>
    </div>
    <div class="form-group mb-3 ">
        <label for="alamat_imam" class="required">Alamat imam:</label>
        <input type="text"
            class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none "
            id="alamat_imam" name="alamat_imam" rows="3" required placeholder="Masukkan alamat sesuai KTP">
    </div>
</div>
