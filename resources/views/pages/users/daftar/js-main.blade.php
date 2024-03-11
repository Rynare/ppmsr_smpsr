<!-- Run Script disini bro -->
<script>
    const form = document.querySelector('form')
    const submit_btn = form.querySelector('[type=submit]')

    document.addEventListener('DOMContentLoaded', () => {
        runFormKeyEvent()
        runFormEvent()
        runNavClickEvent()
        loadFormData()
        document.querySelector(`[data-section-target=${getActiveIdFromUrl()}]`).click()
        setInterval(() => {
            saveFormData()
        }, 5000);
    })
</script>

<!-- Nav click event -->
<script>
    function runNavClickEvent() {
        const nav = document.querySelector('header ul.nav')

        nav.addEventListener('click', (event) => {
            const allActiveNav = document.querySelectorAll('header ul.nav .active')
            const currentClickedNav = event.target
            if (currentClickedNav.classList.contains('nav-link')) {
                allActiveNav.forEach(element => {
                    element.classList.remove('active')
                    document.querySelector(
                        `[data-section=${element.getAttribute('data-section-target')}]`).classList
                        .add('d-none')
                });
                currentClickedNav.classList.add('active')
                document.querySelector(
                    `[data-section=${currentClickedNav.getAttribute('data-section-target')}]`).classList
                    .remove('d-none')
            }
            window.scrollTo(0, 0)
        })
    }

    function getActiveIdFromUrl() {
        let hash = window.location.hash;
        let activeId = hash.substring(1);
        return activeId;
    }
</script>

<!-- Auto save Form -->
<script>
    function saveFormData() {
        const formData = new FormData(form);
        const result = {};

        formData.forEach((value, key) => {
            result[key] = value;
        });

        localStorage.setItem('savedFormData', JSON.stringify(result));
    }

    function loadFormData() {
        const formData = JSON.parse(localStorage.getItem('savedFormData'))
        for (const key in formData) {
            const formInput = document.querySelector(`[name=${key}]`);
            const formInputTagName = formInput.tagName.toLowerCase();

            switch (formInputTagName) {
                case 'input':
                    if (formInput.getAttribute('type') == 'radio') {
                        const radioBtn = document.querySelector(`form #${formData[key]}`);
                        if (radioBtn) {
                            radioBtn.checked = 1
                        }
                    }
                    if (formInput.getAttribute('type') == 'file') {
                        break;
                    }
                case 'select':
                    formInput.value = formData[key];
                    break;
                default:
                    break;
            }
        }
    }

</script>

<!-- Form event -->
<script>
    function runFormKeyEvent() {
        ['keyup', 'keydown', 'keypress'].forEach(eventType => {
            form.addEventListener(eventType, (event) => {
                if (['input', 'textarea'].includes(event.target.tagName.toLowerCase())) {
                    const value = event.target.value
                    if ((value == '' || value.endsWith(' ')) && event.key == ' ') {
                        event.preventDefault()
                    }
                }
            })
        });
    }

    function runFormEvent() {
        ['change', 'input', 'formdata'].forEach(eventType => {
            form.addEventListener(eventType, (event) => {
                const element = event.target
                const elementTag = element.tagName.toLowerCase()
                const elementType = element.getAttribute('type')
                const elementDataInputType = element.getAttribute('data-input')
                const isRequired = element.hasAttribute('required')

                if (['input'].includes(elementTag)) {
                    if (elementDataInputType == 'phone-number') {
                        const phoneNumber = element.value
                        const { status, msg } = phoneNumberCheck(phoneNumber)
                        if (status) {
                            element.setCustomValidity('')
                            bsValidityToogle(element, 'is-valid')
                        } else {
                            element.setCustomValidity(msg)
                            bsValidityToogle(element, 'is-invalid')
                        }
                        return
                    }
                    if (elementDataInputType == 'currency') {
                        const realValueContainer = document.querySelector(element.getAttribute('data-input-real-target'))
                        var regex = /\d+/g; //regexp untuk hanya number
                        var angka = element.value.match(regex);
                        if (angka) {
                            // mengubah nilai menjadi hanya angka
                            realValueContainer.value = angka.join('');
                        }
                        const { status, msg, result } = currencyFormatterAndChecker(realValueContainer.value)
                        element.value = result;
                        if (status) {
                            element.setCustomValidity('')
                            bsValidityToogle(element, 'is-valid')
                        } else {
                            element.setCustomValidity(msg)
                            bsValidityToogle(element, 'is-invalid')
                        }
                        return
                    }
                    if (element.value == '' && isRequired) {
                        element.setCustomValidity('Harap diisi!')
                        bsValidityToogle(element, 'is-invalid')
                    } else {
                        element.setCustomValidity('')
                        bsValidityToogle(element, 'is-valid')
                    }
                    return
                }
            })
        });
    }
</script>

