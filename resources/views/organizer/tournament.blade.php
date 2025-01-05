@extends('theme.index')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Turnamen</h1>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row mb-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                Tambah Turnamen
            </button>

        </div>
        <div class="row">
            <table class="table table-bordered data-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Turnamen</th>
                        <th>Waktu</th>
                        <th>Venue</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tournaments as $index => $tournament)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $tournament->name }}</td>
                            <td>{{ $tournament->time }}</td>
                            <td>{{ $tournament->venue->name }}</td>
                            <td>
                                <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                    data-target="#viewModal{{ $tournament->id }}">Lihat</button>
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                    data-target="#editModal{{ $tournament->id }}">Edit</button>
                                <form action="{{ route('organizer.tournaments.destroy', $tournament->id) }}" method="POST"
                                    style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Apakah Anda yakin ingin menghapus tiket ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>

                        <!-- View Modal -->
                        <div class="modal fade" id="viewModal{{ $tournament->id }}" tabindex="-1"
                            aria-labelledby="viewModalLabel{{ $tournament->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="viewModalLabel{{ $tournament->id }}">Lihat Turnamen
                                        </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Tournament Name</label>
                                            <input type="text" class="form-control" value="{{ $tournament->name }}"
                                                readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Time</label>
                                            <input type="text" class="form-control" value="{{ $tournament->time }}"
                                                readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Description</label>
                                            <textarea class="form-control" readonly>{{ $tournament->description }}</textarea>
                                        </div>
                                        <div class="mb3">
                                            <label class="form-label">Venue</label>
                                            <input type="text" class="form-control"
                                                value="{{ $tournament->venue->name }}" readonly>
                                        </div>
                                        <div class="mb3">
                                            <label class="form-label">Image</label>
                                            <img src="{{ Storage::url('public/' . $tournament->image) }}" alt="Image"
                                                class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- Edit Modal -->
                        <div class="modal fade" id="editModal{{ $tournament->id }}" tabindex="-1"
                            aria-labelledby="editModalLabel{{ $tournament->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editModalLabel{{ $tournament->id }}">Edit Turnamen</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('organizer.tournaments.update', $tournament->id) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Nama Turnamen</label>
                                                <input type="text" class="form-control" id="name" name="name"
                                                    value="{{ $tournament->name }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="time" class="form-label">Waktu</label>
                                                <input type="datetime-local" class="form-control" id="time"
                                                    name="time" value="{{ $tournament->time }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="description" class="form-label">Deskripsi</label>
                                                <textarea class="form-control" id="description" name="description">{{ $tournament->description }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="venue_id" class="form-label">Venue</label>
                                                <select class="form-control" id="venue_id" name="venue_id">
                                                    @foreach ($venues as $venue)
                                                        <option value="{{ $venue->id }}">{{ $venue->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="image" class="form-label">Gambar</label>
                                                <input type="file" class="form-control" id="image"
                                                    name="image">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="7">Tidak ada turnamen.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Tambah Turnamen</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('organizer.tournaments.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Turnamen</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="time" class="form-label">Waktu</label>
                            <input type="datetime-local" class="form-control" id="time" name="time">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="venue_id" class="form-label">Venue</label>
                            <select class="form-control" id="venue_id" name="venue_id">
                                @foreach ($venues as $venue)
                                    <option value="{{ $venue->id }}">{{ $venue->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Turnamen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $tournaments->links() }}
    </div>
@endsection
