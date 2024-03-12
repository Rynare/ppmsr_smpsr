<div data-section="data-orangtua" class="row gx-0" id="form-data-orangtua">
    <div class="form-group mb-3 col-8 ">
        <label for="nama_ayah" class="required">Nama Ayah:</label>
        <input type="text"
            class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none "
            id="nama_ayah" name="nama_ayah" required regex="^[a-zA-Z.`\s]+$" maxlength="100">
        <small id="nama_ayah-help" class="text-muted px-0 col-12 ">Masukkan nama sesuai dengan ktp</small>
    </div>
    <div class="form-group mb-3 col-auto row gx-0 row-cols-1">
        <label for="tempat_lahir_ayah" class="required px-0 col-12 ">Tempat/Tanggal Lahir ayah:</label>
        <div class="d-flex col-7 gx-0">
            <input type="text"
                class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none "
                id="tempat_lahir_ayah" name="tempat_lahir_ayah" required maxlength="50">
            <input type="date"
                class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none w-75"
                id="tanggal_lahir_ayah" name="tanggal_lahir_ayah" required>
        </div>
        <small id="nama-help" class="text-muted px-0 col-12 ">Masukkan tempat dan tanggal sesuai dengan ktp</small>
    </div>
    <div class="form-group col-md-6 mb-3 me-3">
        <label for="status_ayah" class="required">Status Ayah:</label>
        <select class="mt-2 form-select" id="status_ayah" name="status_ayah" required>
            <option value="" hidden disabled selected>Pilih</option>
            <option value="masih hidup">Masih Hidup</option>
            <option value="sudah meninggal">Sudah Meninggal</option>
        </select>
    </div>
    <div class="form-group col-md-6 mb-3 me-3">
        <label for="pendidikan_ayah" class="required">Pendidikan Terakhir Ayah:</label>
        <select class="mt-2 form-select" id="pendidikan_ayah" name="pendidikan_ayah" required>
            <option value="" hidden disabled selected>Pilih</option>
            <option value="sd">SD</option>
            <option value="sltp">SLTP</option>
            <option value="slta/sederajat">SLTA/Sederajat</option>
            <option value="d1">D1</option>
            <option value="d2">D2</option>
            <option value="d3">D3</option>
            <option value="sarjana/d4">Sarjana/D4</option>
            <option value="s2">S2</option>
            <option value="s3">S3</option>
        </select>
    </div>
    <div class="form-group mb-3 col-6 me-1">
        <label for="pekerjaan_ayah" class="required">Pekerjaan Ayah:</label>
        <input type="text"
            class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none "
            id="pekerjaan_ayah" name="pekerjaan_ayah" required>
        <small id="pekerjaan_ayah-help" class="text-muted px-0 col-12 ">Masukkan pekerjaan sekarang</small>
    </div>
    <div class="form-group col-md-6 col-4 mb-3">
        <label for="penghasilan_ayah" class="required mb-2 ">Penghasilan Ayah per Bulan:</label>
        <div class="input-group">
            <span class="input-group-text">Rp.</span>
            <input type="text" class="form-control ps-1 focus-ring-none z-1" data-input='currency'
                id="penghasilan_ayah" data-input-real-target="[name=penghasilan_ayah]">
            <input type="number" class="form-control" name="penghasilan_ayah" data-input-fake-ref="#penghasilan_ayah"
                required hidden max="99999999999">
            <button class="btn btn-danger" id='reset-penghasilan-ayah' onclick="resetPenghasilan(this)" type="button"
                data-reset-target="#penghasilan_ayah">Reset</button>
        </div>
    </div>
    <div class="form-group mb-3 col-7 ">
        <label for="no_hp_ayah" class="required">No HP Ayah:</label>
        <div class="input-group">
            <span class="input-group-text border-0 rounded-0 bg-transparent border-bottom border-2 ">+62</span>
            <input type="number"
                class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none z-1"
                id="no_hp_ayah" name="no_hp_ayah" data-input="phone-number" required aria-describedby="no.hp-help"
                placeholder="8########" minlength="10" maxlength="12">
        </div>
        <small id="no.hp_ibu-help" class="text-muted">Langsung tulis tanpa 62/+62 ataupun 0
            didepan</small>
    </div>
    <div class="form-group mb-3 col-8 ">
        <label for="nama_ibu" class="required">Nama Ibu:</label>
        <input type="text"
            class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none "
            id="nama_ibu" name="nama_ibu" required regex="^[a-zA-Z.`\s]+$" maxlength="100">
        <small id="nama_ibu-help" class="text-muted px-0 col-12 ">Masukkan nama sesuai dengan ktp</small>
    </div>
    <div class="form-group col-md-6  mb-3">
        <label for="status_ibu" class="required">Status Ibu:</label>
        <select class="mt-2 form-select" id="status_ibu" name="status_ibu" required>
            <option value="" hidden disabled selected>Pilih</option>
            <option value="masih hidup">Masih Hidup</option>
            <option value="sudah meninggal">Sudah Meninggal</option>
        </select>
    </div>
    <div class="form-group mb-3 col-auto row gx-0 row-cols-1">
        <label for="tempat_lahir_ibu" class="required px-0 col-12 ">Tempat/Tanggal Lahir ibu:</label>
        <div class="d-flex col-7 gx-0">
            <input type="text"
                class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none "
                id="tempat_lahir_ibu" name="tempat_lahir_ibu" required maxlength="100">
            <input type="date"
                class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none w-75"
                id="tanggal_lahir_ibu" name="tanggal_lahir_ibu" required>
        </div>
        <small id="nama-help" class="text-muted px-0 col-12 ">Masukkan tempat dan tanggal sesuai dengan ktp</small>
    </div>
    <div class="form-group mb-3 col-7 me-lg-5 ">
        <label for="no_hp_ibu" class="required">No HP Ibu:</label>
        <div class="input-group">
            <span class="input-group-text border-0 rounded-0 bg-transparent border-bottom border-2 ">+62</span>
            <input type="number"
                class="form-control ps-1 bg-transparent z-1  border-0 border-bottom border-2 rounded-0 focus-ring-none "
                id="no_hp_ibu" name="no_hp_ibu" required aria-describedby="no.hp-help" placeholder="8########"
                data-input="phone-number">
        </div>
        <small id="no.hp_ibu-help" class="text-muted">Langsung tulis tanpa 62/+62 ataupun 0
            didepan</small>
    </div>
    <div class="form-group col-md-6 mb-3 me-3">
        <label for="pendidikan_ibu" class="required">Pendidikan Terakhir Ibu:</label>
        <select class="mt-2 form-select" id="pendidikan_ibu" name="pendidikan_ibu" required>
            <option value="" hidden disabled selected>Pilih</option>
            <option value="sd">SD</option>
            <option value="sltp">SLTP</option>
            <option value="slta/sederajat">SLTA/Sederajat</option>
            <option value="d1">D1</option>
            <option value="d2">D2</option>
            <option value="d3">D3</option>
            <option value="sarjana/d4">Sarjana/D4</option>
            <option value="s2">S2</option>
            <option value="s3">S3</option>
        </select>
    </div>
    <div class="form-group mb-3 col-6 me-lg-4 ">
        <label for="pekerjaan_ibu" class="required">Pekerjaan Ibu:</label>
        <input type="text"
            class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none "
            id="pekerjaan_ibu" name="pekerjaan_ibu" required>
        <small id="pekerjaan_ibu-help" class="text-muted px-0 col-12 ">Masukkan pekerjaan sekarang</small>
    </div>
    <div class="form-group col-md-6 col-4 mb-3">
        <label for="penghasilan_ibu" class="required mb-2 ">Penghasilan Ibu per Bulan:</label>
        <div class="input-group">
            <span class="input-group-text">Rp.</span>
            <input type="text" class="form-control ps-1 z-1  focus-ring-none" data-input='currency'
                id="penghasilan_ibu" data-input-real-target="[name=penghasilan_ibu]">
            <input type="number" class="form-control" name="penghasilan_ibu" data-input-fake-ref="#penghasilan_ibu"
                required hidden max="99999999999">
            <button class="btn btn-danger" onclick="resetPenghasilan(this)" type="button"
                data-reset-target="#penghasilan_ibu" id='reset-penghasilan-ibu'>Reset</button>
        </div>
    </div>
    <div class="form-group mb-3 ">
        <label for="alamat_orang_tua" class="required">Alamat orang tua:</label>
        <input type="text"
            class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none "
            id="alamat_orang_tua" name="alamat_orang_tua" rows="3" required
            placeholder="Masukkan alamat sesuai KTP">
    </div>
</div>
