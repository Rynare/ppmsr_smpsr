<div data-section="data-khusus" class="row gx-0" id="form-data-khusus">
    <div class="form-group mb-3 col-8 ">
        <label for="asal_kelompok_sambung" class="required">Asal Kelompok Sambung:</label>
        <input type="text"
            class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none "
            id="asal_kelompok_sambung" name="asal_kelompok_sambung" required maxlength="100">
    </div>
    <div class="form-group mb-3 col-8 ">
        <label for="asal_desa_sambung" class="required">Asal Desa Sambung:</label>
        <input type="text"
            class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none "
            id="asal_desa_sambung" name="asal_desa_sambung" required maxlength="50">
    </div>
    <div class="form-group mb-3 col-8 ">
        <label for="asal_daerah_sambung" class="required">Asal Daerah Sambung:</label>
        <input type="text"
            class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none "
            id="asal_daerah_sambung" name="asal_daerah_sambung" required maxlength="50">
    </div>
    <div class="form-group mb-3 col-4 me-3 ">
        <label for="jumlah_hafalan" class="required">Jumlah Hafalan:</label>
        <div class="input-group">
            <input type="number"
                class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none z-1"
                id="jumlah_hafalan" name="jumlah_hafalan" required min="0" value="0" max="30">
            <span class="input-group-text border-0 rounded-0 bg-transparent border-bottom border-2 ">Juz</span>
        </div>
    </div>
    <div class="form-group mb-3">
        <label class="required d-block mb-2 ">Status Mubaligh:</label>
        <div class="input-group d-flex column-gap-4 align-items-center">
            <select class="mt-2 form-select z-1" id="status_mubaligh" name="status_mubaligh" required>
                <option value="" hidden disabled selected>Pilih</option>
                <option value="belum">Belum</option>
                <option value="sudah">Sudah</option>
            </select>
        </div>
    </div>
    <div class="form-group mb-3 col-8 ">
        <label for="keahlian" class="required">Keahlian:</label>
        <input type="text"
            class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none "
            id="keahlian" name="keahlian" maxlength="255">
    </div>
    <div class="form-group mb-3 col-8 ">
        <label for="prestasi" class="required">Prestasi:</label>
        <input type="text"
            class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none "
            id="prestasi" name="prestasi">
    </div>
    <div class="form-group mb-3 col-8 ">
        <label for="bahasa_asing" class="required">Bahasa asing yang dikuasai:</label>
        <input type="text"
            class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none "
            id="bahasa_asing" name="bahasa_asing">
        <small id="bahasa_asing-help" class="text-muted px-0 col-12 "> Jika tidak ada maka isi dengan "Tidak
            Ada"</small>
    </div>
    <div class="form-group mb-3 col-8 ">
        <label for="facebook" class="required">Facebook:</label>
        <input type="text"
            class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none "
            id="facebook" name="facebook">
    </div>
    <div class="form-group mb-3 col-8 ">
        <label for="instagram" class="required">Instagram:</label>
        <input type="text"
            class="form-control ps-1 bg-transparent border-0 border-bottom border-2 rounded-0 focus-ring-none "
            id="instagram" name="instagram">
    </div>
</div>
