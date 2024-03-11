<div data-section="datadiri" class="row gx-0" id="form-datadiri">
    <div class="form-group mb-3 col-7 me-4">
        <label for="nama_santri" class="required">Nama:</label>
        <input type="text"
            class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none "
            id="nama_santri" name="nama_santri" required>
        <small id="nama_santri-help" class="text-muted">Masukkan nama sesuai dengan ktp</small>
    </div>
    <div class="form-group mb-3 col-4">
        <label class="required d-block mb-2 ">Jenis Kelamin:</label>
        <div class="input-group d-flex column-gap-3 align-items-center">
            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="" hidden disabled selected>Pilih</option>
                <option value="laki-laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
            </select>
        </div>
    </div>
    <div class="form-group mb-3 col-auto row gx-0 row-cols-1">
        <label for="tempat_lahir_santri" class="required px-0 col-12 ">Tempat/Tanggal Lahir Santri:</label>
        <div class="d-flex col-7 gx-0">
            <input type="text"
                class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none "
                id="tempat_lahir_santri" name="tempat_lahir_santri" required>
            <input type="date"
                class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none w-75"
                id="tanggal_lahir_santri" name="tanggal_lahir_santri" required>
        </div>
        <small id="nama-help" class="text-muted px-0 col-12 ">Masukkan tempat dan tanggal sesuai dengan ktp</small>
    </div>
    <div class="row gx-0 row-cols-2 mb-3 ">
        <!-- Jumlah Saudara -->
        <div class="form-group me-2 col-4 ">
            <label for="jumlah_saudara" class="required mb-2 ">Jumlah Saudara:</label>
            <input type="number" class="form-control ps-1" id="jumlah_saudara" name="jumlah_saudara" required
                aria-describedby="jumlah_saudara-help" max="20" onkeydown="jumlahSaudaraToggle(this)"
                onkeyup="jumlahSaudaraToggle(this)" onchange="jumlahSaudaraToggle(this)" ry-target="#anak_ke">
            <small id="jumlah_saudara-help" class="text-muted">Dihitung beserta kamu
                juga</small>
        </div>

        <!-- Anak Ke- -->
        <div class="form-group col-3">
            <label for="anak_ke" class="required mb-2 ">Anak Ke-:</label>
            <input type="number" class="form-control ps-1" id="anak_ke" name="anak_ke" required max="20"
                onkeyup="anak_keToggle(this)" onkeydown="anak_keToggle(this)" onchange="anak_keToggle(this)"
                ry-from="#jumlah_saudara">
        </div>
    </div>
    <div class="form-group mb-3 col-8 me-3">
        <label for="universitas" class="required">Universitas/Politeknik:</label>
        <input type="text"
            class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none "
            id="universitas" name="universitas" required>
    </div>
    <div class="form-group mb-3 col-3">
        <label for="pendidikan" class="required mb-2 ">Pendidikan:</label>
        <select class="form-select form-select-sm" name="pendidikan" aria-label="Small select example" required>
            <option selected disabled hidden>Pilih</option>
            <option value="d3">D3</option>
            <option value="d4">D4</option>
            <option value="s1">S1</option>
        </select>
    </div>
    <div class="form-group mb-3 col-8 me-3 ">
        <label for="fakultas" class="required">Fakultas/Jurusan:</label>
        <input type="text"
            class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none "
            id="fakultas" name="fakultas" required>
    </div>
    <div class="form-group mb-3 col-3">
        <label for="gelar_saat_lulus" class="required">Gelar ketika lulus:</label>
        <input type="text"
            class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none "
            id="gelar_saat_lulus" name="gelar_saat_lulus" required>
        <small id="gelar_saat_lulus-help" class="text-muted">Contoh: S.pd,S.kom</small>
    </div>
    <div class="form-group mb-3 col-4 me-3">
        <label for="tahun_masuk_ppm" class="required">Tahun masuk PPM:</label>
        <input type="number"
            class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none "
            id="tahun_masuk_ppm" name="tahun_masuk_ppm" required>
    </div>
    <div class="form-group mb-3 col-7">
        <label for="kabupaten" class="required">Kabupaten/Kota:</label>
        <input type="text"
            class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none "
            id="kabupaten" name="kabupaten" required>
    </div>
    <div class="form-group mb-3 col-5">
        <label for="status_rumah" class="required">Status Kepemilikan Rumah:</label>
        <div class="input-group mt-2 ">
            <i class="input-group-text bi bi-house-door-fill"></i>
            <select class="form-select" id="status_rumah" name="status_rumah" required>
                <option value="" hidden disabled selected>Pilih</option>
                <option value="milik sendiri">Milik Sendiri</option>
                <option value="milik orangtua">Milik Orangtua</option>
                <option value="sewa/kontrak">Sewa/Kontrak</option>
                <option value="lainnya">Lainnya</option>
            </select>
        </div>
    </div>
    <div class="form-group mb-3">
        <label class="required d-block mb-3 ">Golongan Darah:</label>
        <div class="input-group d-flex column-gap-4 align-items-center">
            <div class="d-flex gap-1 align-items-center justify-content-center ">
                <input type="radio" required name="golongan_darah" class="form-switch " id="a"
                    value="a">
                <label for="a">A</label>
            </div>
            <div class="d-flex gap-1 align-items-center justify-content-center ">
                <input type="radio" required name="golongan_darah" class="form-switch " id="b"
                    value="b">
                <label for="b">B</label>
            </div>
            <div class="d-flex gap-1 align-items-center justify-content-center ">
                <input type="radio" required name="golongan_darah" class="form-switch " id="ab"
                    value='ab'>
                <label for="ab">AB</label>
            </div>
            <div class="d-flex gap-1 align-items-center justify-content-center ">
                <input type="radio" required name="golongan_darah" class="form-switch " id="o"
                    value='o'>
                <label for="o">O</label>
            </div>
        </div>
    </div>
    <div class="form-group mb-3 col-7">
        <label for="riwayat_penyakit" class="required">Riwayat Penyakit:</label>
        <input type="text"
            class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none "
            id="riwayat_penyakit" name="riwayat_penyakit" required>
    </div>
    <div class="form-group mb-3 col-7 me-2">
        <label for="no_hp_santri" class="required">No HP Santri:</label>
        <div class="input-group">
            <span class="input-group-text border-0 rounded-0 bg-transparent border-bottom border-2 ">+62</span>
            <input type="number"
                class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none "
                id="no_hp_santri" name="no_hp_santri" required aria-describedby="no.hp-help" placeholder="8########"
                data-input="phone-number">
        </div>
        <small id="no.hp_ibu-help" class="text-muted">Langsung tulis tanpa 62/+62 ataupun 0
            didepan</small>
    </div>
    <div class="form-group mb-3 col-7 ">
        <label for="email_santri" class="required">Email Santri:</label>
        <div class="input-group mb-3">
            <i
                class="input-group-text border-0 rounded-0 bg-transparent border-bottom border-2 bi bi-envelope-fill"></i>
            <input type="email"
                class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none "
                id="email_santri" name="email_santri" required>
        </div>
    </div>
    <div class="form-group mb-3 col-8 me-3 ">
        <label for="alamat_santri" class="required">Alamat:</label>
        <input type="text"
            class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none "
            id="alamat_santri" name="alamat_santri" rows="3" required
            placeholder="Masukkan alamat sesuai KTP">
    </div>
    <div class="form-group mb-3 col-3">
        <label for="kode_pos" class="required">Kode POS:</label>
        <input type="number"
            class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none "
            id="kode_pos" name="kode_pos" rows="3" required placeholder="Kode POS" minlength="5"
            maxlength="5">
    </div>
</div>
