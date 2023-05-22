@extends('layouts.admin')

@section('content')
    @include('partials.sidebar')
    <div id="main" class="">

        @include('partials.navbar')
        <div class="main-content container-fluid">
            <div class="d-flex align-items-center justify-content-between">
                <div class="page-title ">
                    <h3>Penawaran Rumah</h3>
                    <p class="text-subtitle text-muted">Daftar penawaran rumah oleh pelanggan</p>
                </div>
            </div>

            <div class="row">
                <div class="card">
                    <div class="card-body px-0 pb-0">
                        <div class="table-responsive" style="max-height:420px">
                            <table class="table mb-0" id="table1">
                                <thead>
                                    <tr>
                                        <th>Pelanggan</th>
                                        <th>Model Rumah</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($offers as $offer)
                                        <tr>
                                            <td>{{ $offer->user->username }}</td>
                                            <td>{{ $offer->house->model }}</td>
                                            <td><span
                                                    class="badge {{ $offer->status == 'Membeli' ? 'bg-dark' : 'bg-warning' }}">{{ $offer->status }}</span>
                                            </td>
                                            <td>
                                                <a class="btn btn-sm btn-success" href="/admin/accept-offer/{{ $offer->id }}">Terima</a>
                                                <a class="btn btn-sm btn-danger" href="/admin/deny-offer/{{ $offer->id }}">Tolak</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('modals')
    <div class="modal fade text-left" id="deleteModal" tabindex="-1" aria-labelledby="" style="display: none;"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">
                        Hapus Rumah "<span id="house-model"></span>"
                    </h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    Jika Ingin menghapus Data Rumah silahkan tekan tombol Hapus
                </div>
                <form method="post">
                    @method('delete')
                    @csrf

                    <div class="modal-footer">
                        <button type="button" class="btn" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-secondary ms-1" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Hapus</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endpush

@push('scripts')
    <script>
        $('.btn-delete').click(function() {
            const id = $(this).data('id')
            const model = $(this).data('model')
            $('#deleteModal form').attr('action', '/admin/houses/' + id)
            $('#house-model').html(model)
        });

        function showImage(model, image) {
            Swal.fire({
                title: model,
                imageUrl: "{{ asset('storage') }}/" + image,
                imageWidth: 600,
                imageHeight: 300,
                imageAlt: 'Foto Rumah',
            })
        }
    </script>
@endpush