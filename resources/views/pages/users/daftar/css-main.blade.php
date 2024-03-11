<style>
    :root {
        ---gform-bg-color: #f0ebf8;
    }

    body {
        background-color: var(---gform-bg-color);
    }

    .form-group>label {
        font-size: 13px;
        color: gray;
        font-weight: 500
    }

    .focus-ring-none:focus {
        box-shadow: none;
        border-bottom: 2px solid blue !important;
    }

    .focus-ring-none:focus:is(.is-invalid, .is-valid) {
        box-shadow: none;
    }

    .focus-ring-none.is-invalid {
        border-bottom: 2px solid red !important;
    }

    #content {
        width: 100%;
        background-color: #ffffff;
    }


    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        display: none !important;
    }

    @media (min-width: 768px) {
        #content {
            width: 75%;
            background-color: #ffffff;
        }
    }

    @media (min-width: 992px) {
        #content {
            width: 50%;
            background-color: #ffffff;
        }
    }

    @media (min-width: 1200px) {}

    @media (min-width: 1400px) {}
</style>
