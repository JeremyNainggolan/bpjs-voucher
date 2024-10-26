@extends('layouts.app')
@section('title', $data['page_title'])
@section('content')

    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-light border-light shadow-lg text-white rounded-4">
                        <div class="card-title align-items-center text-center mt-5">
                            <img src="{{ asset('logo/BPJS_Kesehatan_logo.png') }}">
                        </div>
                        <div class="card-body p-5 align-items-center text-dark" onload="createCaptcha()">
                            <form role="form" action="" method="POST" onsubmit="validateCaptcha()">
                                @csrf
                                <div class="my-4">
                                    <label for="identity" class="fw-bolder mb-1">Pilih Jenis Identitas</label>
                                    <select class="form-select fw-light" aria-label="Default select example" name="identity">
                                        <option value="nik_select" selected>Nomor Induk Kependudukan (NIK)</option>
                                        <option value="jkn_select">Nomor Kartu JKN</option>
                                    </select>
                                </div>
                                <div class="my-4">
                                    <label for="nik" class="fw-bolder mb-1">Nomor Induk Kependudukan (NIK)</label>
                                    <input id="nik" name="nik"  type="text" class="form-control" required placeholder="16 Digit Nomor Induk Kependudukan">
                                </div>
                                <div class="my-4">
                                    <label for="password" class="fw-bolder mb-1">Password</label>
                                    <input id="password" name="password"  type="password" ontoggle="" class="form-control" required placeholder="Password JKN">
                                </div>
                                <div class="my-4">
                                    <div id="captcha">
                                    </div>
                                    <label for="captcha" class="fw-bolder mb-1">Captcha</label>
                                    <input type="text" placeholder="Captcha" class="form-control" id="captcha" name="captcha">
                                </div>
                                <div class="text-center">
                                    <button id="submit" name="submit" type="submit"
                                            class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign
                                        in
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        var code;
        function createCaptcha() {
            //clear the contents of captcha div first
            document.getElementById('captcha').innerHTML = "";
            var charsArray =
                "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@!#$%^&*";
            var lengthOtp = 6;
            var captcha = [];
            for (var i = 0; i < lengthOtp; i++) {
                //below code will not allow Repetition of Characters
                var index = Math.floor(Math.random() * charsArray.length + 1); //get the next character from the array
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
            //storing captcha so that can validate you can save it somewhere else according to your specific requirements
            code = captcha.join("");
            document.getElementById("captcha").appendChild(canv); // adds the canvas to the body element
        }
        function validateCaptcha() {
            event.preventDefault();
            debugger
            if (document.getElementById("captcha").value == code) {
                alert("Valid Captcha")
            }else{
                alert("Invalid Captcha. try Again");
                createCaptcha();
            }
        }

    </script>
@endsection