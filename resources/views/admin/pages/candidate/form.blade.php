@extends('layouts.admin.admin')

@section('title', 'Peserta')

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Data Diri Peserta</h4>
                </div>
                <div class="card-body">
                    <div class="form-group text-center">
                        <img
                            width="170px"
                            height="200px"
                            src="{{ $candidate->avatar_url }}"
                            alt="">
                    </div>
                    @include('admin.partials.candidate.self_data', compact('candidate'))
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Pendidikan Terakhir Peserta</h4>
                </div>
                <div class="card-body">
                    @include('admin.partials.candidate.education', compact('candidate'))
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>Orang Tua / Wali Peserta</h4>
                </div>
                <div class="card-body">
                    @foreach($candidate->candidateParents as $parent)
                        @include('admin.partials.candidate.parent', ["parent" => $parent, "title" => "{$loop->iteration}. {$parent->parent_type_formatted}", "type" => $parent->parent_type])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
