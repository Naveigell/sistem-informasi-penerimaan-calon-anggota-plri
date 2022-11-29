@extends('layouts.candidate.candidate')

@section('content')
    <div class="row mt-5">
        <div class="col-5 bg-primary text-white text p-5 rounded">
            <h3>{{ auth('candidate')->user()->name }}</h3>
            <div class="mt-3">
                {{ auth('candidate')->user()->identity_card }}
            </div>
            <div class="mt-3">
                <span class="d-block font-weight-bold">Jalur Seleksi</span>
                <span class="d-block">{{ ucwords(config('static.candidate_type_enums.' . auth('candidate')->user()->type)) }}</span>
            </div>
            <div class="mt-3">
                <span class="d-block font-weight-bold">Nomor Registrasi</span>
                <span class="d-block">{{ auth('candidate')->user()->registration_number }}</span>
            </div>
            <div class="mt-3">
                <span class="d-block font-weight-bold">Nomor Ujian</span>
                <span class="d-block">012387/P/026</span>
            </div>
        </div>
        <div class="col-7 bg-white p-5 rounded">
            <h2>Dashboard</h2>
            <h6 class="font-weight-light">Selamat Datang <span class="font-weight-bold">{{ auth('candidate')->user()->name }}</span> ({{ auth('candidate')->user()->registration_number }})</h6>
            <div class="d-flex text-center text">
                <a href="" style="text-decoration: none;" class="d-inline-block p-3 m-2 rounded bg-primary text-white">
                    <span class="d-block font-weight-bold">Download</span>
                    <span>NOMOR REG. ONLINE <i class="fa fa-print"></i></span>
                </a>
                <a href="" style="text-decoration: none;" class="d-inline-block p-3 m-2 rounded bg-primary text-white">
                    <span class="d-block font-weight-bold">Download</span>
                    <span>NOMOR UJIAN <i class="fa fa-print"></i></span>
                </a>
                <a href="" style="text-decoration: none;" class="d-inline-block p-3 m-2 rounded bg-primary text-white">
                    <span class="d-block font-weight-bold">Download</span>
                    <span>NAMETAG <i class="fa fa-print"></i></span>
                </a>
            </div>
        </div>
    </div>
@endsection
