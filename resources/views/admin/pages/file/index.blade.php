@extends('layouts.admin.admin')

@section('title', 'Peserta')

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>List Peserta</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th scope="col">Nama Berkas</th>
                            <th scope="col">Ukuran Maksimal</th>
                            <th scope="col">File yang diunggah peserta</th>
                            <th scope="col">Status</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($files as $file)
                                @php
                                    $uploadedFile = $candidate->candidateFiles->where('file_id', $file->id)->first();
                                @endphp

                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $file->name }}</td>
                                    <td>{{ $file->max_size }} MB</td>
                                    <td>
                                        @if ($uploadedFile)
                                            <a target="_blank" href="{{ $uploadedFile->filename_url }}" class="">{{ $uploadedFile->filename }}</a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td>
                                        @if (!$uploadedFile || !$uploadedFile->status)
                                            <span class="badge badge-light">Menunggu persetujuan</span>
                                        @elseif ($uploadedFile->status == \App\Models\CandidateFile::STATUS_ACCEPTED)
                                            <span class="badge badge-success">Diterima</span>
                                        @else
                                            <span class="badge badge-danger">Ditolak</span>
                                        @endif
                                    </td>
                                    <td>{{ $file->description ?? '-' }}</td>
                                    <td class="col-2">
                                        <form action="{{ route('admins.candidates.files.update', [$candidate, $file]) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button type="button" class="btn btn-success"><i class="fa fa-check"></i></button>
                                            <button type="button" class="btn btn-danger"><i class="fa fa-times"></i></button>
                                        </form>
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
