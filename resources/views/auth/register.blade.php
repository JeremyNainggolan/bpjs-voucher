@extends('layouts.app')
@section('title', $data['page_title'])
@section('content')
    <body onload="createCaptcha()">
    <section class="d-flex  min-vh-100 gradient-custom">
        <div class="container py-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-light border-light shadow-lg text-white rounded-4">
                        <div class="card-title align-items-center text-center mt-5">
                            <img src="{{ asset('logo/BPJS_Kesehatan_logo.png') }}">
                        </div>
                        <div class="card-body p-5 align-items-center text-dark">
                            <form id="loginForm" role="form" action="{{ route('register.post') }}" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label for="nik" class="fw-bolder mb-1" id="label_nik">Nomor Induk Kependudukan
                                        (NIK)</label>
                                    <input id="nik" name="nik" type="text" class="form-control" required>
                                </div>
                                <div class="my-4">
                                    <label for="name" class="fw-bolder mb-1">Nama Lengkap</label>
                                    <input id="name" name="name" type="text"
                                           class="form-control" required>
                                </div>
                                <div class="my-4">
                                    <label for="date_of_birth" class="fw-bolder mb-1">Tanggal Lahir</label>
                                    <input id="date_of_birth" name="date_of_birth" type="date"
                                        class="form-control" required>
                                </div>
                                <div class="my-4">
                                    <label for="password" class="fw-bolder mb-1">Password</label>
                                    <input id="password" name="password" type="password"
                                        class="form-control" required>
                                </div>
                                <div class="my-4">
                                    <label for="password_confirmation" class="fw-bolder mb-1">Confirm Password</label>
                                    <input id="password_confirmation" name="password_confirmation" type="password"
                                        class="form-control" required>
                                </div>
                                <div class="mt-4">
                                    <div id="captcha"></div>
                                    <label for="captcha" class="fw-bolder mb-1">Captcha</label>
                                    <input type="text" placeholder="Captcha" class="form-control" id="captchaInput"
                                           name="captcha">
                                </div>
                                <div class="text-center">
                                    <button id="submit" name="submit" type="submit"
                                            class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0 fw-bolder">Verifikasi Daftar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </body>

    <script>
        var code;

        function createCaptcha() {
            // Clear the contents of captcha div first
            document.getElementById('captcha').innerHTML = "";
            var charsArray = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*";
            var lengthOtp = 6;
            var captcha = [];
            for (var i = 0; i < lengthOtp; i++) {
                var index = Math.floor(Math.random() * charsArray.length + 1); // Get the next character from the array
                if (captcha.indexOf(charsArray[index]) == -1)
                    captcha.push(charsArray[index]);
                else i--;
            }
            var canv = document.createElement("canvas");
            canv.id = "captcha";
            canv.width = 100;
            canv.height = 50;
            var ctx = canv.getContext("2d");
            ctx.font = "25px Georgia";
            ctx.strokeText(captcha.join(""), 0, 30);
            code = captcha.join(""); // Store captcha for validation
            document.getElementById("captcha").appendChild(canv); // Append canvas to the div
        }

        function validateCaptcha(event) {
            var captchaInput = document.getElementById("captchaInput").value;

            if (captchaInput === code) {
                // Captcha valid, form will be submitted automatically
                document.getElementById("loginForm").submit();
            } else {
                // Captcha not valid, prevent form submission
                event.preventDefault();
                alert("Invalid Captcha. Try again.");
                createCaptcha(); // Generate a new captcha
            }
        }

        function updatePlaceholder() {
            var identitySelect = document.getElementById("identity");
            var selectedValue = identitySelect.value;
            var nikInput = document.getElementById("nik");
            var labelNik = document.getElementById("label_nik");

            if (selectedValue === "nik_select") {
                nikInput.placeholder = "16 Digit Nomor Induk Kependudukan";
                labelNik.textContent = "Nomor Induk Kependudukan (NIK)";
            } else if (selectedValue === "jkn_select") {
                nikInput.placeholder = "Nomor Kartu JKN";
                labelNik.textContent = "Nomor Kartu JKN";
            }
        }

    </script>

@endsection
