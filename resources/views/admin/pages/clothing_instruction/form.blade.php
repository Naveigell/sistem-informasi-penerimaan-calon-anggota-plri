@extends('layouts.admin.admin')

@section('title', 'Petunjuk Pakaian')

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <form class="card" action="{{ route('admins.clothing-instructions.update', $clothing) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-header">
                    <h4>Form Petunjuk Pakaian</h4>
                </div>
                <div class="card-body">
                    @if ($message = session('success'))
                        <x-notifications.alert :message="$message"></x-notifications.alert>
                    @endif
                    <div class="form-group">
                        <label>File (pdf)</label>
                        <input type="file" accept="application/pdf" value="" name="filename" class="form-control @error('filename') is-invalid @enderror">
                        @error("filename")
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary mr-1" type="submit">Simpan</button>
                </div>
            </form>
        </div>
    </div>
@endsection
