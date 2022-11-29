@extends('layouts.candidate.candidate')

@section('content')
    <div class="row mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Berkas Peserta</h4>
                </div>
                <div class="card-body">
                    <span class="d-block text text-danger mb-4">
                        *Jika pada file berkas terdapat keterangan file corupt silahkan refresh halaman anda!
                    </span>
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
                            <th>Nama Berkas</th>
                            <th>File Berkas</th>
                            <th>Informasi Validasi</th>
                            <th>Upload</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($files as $file)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="">
                                            <span class="d-block mt-2">{{ $file->name }}</span>
                                            @if ($file->description)
                                                <span class="d-block text text-danger text-small mt-2 font-weight-bold">{{ $file->description }}</span>
                                            @endif
                                            <span class="d-block text text-danger text-small mt-2 mb-4">* Maksimal ukuran file {{ $file->max_size }} MB</span>
                                        </div>
                                    </td>
                                    <td class="col-7">
                                        @if ($file->candidateFile->isEmpty() || ($file->candidateFile->isNotEmpty() && $file->candidateFile->first()->status == \App\Models\CandidateFile::STATUS_DECLINED))
                                            <form action="{{ route('candidates.files.update', $file) }}" class="" method="post" enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col-9">
                                                        <input type="file" accept="application/pdf,image/jpeg,image/jpg,image/png" class="form-control @error("file_{$file->id}") is-invalid @enderror" name="file_{{ $file->id }}">
                                                        @error("file_{$file->id}")
                                                            <div class="invalid-feedback">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-3">
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </div>
                                                </div>
                                            </form>
                                        @else
                                            <a target="_blank" href="{{ $file->candidateFile->first()->filename_url }}" class="">{{ $file->candidateFile->first()->filename }}</a>
                                        @endif
                                    </td>
                                    <td class="col-2">
                                        @if ($file->candidateFile->isEmpty())
                                            <span class="d-block text text-light text-small">Menunggu Upload</span>
                                            <span class="d-block text-small">
                                                Keterangan : <br>
                                                menunggu berkas untuk di upload
                                            </span>
                                        @elseif ($candidateFile = $file->candidateFile->first())
                                            @if (!$candidateFile->status)
                                                <span class="d-block text text-warning text-small">Menunggu</span>
                                                <span class="d-block text-small">
                                                    Keterangan : <br>
                                                    menunggu persetujuan
                                                </span>
                                            @elseif ($candidateFile->status == \App\Models\CandidateFile::STATUS_ACCEPTED)
                                                <span class="d-block text text-success text-small">Diterima</span>
                                                <span class="d-block text-small">
                                                    Keterangan : <br>
                                                    telah di verifikasi oleh OPERATOR POLRESTA DENPASAR
                                                </span>
                                            @else
                                                <span class="d-block text text-danger text-small">Ditolak</span>
                                                <span class="d-block text-small">
                                                    Keterangan : <br>
                                                    berkas ditolak oleh OPERATOR POLRESTA DENPASAR, silakan menguplaod ulang
                                                </span>
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @if ($file->candidateFile->isEmpty())
                                            <span class="d-block text-small">-</span>
                                        @elseif ($candidateFile = $file->candidateFile->first())
                                            <span class="d-block text-small">{{ $candidateFile->description }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
