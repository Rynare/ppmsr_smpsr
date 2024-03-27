<!-- Run Script disini bro -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.querySelector('form')
        const submit_btn = form.querySelector('[type=submit]')
        runFormKeyEvent(form)
        runFormEvent(form)
        loadFormData()

        setInterval(() => {
            saveFormData(form, submit_btn)
        }, 1000);
    })
</script>

<!-- Auto save Form -->
<script>
    const inputFileElements = []
    document.querySelectorAll('input[type=file]').forEach(element => {
        inputFileElements.push(element.name.toLowerCase())
    });

    function saveFormData(form, submit_btn) {
        const formData = new FormData(form);
        const result = {};

        formData.forEach((value, key) => {
            if (inputFileElements.includes(key)) {
                result[key] = formData.get(key)['name']
                if (isEmpty(formData.get(key)['name'])) {
                    submit_btn.disabled = true
                } else {
                    submit_btn.disabled = false
                }
            } else {
                result[key] = value;
                if (isEmpty(value)) {
                    submit_btn.disabled = true
                } else {
                    submit_btn.disabled = false
                }
            }
        });

        localStorage.setItem('savedFormData', JSON.stringify(result));
    }

    function loadFormData() {
        const formData = JSON.parse(localStorage.getItem('savedFormData'))
        if (formData !== null) {
            for (const key in formData) {
                const formInput = document.querySelector(`[name=${key}]`);
                if (formInput) {
                    const formInputTagName = formInput.tagName.toLowerCase();
                    const formInputType = formInput.getAttribute('type')
                    const formInputDataInputType = formInput.getAttribute('data-input')

                    switch (formInputTagName) {
                        case 'input':
                            if (key == '_token') {
                                continue;
                            }
                            if (formInput.getAttribute('type') == 'file') {
                                continue;
                            }
                            if (formInput.getAttribute('type') == 'radio') {
                                const radioBtn = document.querySelector(`form #${formData[key]}`);
                                if (radioBtn) {
                                    radioBtn.checked = 1
                                }
                            }
                        case 'select':
                            formInput.value = formData[key];
                            break;
                        default:
                            break;
                    }
                    if (key.includes('penghasilan')) {
                        const elementCurrency = document.querySelector(formInput.getAttribute('data-input-fake-ref'))

                        const {
                            status,
                            msg,
                            result
                        } = currencyFormatterAndChecker(`${formData[key]}`)
                        if (status) {
                            elementCurrency.value = result
                            elementCurrency.setCustomValidity('')
                            bsValidityToogle(elementCurrency, 'is-valid')
                        } else {
                            elementCurrency.setCustomValidity(msg)
                            bsValidityToogle(elementCurrency, 'is-invalid')
                        }
                    }
                    validateInput(formInput)
                    if (formInputType == 'number') {
                        validateInputNumber(formInput)
                    }
                    if (formInputType == 'date') {
                        validateDateInput(formInput)
                    }

                    if (formInputDataInputType == 'phone-number') {
                        validatePhoneNumber(formInput)
                    }
                    if (isEmpty(formInput.value) && formInput.getAttribute('type')?.toLowerCase() !== 'file') {
                        formInput.classList.remove('is-invalid')
                        formInput.classList.remove('is-valid')
                    }
                }

                // memberikan validasi ke element yang sudah diisi
            }
        }
    }
</script>

