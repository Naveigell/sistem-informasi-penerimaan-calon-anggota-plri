@extends('layouts.candidate.candidate')

@section('content')
    <div class="section-body mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Form Pendaftaran Untuk {{ ucfirst(request()->route('type')) }}</h3>
                    </div>
                </div>
                <form action="{{ route('candidates.registrations.store', request()->route('type')) }}" class="" method="post" enctype="multipart/form-data">
                    @csrf
                    @dump($errors->toArray())
                    <div class="card">
                        <div class="card-header">
                            <h4>Asal Polda dan Pol Res/Ta/Bes</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Asal Polda</label>
                                <select name="polda_id" id="" class="form-control">
                                    <x-forms.option-placeholder placeholder="-- Pilih Polda --"></x-forms.option-placeholder>
                                    @foreach($poldas as $polda)
                                        <option @if ($polda->id == old("polda_id")) selected @endif value="{{ $polda->id }}">{{ $polda->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Asal Polres</label>
                                <select name="polres_id" id="" class="form-control">
                                    <x-forms.option-placeholder placeholder="-- Pilih Polres --"></x-forms.option-placeholder>
                                    @foreach($poldas->where('number', 22)->first()->polres as $polres)
                                        <option @if ($polres->id == old("polres_id")) selected @endif value="{{ $polres->id }}">{{ $polres->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Identitas Diri</h4>
                        </div>
                        <div class="card-body">
                            @include('candidate.partials.registration.self_data')
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Latar Belakang Pendidikan dan Sumber Rekrutmen</h4>
                        </div>
                        <div class="card-body">
                            @include('candidate.partials.registration.education')
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Orang Tua</h4>
                        </div>
                        <div class="card-body">
                            @include('candidate.partials.registration.parent', ['title' => '1. Bapak Kandung', 'type' => 'father'])
                            @include('candidate.partials.registration.parent', ['title' => '2. Ibu Kandung', 'type' => 'mother'])
                            @include('candidate.partials.registration.parent', ['title' => '3. Wali / Bapak Tiri / Ibu Tiri', 'type' => 'guidance'])
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
