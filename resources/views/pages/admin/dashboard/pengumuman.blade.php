<div class="accordion my-3" id="accordionPanelsStayOpenExample">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                aria-controls="panelsStayOpen-collapseOne">
                Pengumuman
            </button>
        </h2>
        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
            <div class="accordion-body">
                <div class="">
                    <div class="px-2 rounded-2 border-black  border-1 ">
                        <div class="d-flex align-items-center justify-content-between mb-3 ">
                            <span>Pengumuman</span>
                            <button type="button" class="btn btn-primary btn-sm me-3" data-bs-toggle="modal"
                                data-bs-target="#new-pengumuman" style="width: fit-content">
                                Buat Pengumuman
                            </button>
                        </div>
                        <div>
                            <table id="datatablesPengumuman">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Isi</th>
                                        <th>Link</th>
                                        <th>
                                            <div class="text-center w-100">Action</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Isi</th>
                                        <th>Link</th>
                                        <th>
                                            <div class="text-center w-100">Action</div>
                                        </th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    @foreach ($pengumumans as $pengumuman)
                                    <tr>
                                        <td>{{ $pengumuman->judul }}</td>
                                        <td>{{ $pengumuman->isi }}</td>
                                        <td>{{ $pengumuman->link }}</td>
                                        <td>
                                            <div class="d-flex align-items-center justify-content-center  gap-2 w-100">
                                                <button class="flex-grow-1 btn-sm btn-warning btn"
                                                    data-bs-toggle="modal" data-bs-target="#update-pengumuman"
                                                    data-json="{{ json_encode($pengumuman) }}"
                                                    onclick="setupModalFormInput(this)">Ubah</button>
                                                <a href="{{ route('admin.hapus-pengumuman', ['pengumuman' => $pengumuman->id]) }}"
                                                    class="btn flex-grow-1 btn-sm btn-danger">Hapus</a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    window.addEventListener('DOMContentLoaded', event => {
        // Simple-DataTables
        // https://github.com/fiduswriter/Simple-DataTables/wiki

        const datatablesSimple = document.getElementById('datatablesSimple');
        const datatablesPengumuman = document.getElementById('datatablesPengumuman');
        if (datatablesSimple) {
            new simpleDatatables.DataTable(datatablesSimple);
            new simpleDatatables.DataTable(datatablesPengumuman);
        }
    });

    function setupModalFormInput(element) {
        const modal = document.querySelector(element.getAttribute('data-bs-target'));
        const form = modal.querySelector('form')
        const data = JSON.parse(element.getAttribute('data-json'))
        const inputField = form.querySelectorAll('[name]:not([name=_token])')

        inputField.forEach(element => {
            element.value = data[element.name]
        });
    }
</script>