<!-- Form event -->
<script>
    function runFormKeyEvent(form) {
        ['keyup', 'keydown', 'keypress'].forEach(eventType => {
            form.addEventListener(eventType, (event) => {
                if (['input', 'textarea'].includes(event.target.tagName.toLowerCase())) {
                    const value = event.target.value
                    const element = event.target
                    if ((value == '' || value.endsWith(' ')) && event.key == ' ') {
                        event.preventDefault()
                    }
                    if (element.hasAttribute('regex')) {
                        const regexAttr = element.getAttribute('regex')
                        const regexp = new RegExp(regexAttr);
                        if (!regexp.test(event.key)) {
                            event.preventDefault()
                        }
                    }
                }
            })
        });
    }

    function runFormEvent(form) {
        ['change', 'input', 'formdata'].forEach(eventType => {
            form.addEventListener(eventType, (event) => {
                const element = event.target
                const elementTagName = element.tagName.toLowerCase()
                const elementType = element.getAttribute('type')?.toLowerCase()
                const elementDataInputType = element.getAttribute('data-input')?.toLowerCase()

                if (['input'].includes(elementTagName)) {
                    validateInput(element)

                    if (elementType == 'number') {
                        validateInputNumber(element)
                    }

                    if (elementType == 'date') {
                        validateDateInput(element)
                    }

                    if (elementDataInputType == 'phone-number') {
                        validatePhoneNumber(element)
                    }

                    if (elementType == 'file') {
                        validateFileExtension(element)
                    }

                    if (elementDataInputType == 'currency') {
                        const realValueContainer = document.querySelector(element.getAttribute(
                            'data-input-real-target'))
                        if (element.value == '') {
                            element.value = 0
                            realValueContainer.value = 0
                        }
                        var regex = /\d+/g; //regexp untuk hanya number
                        var angka = element.value.match(regex);
                        if (angka) {
                            // mengubah nilai menjadi hanya angka
                            realValueContainer.value = angka.join('');
                        }
                        const {
                            status,
                            msg,
                            result
                        } = currencyFormatterAndChecker(realValueContainer.value)
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
                }
            })
        });
    }
</script>

<!-- Support Function -->
<script>
    function isEmpty(value) {
        return (value === null || value === undefined || value === '')
    }
</script>

<!-- Input Validate -->
<script>
    function validateInput(element) {
        let value = element.value
        const isRequired = element.hasAttribute('required')
        const minLength = element.minLength
        const maxLength = element.maxLength
        const minValue = parseInt(element.min) || ''
        const maxValue = parseInt(element.max) || ''

        if ((value == '' && isRequired)) {
            element.setCustomValidity('Harap diisi!')
        } else if (!isEmpty(minLength) && minLength >= 0 && value.length < minLength) {
            element.setCustomValidity(`Tidak boleh kurang dari ${minLength} karakter!`)
        } else if (!isEmpty(maxLength) && maxLength >= 0 && value.length > maxLength) {
            element.setCustomValidity(`Tidak boleh melebihi ${maxLength} karakter!`)
        } else {
            element.setCustomValidity('')
            bsValidityToogle(element, 'is-valid')
            return
        }

        bsValidityToogle(element, 'is-invalid')
    }

    function validateInputNumber(element) {
        let value = element.value
        const minValue = parseInt(element.min) || ''
        const maxValue = parseInt(element.max) || ''

        if (!isEmpty(minValue) && value < minValue) {
            value = ''
            element.setCustomValidity(`Tidak boleh kurang dari ${minValue}!`)
        } else if (!isEmpty(maxValue) && value > maxValue) {
            value = maxValue
            element.setCustomValidity(`Tidak boleh melebihi ${maxValue}!`)
        } else {
            element.setCustomValidity('')
            bsValidityToogle(element, 'is-valid')
            return
        }

        bsValidityToogle(element, 'is-invalid')
    }

    function validatePhoneNumber(element) {
        // Menghilangkan spasi dan karakter non-digit
        const userInput = element.value
        var cleanInput = userInput.replace(/\D/g, '');

        if (element.hasAttribute('required')) {
            if (!cleanInput.startsWith('8')) {
                element.setCustomValidity("Input harus diawali dengan angka 8!")
            } else if (cleanInput.length <= 9) {
                element.setCustomValidity('Input minimal 10 karakter!')
            } else if (cleanInput.length > 12) {
                element.setCustomValidity("Input maksimal 12 karakter!")
            } else {
                element.setCustomValidity("")
                bsValidityToogle(element, 'is-valid')
                return
            }
            bsValidityToogle(element, 'is-invalid')
            return
        }

        if (cleanInput.length >= 1) {
            if (!cleanInput.startsWith('8')) {
                element.setCustomValidity("Input harus diawali dengan angka 8!")
            } else if (cleanInput.length <= 9) {
                element.setCustomValidity('Input minimal 10 karakter!')
            } else if (cleanInput.length > 12) {
                element.setCustomValidity("Input maksimal 12 karakter!")
            } else {
                element.setCustomValidity("")
                return
            }
            bsValidityToogle(element, 'is-invalid')
            return
        }
    }

    function currencyFormatterAndChecker(currencyNumber) {
        var formatter = new Intl.NumberFormat('id-ID').format(currencyNumber);
        currencyNumber = formatter
        if (currencyNumber == '') {
            return {
                status: false,
                msg: "Masukkan nominal yang valid!",
                result: ''
            }
        }
        return {
            status: true,
            result: currencyNumber
        }
    }

    function validateDateInput(element) {
        // Mendapatkan tanggal hari ini dalam format yang sama dengan input
        const today = new Date().toISOString().slice(0, 10);
        const dateValue = element.value

        if (dateValue > today) {
            element.setCustomValidity("Tolong masukkan tanggal yang valid")
        } else {
            element.setCustomValidity("")
            bsValidityToogle(element, 'is-valid')
            return
        }
        bsValidityToogle(element, 'is-invalid')

    }

    function validateFileExtension(element) {
        const fileInput = element;
        const allowedExtensions = element.getAttribute('data-allowed-extension').split(',')

        // Mendapatkan file yang dipilih
        const file = fileInput.files[0];

        // Jika tidak ada file yang dipilih
        if (!file) {
            element.setCustomValidity("Masukkan file terlebih dahulu");
            bsValidityToogle(element, 'is-invalid')
            fileInput.value = ''; // Mengosongkan input file
            return false;
        }

        // Mendapatkan nama file
        const fileName = file.name;
        const fileSize = file.size;
        const maxSize = (parseInt(element.getAttribute('data-max-file-size')) || 0) * 1024 * 1024

        // Mendapatkan ekstensi file
        const fileExtension = fileName.split('.').pop();

        // Memeriksa apakah ekstensi file diizinkan
        if (!allowedExtensions.includes(fileExtension.toLowerCase())) {
            element.setCustomValidity('Ekstensi file tidak diizinkan!');
            bsValidityToogle(element, 'is-invalid')
            fileInput.value = ''; // Mengosongkan input file
            return false;
        }

        if (fileSize > maxSize) {
            element.setCustomValidity(`File terlalu besar, MAX: ${maxSize}MB!`);
            bsValidityToogle(element, 'is-invalid')
            fileInput.value = ''; // Mengosongkan input file
            return false;
        }

        element.setCustomValidity('');
        bsValidityToogle(element, 'is-valid')
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
            element.setCustomValidity('')
            if (element.value > 20) {
                element.value = 20
            }
        } else {
            element.value = ''
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
