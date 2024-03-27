<style>
    .accordion-button::after {
        flex-shrink: 0;
        width: var(--bs-accordion-btn-icon-width);
        height: var(--bs-accordion-btn-icon-width);
        margin-left: auto;
        content: "";
        background-image: var(--bs-accordion-btn-icon);
        background-repeat: no-repeat;
        background-size: var(--bs-accordion-btn-icon-width);
        transition: var(--bs-accordion-btn-icon-transition);
    }

    .accordion {
        --bs-accordion-color: var(--bs-body-color);
        --bs-accordion-bg: var(--bs-body-bg);
        --bs-accordion-transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, border-radius 0.15s ease;
        --bs-accordion-border-color: var(--bs-border-color);
        --bs-accordion-border-width: var(--bs-border-width);
        --bs-accordion-border-radius: var(--bs-border-radius);
        --bs-accordion-inner-border-radius: calc(var(--bs-border-radius) -(var(--bs-border-width)));
        --bs-accordion-btn-padding-x: 1.25rem;
        --bs-accordion-btn-padding-y: 1rem;
        --bs-accordion-btn-color: var(--bs-body-color);
        --bs-accordion-btn-bg: var(--bs-accordion-bg);
        --bs-accordion-btn-icon: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='none' stroke='%23FFFFFF' stroke-linecap='round' stroke-linejoin='round'%3e%3cpath d='M2 5L8 11L14 5'/%3e%3c/svg%3e");
        --bs-accordion-btn-icon-width: 1.25rem;
        --bs-accordion-btn-icon-transform: rotate(-180deg);
        --bs-accordion-btn-icon-transition: transform 0.2s ease-in-out;
        --bs-accordion-btn-active-icon: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='none' stroke='%23FFFFFF' stroke-linecap='round' stroke-linejoin='round'%3e%3cpath d='M2 5L8 11L14 5'/%3e%3c/svg%3e");
        --bs-accordion-btn-focus-box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        --bs-accordion-body-padding-x: 1.25rem;
        --bs-accordion-body-padding-y: 1rem;
        --bs-accordion-active-color: var(--bs-primary-text-emphasis);
        --bs-accordion-active-bg: var(--bs-primary-bg-subtle);
    }
</style>
<div class="accordion my-3" id="accordionPanelsStayOpenExample">
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button class="accordion-button collapsed bg-dark accordian-icon-light" type="button"
                data-bs-toggle="collapse" style="font-weight: bold; border-radius: 5px; color: white"
                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                aria-controls="panelsStayOpen-collapseOne">
                Pengumuman<i class="bi bi-megaphone ms-1"></i>
            </button>
        </h2>
        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse">
            <div class="accordion-body">
                <div class="">
                    <div class="px-2 rounded-2 border-black  border-1 ">
                        <div class="d-flex align-items-center justify-content-between mb-3 ">
                            <span>Pengumuman</span>
                            <button type="button" class="btn btn-primary btn-sm me-3" data-bs-toggle="modal"
                                data-bs-target="#new-pengumuman" style="width: fit-content"> <i class="bi bi-plus"></i>
                                Buat Pengumuman
                            </button>
                        </div>
                        <div>
                            <table id="datatablesPengumuman">
                                <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Isi</th>
                                        <th>Link</th>
                                        <th>
                                            <div class="text-center w-100">Aksi</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Judul</th>
                                        <th>Isi</th>
                                        <th>Link</th>
                                        <th>
                                            <div class="text-center w-100">Aksi</div>
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
                                                <div
                                                    class="d-flex align-items-center justify-content-center  gap-2 w-100">
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
