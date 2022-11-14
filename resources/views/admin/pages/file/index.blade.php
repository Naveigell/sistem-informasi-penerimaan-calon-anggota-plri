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
                    <table class="table table-bordered table-responsive">
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
                                        @if (!$uploadedFile)
                                            <span class="badge badge-dark">Menunggu upload</span>
                                        @elseif (!$uploadedFile->status)
                                            <span class="badge badge-light">Menunggu persetujuan</span>
                                        @elseif ($uploadedFile->status == \App\Models\CandidateFile::STATUS_ACCEPTED)
                                            <span class="badge badge-success">Diterima</span>
                                        @else
                                            <span class="badge badge-danger">Ditolak</span>
                                        @endif
                                    </td>
                                    <td>{{ $file->description ?? '-' }}</td>
                                    <td class="col-2">
                                        @if ($uploadedFile && !$uploadedFile->status)
                                            <form method="post">
                                                @csrf
                                                @method('PUT')
                                                <span data-status-text-class="text-success" data-status-text="menerima" data-action="{{ route('admins.candidates.files.status.update', [$candidate, $file, 'accepted']) }}" class="confirm-button display-xs-inline-block" data-toggle="tooltip" title="Terima">
                                                    <button type="button" class="btn btn-success" data-toggle="modal">
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                    </button>
                                                </span>
                                                <span data-status-text-class="text-danger" data-status-text="menolak" data-action="{{ route('admins.candidates.files.status.update', [$candidate, $file, 'declined']) }}" class="confirm-button display-xs-inline-block" data-toggle="tooltip" title="Tolak">
                                                    <button type="button" class="btn btn-danger" data-toggle="modal">
                                                        <i class="fa fa-times" aria-hidden="true"></i>
                                                    </button>
                                                </span>
                                            </form>
                                        @else
                                            -
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

@section('modal')
    <x-forms.modals.base id="confirmation-modal" form-id="confirmation-modal-form" method="PUT">
        <x-slot name="title">Konfirmasi</x-slot>
        <x-slot name="body">
            <div class="form-group">
                Yakin ingin <span class="text" id="status-text"></span> berkas?
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="description" placeholder="Tulis pesan (optional) ...">
            </div>
        </x-slot>
    </x-forms.modals.base>
@endsection

@push('script')
    <script defer>
        $(document).ready(function() {
            $('.confirm-button').click(function() {

                let statusText = $('#status-text');

                statusText.html($(this).data('status-text'));
                statusText.removeClass(['text-danger', 'text-success']);
                statusText.addClass($(this).data('status-text-class'));

                $('#confirmation-modal-form').get(0).setAttribute('action', $(this).data('action'));
                $('#confirmation-modal').modal('show');
            });
        });
    </script>
@endpush
