@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h2>Voucher Saya</h2>
            <div class="card mb-3" v-for="voucher in vouchers">
                <div class="card-body">
                    <h5 class="card-title">Nama Voucher</h5>
                    <p class="card-text">Deskripsi Voucher</p>
                    <p class="card-text">Masa Berlaku: Tanggal Berlaku</p>
                    <button class="btn btn-primary">Klaim Voucher</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h2>Riwayat Voucher</h2>
            <ul class="list-group">
                <li class="list-group-item" v-for="history in histories">
                    Nama Voucher - Tanggal Klaim
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection