@extends('theme.index')

@section('content')
    <div class="container">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <h1>Daftar Tiket</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#createTicketModal">Tambah
                    Tiket</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if ($tickets->count())
                        <table class=" table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tournament</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tickets as $ticket)
                                    <tr>
                                        <td>{{ $ticket->id }}</td>
                                        <td>{{ $ticket->tournament->name }}</td>
                                        <td>{{ $ticket->price }}</td>
                                        <td>{{ $ticket->stock }}</td>
                                        <td>
                                            <button class="btn btn-info" data-toggle="modal"
                                                data-target="#viewTicketModal{{ $ticket->id }}">Lihat</button>
                                            <button class="btn btn-warning" data-toggle="modal"
                                                data-target="#editTicketModal{{ $ticket->id }}">Edit</button>
                                            <form action="{{ route('organizer.tickets.destroy', $ticket->id) }}"
                                                method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus tiket ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- View Modal -->
                                    <div class="modal fade" id="viewTicketModal{{ $ticket->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="viewTicketModalLabel{{ $ticket->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="viewTicketModalLabel{{ $ticket->id }}">
                                                        Detail
                                                        Tiket
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label class="form-label">ID</label>
                                                        <p>{{ $ticket->id }}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Tournament ID</label>
                                                        <p>{{ $ticket->tournament_id }}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Harga</label>
                                                        <p>{{ $ticket->price }}</p>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Stok</label>
                                                        <p>{{ $ticket->stock }}</p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Kembali</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Edit Modal -->
                                    <div class="modal fade" id="editTicketModal{{ $ticket->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="editTicketModalLabel{{ $ticket->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editTicketModalLabel{{ $ticket->id }}">
                                                        Edit
                                                        Tiket
                                                    </h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('organizer.tickets.update', $ticket->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <input type="hidden" class="form-control" id="tournament_id"
                                                                name="tournament_id" value="{{ $ticket->tournament_id }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="price" class="form-label">Harga</label>
                                                            <input type="text" class="form-control" id="price"
                                                                name="price" value="{{ $ticket->price }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="stock" class="form-label">Stok</label>
                                                            <input type="text" class="form-control" id="stock"
                                                                name="stock" value="{{ $ticket->stock }}">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Update
                                                            Tiket</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>Tidak ada tiket yang tersedia.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="createTicketModal" tabindex="-1" role="dialog"
        aria-labelledby="createTicketModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createTicketModalLabel">Tambah Tiket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('organizer.tickets.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="tournament_id" class="form-label">Tournament</label>
                            <select class="form-control" name="tournament_id" id="tournament_id" required>
                                @foreach ($tournaments as $tournament)
                                    <option value="{{ $tournament->id }}">{{ $tournament->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Harga</label>
                            <input type="text" class="form-control" id="price" name="price">
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stok</label>
                            <input type="text" class="form-control" id="stock" name="stock">
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Tiket</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center mt-3">
        {{ $tickets->links() }}
    </div>
@endsection
