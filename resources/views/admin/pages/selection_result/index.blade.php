@extends('layouts.admin.admin')

@section('title', 'Peserta')

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <form class="card" method="post" action="{{ route('admins.candidates.selection-results.store', $candidate) }}">
                @csrf
                <div class="card-header">
                    <h4>List Nilai</h4>
                </div>
                <div class="card-body">
                    @if ($success = session('success'))
                        <div class="row">
                            <div class="col-12">
                                <x-notifications.alert :message="$success"></x-notifications.alert>
                            </div>
                        </div>
                    @endif
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Tahapan Seleksi</th>
                            <th>Pelaksanaan Seleksi</th>
                            <th>Nilai Seleksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($schedules as $schedule)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $schedule->name }}</td>
                                    <td>{{ $schedule->date_start->format('d F Y') }} s/d {{ $schedule->date_end->format('d F Y') }}</td>
                                    <td>
                                        <input name="results[{{ $loop->index }}][value]" type="text" disabled class="form-control @error ('results.' . $loop->index . '.value') is-invalid @enderror" value="{{ optional($schedule->selectionResult)->value ?? 0 }}">
                                        @error("results.$loop->index.value")
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
@endsection