<!-- Input Validate -->
<script>
    function phoneNumberCheck(userInput) {
        // Menghilangkan spasi dan karakter non-digit
        var cleanInput = userInput.replace(/\D/g, '');

        if (!cleanInput.startsWith('8')) {
            return { status: false, msg: "Input harus diawali dengan angka 8!" }
        }

        if (cleanInput.length <= 10) {
            return { status: false, msg: 'Input minimal 10 karakter!' }
        }

        if (cleanInput.length >= 12) {
            return { status: false, msg: "Input maksimal 12 karakter!" }
        }
        return { status: true };
    }

    function currencyFormatterAndChecker(currencyNumber) {
        var formatter = new Intl.NumberFormat('id-ID').format(currencyNumber);
        currencyNumber = formatter
        if (currencyNumber == '') {
            return { status: false, msg: "Masukkan nominal yang valid!", result: '' }
        }
        if (currencyNumber.length < 7) {
            return { status: false, msg: "Masukkan minimal Rp.100.000", result: currencyNumber }
        }
        return { status: true, result: currencyNumber }
    }

    function validateDateInput(dateValue) {
        // Mendapatkan tanggal hari ini dalam format yang sama dengan input
        const today = new Date().toISOString().slice(0, 10);

        if (dateValue === '') {
            returnValue = { status: false, msg: "Tanggal tidak boleh kosong" }
        }

        if (dateValue > today) {
            returnValue = { status: false, msg: "Tolong masukkan tanggal yang valid" }
        }

        if (returnValue === false) {
            return returnValue;
        }

        return true;
    }
</script>

<!-- Input Control -->
<script>
    function resetPenghasilan(element) {
        const target1 = document.querySelector(element.getAttribute('data-reset-target'))
        const target2 = document.querySelector(target1.getAttribute('data-input-real-target'))
        target1.value = ''
        target2.value = ''
    }
</script>

<!-- Element toggle -->
<script>
    function bsValidityToogle(element, validity) {
        if (validity == 'valid' || validity == 'is-valid') {
            element.classList.remove('is-invalid')
            element.classList.add('is-valid')
        } else if (validity == 'invalid' || validity == 'is-invalid') {
            element.classList.remove('is-valid')
            element.classList.add('is-invalid')
        }
    }

    function jumlahSaudaraToggle(element) {
        const sibling = element.parentElement.parentElement.querySelector(element.getAttribute('ry-target'))
        if (element.value >= 1) {
            sibling.disabled = false
            element.setCustomValidity('')
            if (element.value > 20) {
                element.value = 20
            }
        } else {
            element.value = ''
            sibling.disabled = true
        }

        if (element.value == 0 || element.value == '') {
            element.setCustomValidity('Masukkan angka yang valid!')
        }

        if (Number(element.value) < Number(sibling.value)) {
            sibling.value = element.value
        }
    }

    function anak_keToggle(element) {
        const siblingElement = element.parentElement.parentElement.querySelector(element.getAttribute('ry-from'))
        let returnValue = true
        if (Number(element.value) > Number(siblingElement.value)) {
            element.value = siblingElement.value
        }
        if (element.value == '' || element.value.length <= 0) {
            returnValue = false
        }
        if (element.value <= 0) {
            element.value = ''
            returnValue = false
        }
    }

    function validateFileInputToggle(element, allowedExtensions) {
        // Mendapatkan elemen input file
        const fileInput = event.target;

        // Mendapatkan file yang dipilih
        const file = fileInput.files[0];

        // Jika tidak ada file yang dipilih
        if (!file) {
            element.setCustomValidity("Masukkan file terlebih dahulu");
            fileInput.value = ''; // Mengosongkan input file
            updateProgressBar()
            return false;
        }

        // Mendapatkan nama file
        const fileName = file.name;

        // Mendapatkan ekstensi file
        const fileExtension = fileName.split('.').pop();

        // Memeriksa apakah ekstensi file diizinkan
        if (!allowedExtensions.includes(fileExtension.toLowerCase())) {
            element.setCustomValidity('Ekstensi file tidak diizinkan!');
            fileInput.value = ''; // Mengosongkan input file
            return false;
        }
        return true;
    }

    function jumlahSaudaraToggle(element) {
        const sibling = element.parentElement.parentElement.querySelector(element.getAttribute('ry-target'))
        if (element.value >= 1) {
            sibling.disabled = false
            element.setCustomValidity('')
            if (element.value > 20) {
                element.value = 20
            }
            bsValidityToogle(element, 'valid')
        } else {
            element.value = ''
            sibling.disabled = true
            bsValidityToogle(element, 'invalid')
        }

        if (element.value == 0 || element.value == '') {
            element.setCustomValidity('Masukkan angka yang valid!')
            bsValidityToogle(element, 'invalid')
        }

        if (Number(element.value) < Number(sibling.value)) {
            sibling.value = element.value
            if (sibling.value == '') {
                bsValidityToogle(sibling, 'invalid')
            }
        }
    }

    function anak_keToggle(element) {
        const siblingElement = element.parentElement.parentElement.querySelector(element.getAttribute('ry-from'))
        let returnValue = true
        if (Number(element.value) > Number(siblingElement.value)) {
            element.value = siblingElement.value
        }
        if (element.value == '' || element.value.length <= 0) {
            returnValue = false
        }
        if (element.value <= 0) {
            element.value = ''
            returnValue = false
        }

        returnValue ? bsValidityToogle(element, 'valid') : bsValidityToogle(element, 'invalid')
    }

</script>
