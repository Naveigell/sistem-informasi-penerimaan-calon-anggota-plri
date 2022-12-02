@extends('layouts.candidate.candidate')

@section('content')
    <div class="container mt-5">
        @if ($success = session('success'))
            <div class="row">
                <div class="col-12">
                    <x-notifications.alert :message="$success"></x-notifications.alert>
                </div>
            </div>
        @endif
        @if ($download = session('candidate-pdf-url'))
            <div class="row">
                <div class="col-12">
                    <x-notifications.alert :dissmisable="false" type="alert-light">
                        Silakan mendownload registrasi melalui link berikut .. <a href="{{ $download }}" target="_blank" class="text text-primary">download</a>
                    </x-notifications.alert>
                </div>
            </div>
        @endif
        @php
            $akpol   = optional($registrations->where("name", \App\Models\Candidate::REGISTRATION_AKPOL)->first())->is_active;
            $sipss   = optional($registrations->where("name", \App\Models\Candidate::REGISTRATION_SIPSS)->first())->is_active;
            $bintara = optional($registrations->where("name", \App\Models\Candidate::REGISTRATION_BINTARA)->first())->is_active;
            $tamtama = optional($registrations->where("name", \App\Models\Candidate::REGISTRATION_TAMTAMA)->first())->is_active;
        @endphp
        <div class="row">
            <div class="col-8">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <a @if ($akpol) href="{{ route('candidates.registrations.create', \App\Models\Candidate::REGISTRATION_AKPOL) }}" @endif class="col-6" style="text-decoration: none;">
                                <div class="card p-3">
                                    <div>
                                        <img src="{{ asset('assets/img/path/jalur_akpol.png') }}"
                                             width="100%"
                                             alt="">
                                    </div>
                                    <span class="d-block mt-3 text text-black-50">Akademi Polisi</span>
                                    @if ($akpol)
                                        <span class="d-block mt-1 text text-success text-small">* Pendaftaran Terbuka</span>
                                    @else
                                        <span class="d-block mt-1 text text-danger text-small">* Pendaftaran sudah ditutup</span>
                                    @endif
                                </div>
                            </a>
                            <a @if ($sipss) href="{{ route('candidates.registrations.create', \App\Models\Candidate::REGISTRATION_SIPSS) }}" @endif class="col-6" style="text-decoration: none;">
                                <div class="card p-3">
                                    <div>
                                        <img src="{{ asset('assets/img/path/jalur_sipss.jpg') }}"
                                             width="100%"
                                             alt="">
                                    </div>
                                    <span class="d-block mt-3 text text-black-50">Sekolah Inspektur Polisi Sumber Sarjana</span>
                                    @if ($sipss)
                                        <span class="d-block mt-1 text text-success text-small">* Pendaftaran Terbuka</span>
                                    @else
                                        <span class="d-block mt-1 text text-danger text-small">* Pendaftaran sudah ditutup</span>
                                    @endif
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="row">
                            <a @if ($bintara) href="{{ route('candidates.registrations.create', \App\Models\Candidate::REGISTRATION_BINTARA) }}" @endif class="col-6" style="text-decoration: none;">
                                <div class="card p-3">
                                    <div>
                                        <img src="{{ asset('assets/img/path/jalur_bintara.png') }}"
                                             width="100%"
                                             alt="">
                                    </div>
                                    <span class="d-block mt-3 text text-black-50">BINTARA</span>
                                    @if ($bintara)
                                        <span class="d-block mt-1 text text-success text-small">* Pendaftaran Terbuka</span>
                                    @else
                                        <span class="d-block mt-1 text text-danger text-small">* Pendaftaran sudah ditutup</span>
                                    @endif
                                </div>
                            </a>
                            <a @if ($tamtama) href="{{ route('candidates.registrations.create', \App\Models\Candidate::REGISTRATION_TAMTAMA) }}" @endif class="col-6" style="text-decoration: none;">
                                <div class="card p-3">
                                    <div>
                                        <img src="{{ asset('assets/img/path/jalur_tamtama.png') }}"
                                             width="100%"
                                             alt="">
                                    </div>
                                    <span class="d-block mt-3 text text-black-50">TAMTAMA</span>
                                    @if ($tamtama)
                                        <span class="d-block mt-1 text text-success text-small">* Pendaftaran Terbuka</span>
                                    @else
                                        <span class="d-block mt-1 text text-danger text-small">* Pendaftaran sudah ditutup</span>
                                    @endif
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">

                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Login</h4>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{ route('candidates.auth.login') }}">
                            @csrf
                            <div class="form-group">
                                <label for="registration_number">Nomor Registrasi</label>
                                <input id="registration_number" type="text" class="form-control @error('registration_number') is-invalid @enderror" name="registration_number" tabindex="1" value="{{ old('registration_number') }}">
                                @error('registration_number')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                </div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="2">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    Login
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
