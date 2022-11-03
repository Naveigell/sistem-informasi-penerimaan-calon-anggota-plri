@extends('layouts.admin.admin')

@section('title', 'Jadwal')

@section('content')
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4>List Peserta</h4>
                    <div class="card-header-action">
                        <a href="{{ route('admins.schedules.create') }}" class="btn btn-primary">Tambah Jadwal</a>
                    </div>
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
                            <th>Nama Jadwal</th>
                            <th>Tipe</th>
                            <th>Waktu Mulai</th>
                            <th>Waktu Selesai</th>
                            <th>Lokasi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($schedules as $schedule)
                            <tr>
                                <th>{{ $schedules->firstItem() + $loop->index }}</th>
                                <td>{{ $schedule->name }}</td>
                                <td>{{ ucwords($schedule->type) }}</td>
                                <td>{{ $schedule->date_start->format('d F Y, H:i') }}</td>
                                <td>{{ $schedule->date_end->format('d F Y, H:i') }}</td>
                                <td>{{ $schedule->location }}</td>
                                <td>
                                    <a href="{{ route('admins.schedules.edit', $schedule) }}" class="btn btn-warning btn-action mr-1" data-toggle="tooltip" title="" data-original-title="Edit"><i class="fas fa-eye"></i></a>
                                    <span data-action="{{ route('admins.schedules.destroy', $schedule) }}" class="delete-confirm-btn display-xs-inline-block" data-toggle="tooltip" title="Hapus">
                                        <button type="button" class="btn btn-danger" data-toggle="modal">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </button>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <x-vendor.pagination :collection="$schedules"></x-vendor.pagination>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <x-forms.modals.delete></x-forms.modals.delete>
@endsection

@push('script')
    <script defer>
        $(document).ready(function() {
            $('.delete-confirm-btn').click(function() {
                $('#modal-delete-form').get(0).setAttribute('action', $(this).data('action'));
                $('#modal-delete').modal('show');
            });
        });
    </script>
@endpush
