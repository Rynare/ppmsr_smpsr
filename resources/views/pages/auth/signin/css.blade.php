<style>
    body {
        min-height: 100vh
    }

    aside {
        top: 40px;
        right: calc(100% - 42px);
        bottom: 40px;
        width: 90%;
        max-width: 340px;
        min-width: 280px;
        transition: ease-in-out .5s;
    }

    aside.active {
        transform: translateX(calc(100% - 42px));
    }

    aside #aside-content-container {
        border-radius: 0 0 10px 0 !important;
    }

    aside #aside-content-container header {
        border-radius: 0 0 0 0 !important;
    }

    #content-container {
        max-width: 400px;
    }

    #content-container form {
        max-width: 400px;
    }

    @media screen and (min-width:576px) {
        aside {
            width: 60%;
        }

        #content-container {
            min-width: 67% !important;
            max-width: 700px;
        }

    }

    @media screen and (min-width:768px) {
        aside {
            top: 25px !important;
            bottom: 25px;
            left: 25px;
            width: 36%;
        }

        aside #aside-content-container {
            border-radius: 10px !important;
        }

        aside #aside-content-container header {
            border-radius: 10px 10px 0 0 !important;
        }
    }
</style>
