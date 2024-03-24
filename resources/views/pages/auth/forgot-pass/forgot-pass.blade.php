<!doctype html>
<html lang="en">

<head>
    <title>Lupa password</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    @include('components.bootstrap.bs-icon')
    <style>
        .form-gap {
            padding-top: 70px;
        }
    </style>
</head>

<body>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <div class="form-gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">
                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                            <h2 class="text-center">Lupa kata sandi</h2>
                            <p>Buat sandi baru sekarang.</p>
                            <div class="panel-body">

                                <form id="{{ route('forgot-password.submit', ['email' => $email, 'otp' => $otp]) }}"
                                    role="form" autocomplete="off" class="form" method="post">
                                    @csrf
                                    <input type="text" hidden name="email" value="{{ $email }}">
                                    <input type="text" hidden name="otp" value="{{ $otp }}">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="bi bi-key"></i></span>
                                            <input id="user.newPassword" placeholder="Password" class="form-control"
                                                type="text">
                                        </div>
                                        <div class="input-group mt-3">
                                            <span class="input-group-addon"><i class="bi bi-key"></i></span>
                                            <input id="user.newPasswordConfirm" placeholder="Konfirmasi password"
                                                class="form-control" type="text" name="password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block"
                                            value="Konfirmasi" type="submit">
                                    </div>

                                    <input type="hidden" class="hide" name="token" id="token" value="">
                                </form>
                                <script>
                                    function runPasswordMatchValidationEvent() {
                                        const newPass = document.getElementById('user.newPassword');
                                        const newPassConfirm = document.getElementById('user.newPasswordConfirm');

                                        ['input', 'change', 'keydown', 'keyup', 'keypress'].forEach(actionType => {
                                            newPass.addEventListener(actionType, () => {
                                                if (newPassConfirm.value !== newPass.value) {
                                                    newPassConfirm.classList.remove('is-valid');
                                                    newPassConfirm.classList.add('is-invalid');
                                                    newPassConfirm.setCustomValidity('Password tidak cocok')
                                                } else {
                                                    newPassConfirm.classList.remove('is-invalid');
                                                    newPassConfirm.classList.add('is-valid');
                                                    newPassConfirm.setCustomValidity('')
                                                }
                                            });

                                            newPassConfirm.addEventListener(actionType, () => {
                                                if (newPassConfirm.value !== newPass.value) {
                                                    newPassConfirm.classList.remove('is-valid');
                                                    newPassConfirm.classList.add('is-invalid');
                                                    newPassConfirm.setCustomValidity('Password tidak cocok')
                                                } else {
                                                    newPassConfirm.classList.remove('is-invalid');
                                                    newPassConfirm.classList.add('is-valid');
                                                    newPassConfirm.setCustomValidity('')
                                                }
                                            });
                                        });
                                    }
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
