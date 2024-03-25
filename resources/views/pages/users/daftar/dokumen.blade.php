<div data-section="dokumen" class="row gx-0" id="form-dokumen">
    <div class="form-group mb-3 ">
        <label for="kartu_keluarga" class="required">Kartu Keluarga:</label>
        <div class="input-group">
            <input type="file" class="form-control z-1" id="kartu_keluarga" name="kartu_keluarga" required
                aria-describedby="kartu_keluarga-help" data-allowed-extension="jpg,jpeg,png" data-max-file-size="2">
            <i class="input-group-text bi bi-paperclip" for="kartu_keluarga"></i>
        </div>
        <small id="kartu_keluarga-help" class="text-muted"><strong>Format:</strong> .jpg .jpeg
            .png</small>
        <small id="kartu_keluarga-help" class="text-muted"><strong>MAX:</strong> 2MB</small>
    </div>

    <!-- KTP -->
    <div class="form-group mb-3 ">
        <label for="ktp" class="required">KTP:</label>
        <div class="input-group">
            <input type="file" class="form-control z-1" id="ktp" name="ktp" required
                aria-describedby="ktp-help" data-allowed-extension="jpg,jpeg,png" data-max-file-size="2">
            <i class="input-group-text bi bi-paperclip" for="ktp"></i>
        </div>
        <small id="ktp-help" class="text-muted"><strong>Format:</strong> .jpg .jpeg
            .png</small>
        <small id="ktp-help" class="text-muted"><strong>Max:</strong> 2MB</small>
    </div>

    <!-- Pas Foto -->
    <div class="form-group mb-3 ">
        <label for="pas_foto" class="required">Pas Foto:</label>
        <div class="input-group">
            <input type="file" class="form-control z-1" id="pas_foto" name="pas_foto" required
                aria-describedby="pas_foto-help" data-max-file-size="2">
            <i class="input-group-text bi bi-paperclip" for="pas_foto" data-allowed-extension="jpg,jpeg,png"></i>
        </div>
        <small id="pas_foto-help" class="text-muted"><strong>Ketentuan:</strong>
            Foto wajib dengan rasio 3x4</small>
        <small id="pas_foto-help" class="text-muted"><strong>Format:</strong>
            .jpg .jpeg .png</small>

        <small id="pas_foto-help" class="text-muted"><strong>Max:</strong> 2MB</small>
    </div>

    <!-- Surat Sambung -->
    <div class="form-group mb-3 ">
        <label for="surat_sambung" class="required">Surat Sambung:</label>
        <div class="input-group">
            <input type="file" class="form-control z-1" id="surat_sambung" name="surat_sambung" required
                aria-describedby="surat_sambung-help" data-allowed-extension="pdf" data-max-file-size="5">
            <i class="input-group-text bi bi-paperclip" for="surat_sambung"></i>
        </div>
        <small id="surat_sambung-help" class="text-muted"><strong>Format:</strong>
            .pdf</small>
        <small id="pas_foto-help" class="text-muted"><strong>Max:</strong> 5MB</small>
    </div>
</div>
