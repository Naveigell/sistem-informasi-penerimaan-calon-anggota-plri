@extends('layouts.candidate.candidate')

@section('content')
    <div class="section-body mt-5">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Biodata</h3>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Asal Polda dan Pol Res/Ta/Bes</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>Asal Polda</label>
                            <input type="text" class="form-control" readonly value="{{ $candidate->polda->name }}">
                        </div>
                        <div class="form-group">
                            <label>Asal Polres</label>
                            <input type="text" class="form-control" readonly value="{{ $candidate->polres->name }}">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Identitas Diri</h4>
                    </div>
                    <div class="card-body">
                        @include('candidate.partials.biodata.self_data', compact('candidate'))
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Latar Belakang Pendidikan dan Sumber Rekrutmen</h4>
                    </div>
                    <div class="card-body">
                        @include('candidate.partials.biodata.education', compact('candidate'))
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h4>Data Orang Tua</h4>
                    </div>
                    <div class="card-body">
                        @foreach($candidate->candidateParents as $parent)
                            @include('candidate.partials.biodata.parent', [
                                "title"  => "{$loop->iteration}. " . config('static.parent_types.' . $parent->parent_type),
                                "type"   => $parent->parent_type,
                                "parent" => $parent,
                            ])
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
