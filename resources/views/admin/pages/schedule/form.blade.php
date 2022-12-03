@extends('layouts.admin.admin')

@section('title', 'Jadwal')

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <form class="card" action="{{ @$schedule ? route('admins.schedules.update', $schedule) : route('admins.schedules.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method(@$schedule ? 'PUT' : 'POST')
                <div class="card-header">
                    <h4>Form Jadwal</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Jadwal</label>
                        <input type="text" name="name" value="{{ old('name', @$schedule ? $schedule->name : '') }}" class="form-control @error("name") is-invalid @enderror">
                        @error("name")
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Tipe</label>
                        <select name="type" id="" class="form-control @error("type") is-invalid @enderror">
                            <x-forms.option-placeholder></x-forms.option-placeholder>
                            @foreach(array_keys(config('static.candidate_type')) as $index => $type)
                                <option @if ($type == old("type", @$schedule ? $schedule->type : '')) selected @endif value="{{ $type }}">{{ ucwords($type) }}</option>
                            @endforeach
                        </select>
                        @error("type")
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Waktu Mulai</label>
                                <input type="datetime-local" value="{{ old('date_start', @$schedule ? $schedule->date_start->format('Y-m-d H:i') : '') }}" name="date_start" class="form-control @error("date_start") is-invalid @enderror">
                                @error("date_start")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Waktu Selesai</label>
                                <input type="datetime-local" value="{{ old('date_end', @$schedule ? $schedule->date_end->format('Y-m-d H:i') : '') }}" name="date_end" class="form-control @error("date_end") is-invalid @enderror">
                                @error("date_end")
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Lokasi</label>
                        <input type="text" value="{{ old('location', @$schedule ? $schedule->location : '') }}" name="location" class="form-control @error("location") is-invalid @enderror">
                        @error("location")
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Tingkat</label>
                        <select name="grade" id="" class="form-control @error("grade") is-invalid @enderror">
                            <x-forms.option-placeholder></x-forms.option-placeholder>
                            @foreach(array_keys(\App\Models\Schedule::GRADES) as $index => $grade)
                                <option @if ($grade == old("grade", @$schedule ? $schedule->grade : '')) selected @endif value="{{ $grade }}">{{ ucwords(\App\Models\Schedule::GRADES[$grade]) }}</option>
                            @endforeach
                        </select>
                        @error("grade")
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
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
