@extends('theme.index')

@section('content')
    <div class="container-fluid px-4 dark">
        <h1 class="mt-4">Turnamen</h1>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between">
                <div class="add">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createModal">
                        Tambah Turnamen
                    </button>
                </div>
                <div class="export">
                    <a class="btn btn-success" href="{{ route('organizer.tournaments.export') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20"
                            viewBox="0 0 50 50">
                            <path
                                d="M 28.875 0 C 28.855469 0.0078125 28.832031 0.0195313 28.8125 0.03125 L 0.8125 5.34375 C 0.335938 5.433594 -0.0078125 5.855469 0 6.34375 L 0 43.65625 C -0.0078125 44.144531 0.335938 44.566406 0.8125 44.65625 L 28.8125 49.96875 C 29.101563 50.023438 29.402344 49.949219 29.632813 49.761719 C 29.859375 49.574219 29.996094 49.296875 30 49 L 30 44 L 47 44 C 48.09375 44 49 43.09375 49 42 L 49 8 C 49 6.90625 48.09375 6 47 6 L 30 6 L 30 1 C 30.003906 0.710938 29.878906 0.4375 29.664063 0.246094 C 29.449219 0.0546875 29.160156 -0.0351563 28.875 0 Z M 28 2.1875 L 28 6.53125 C 27.867188 6.808594 27.867188 7.128906 28 7.40625 L 28 42.8125 C 27.972656 42.945313 27.972656 43.085938 28 43.21875 L 28 47.8125 L 2 42.84375 L 2 7.15625 Z M 30 8 L 47 8 L 47 42 L 30 42 L 30 37 L 34 37 L 34 35 L 30 35 L 30 29 L 34 29 L 34 27 L 30 27 L 30 22 L 34 22 L 34 20 L 30 20 L 30 15 L 34 15 L 34 13 L 30 13 Z M 36 13 L 36 15 L 44 15 L 44 13 Z M 6.6875 15.6875 L 12.15625 25.03125 L 6.1875 34.375 L 11.1875 34.375 L 14.4375 28.34375 C 14.664063 27.761719 14.8125 27.316406 14.875 27.03125 L 14.90625 27.03125 C 15.035156 27.640625 15.160156 28.054688 15.28125 28.28125 L 18.53125 34.375 L 23.5 34.375 L 17.75 24.9375 L 23.34375 15.6875 L 18.65625 15.6875 L 15.6875 21.21875 C 15.402344 21.941406 15.199219 22.511719 15.09375 22.875 L 15.0625 22.875 C 14.898438 22.265625 14.710938 21.722656 14.5 21.28125 L 11.8125 15.6875 Z M 36 20 L 36 22 L 44 22 L 44 20 Z M 36 27 L 36 29 L 44 29 L 44 27 Z M 36 35 L 36 37 L 44 37 L 44 35 Z">
                            </path>
                        </svg><span class="p-3">Export</span></a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class=" table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                        <form action="{{ route('organizer.tournaments.destroy', $tournament->id) }}"
                                            method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus turnamen ini?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                </div>


                <!-- View Modal -->
                <div class="modal fade" id="viewModal{{ $tournament->id }}" tabindex="-1"
                    aria-labelledby="viewModalLabel{{ $tournament->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewModalLabel{{ $tournament->id }}">Lihat
                                    Turnamen
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Tournament Name</label>
                                    <input type="text" class="form-control" value="{{ $tournament->name }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Time</label>
                                    <input type="text" class="form-control" value="{{ $tournament->time }}" readonly>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" readonly>{{ $tournament->description }}</textarea>
                                </div>
                                <div class="mb3">
                                    <label class="form-label">Venue</label>
                                    <input type="text" class="form-control" value="{{ $tournament->venue->name }}"
                                        readonly>
                                </div>
                                <div class="mb3">
                                    <label class="form-label">Image</label>
                                    <img src="{{ asset('storage/' . $tournament->image) }}" alt="Image"
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
                                <h5 class="modal-title" id="editModalLabel{{ $tournament->id }}">Edit
                                    Turnamen
                                </h5>
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
                                        <input type="datetime-local" class="form-control" id="time" name="time"
                                            value="{{ $tournament->time }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Deskripsi</label>
                                        <textarea class="form-control" id="description" name="description">{{ $tournament->description }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="venue_id" class="form-label">Venue</label>
                                        <select class="form-control" id="venue_id" name="venue_id">
                                            @foreach ($venues as $venue)
                                                <option value="{{ $venue->id }}">{{ $venue->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Gambar</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan
                                        Perubahan</button>
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
