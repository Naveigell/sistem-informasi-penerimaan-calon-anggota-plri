@extends('layouts.candidate.candidate')

@section('content')
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Upload Nilai Peserta</h4>
                    <div class="card-header-action">
                        <a href="{{ route('candidates.selection-results.template.print') }}" class="btn btn-success">Download Template</a>
                    </div>
                </div>
                <div class="card-body">
                    <span class="d-block text text-primary mb-4">
                        *Mohon untuk mengisi template dan menguploadnya dengan benar melalui form dibawah ini
                    </span>
                    @if ($success = session('success'))
                        <div class="row">
                            <div class="col-12">
                                <x-notifications.alert :message="$success"></x-notifications.alert>
                            </div>
                        </div>
                    @endif
                    @foreach($grades as $grade => $schedules)
                        <h4 class="mb-3">Seleksi Tingkat {{ ucwords(\App\Models\Schedule::GRADES[$grade]) }}</h4>
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Jadwal</th>
                                <th>Berkas Nilai</th>
                                <th>Nilai</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($schedules as $schedule)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="">
                                            <span class="d-block mt-2">{{ $schedule->name }}</span>
                                        </div>
                                    </td>
                                    <td class="col-7">
                                        <form action="{{ route('candidates.selection-result.store', $schedule) }}" class="" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            <div class="row">
                                                <div class="col-9">
                                                    <input type="file" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" class="form-control @error('file_' . $schedule->id) is-invalid @enderror" name="file_{{ $schedule->id }}">
                                                    @error("file_{$schedule->id}")
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                                <div class="col-3">
                                                    <button type="submit" class="btn btn-primary">{{ optional($schedule->selectionResult)->value ? 'Ubah' : 'Simpan' }}</button>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                    <td>
                                        <span class="d-block text-small">{{ optional($schedule->selectionResult)->value ?? '-' }}</span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @if(!$loop->last)
                            <hr>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-12">

        </div>
    </div>
@endsection
