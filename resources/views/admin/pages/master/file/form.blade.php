@extends('layouts.admin.admin')

@section('title', 'File')

@section('content')
    <div class="section-body mt-5">
        <div class="row">
            <div class="col-12">
                <form action="{{ @$file ? route('admins.master.files.update', $file) : route('admins.master.files.store') }}" class="" method="post" enctype="multipart/form-data">
                    @csrf
                    @method(@$file ? 'PUT' : 'POST')
                    <div class="card">
                        <div class="card-header">
                            <h4>Form Berkas Wajib</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Berkas</label>
                                <input type="text" value="{{ old('name', @$file ? @$file->name : '') }}" name="name" class="form-control @error("name") is-invalid @enderror">
                                @error("name")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Maksimal Upload (MB)</label>
                                <input type="number" value="{{ old('max_size', @$file ? @$file->max_size : '') }}" min="1" name="max_size" class="form-control @error("max_size") is-invalid @enderror">
                                @error("max_size")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <input type="text" value="{{ old('description', @$file ? @$file->description : '') }}" min="1" name="description" class="form-control @error("description") is-invalid @enderror">
                                @error("description")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
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
