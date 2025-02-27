@extends('pages.dashboard')

@section('content')
    <div class="container-fluid">
        <h1>Jadwal Piket</h1>
        <button type="button" class="btn btn-primary waves-effect waves-light mb-3" data-toggle="modal"
            data-target="#createModal">
            Create
        </button>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="scroll-horizontal-datatable" class="table w-100 nowrap">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Hari</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($piket as $data)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $data->student_name }}</td>
                                        <td>{{ $data->day }}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning waves-effect waves-light"
                                                data-toggle="modal" data-target="#editModal{{ $data->id }}">
                                                Edit
                                            </button>
                                            <button type="button" class="btn btn-danger waves-effect waves-light"
                                                data-toggle="modal" data-target="#deleteModal{{ $data->id }}">
                                                Delete
                                            </button>
                                        </td>
                                    </tr>


                                    {{-- MODAL EDIT --}}
                                    <div id="editModal{{ $data->id }}" class="modal fade" tabindex="-1" role="dialog"
                                        aria-labelledby="editModalLabel{{ $data->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="editModalLabel{{ $data->id }}">Edit Item
                                                    </h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">×</button>
                                                </div>
                                                <form action="{{ route('jadwal-piket.update', $data->id) }}"
                                                    enctype="multipart/form-data" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="student_name">Nama</label>
                                                            <input type="text" id="student_name" name="student_name"
                                                                class="form-control"
                                                                value="{{ old('student_name', $data->student_name) }}">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="day" class="text-white">Hari</label>
                                                            <select name="day" id="day" class="form-control">
                                                                <option value="Monday"
                                                                    {{ old('day', $data->day) == 'Monday' ? 'selected' : '' }}>
                                                                    Senin
                                                                </option>
                                                                <option value="Tuesday"
                                                                    {{ old('day', $data->day) == 'Tuesday' ? 'selected' : '' }}>
                                                                    Selasa
                                                                </option>
                                                                <option value="Wednesday"
                                                                    {{ old('day', $data->day) == 'Wednesday' ? 'selected' : '' }}>
                                                                    Rabu
                                                                </option>
                                                                <option value="Thursday"
                                                                    {{ old('day', $data->day) == 'Thursday' ? 'selected' : '' }}>
                                                                    Kamis
                                                                </option>
                                                                <option value="Friday"
                                                                    {{ old('day', $data->day) == 'Friday' ? 'selected' : '' }}>
                                                                    Jumat
                                                                </option>
                                                                <option value="Saturday"
                                                                    {{ old('day', $data->day) == 'Saturday' ? 'selected' : '' }}>
                                                                    Sabtu
                                                                </option>
                                                            </select>
                                                        </div>


                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary waves-effect"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit"
                                                            class="btn btn-primary waves-effect waves-light">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- MODAL DELETE --}}
                                    <div id="deleteModal{{ $data->id }}" class="modal fade" tabindex="-1"
                                        role="dialog" aria-labelledby="deleteModalLabel{{ $data->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="deleteModalLabel{{ $data->id }}">
                                                        Confirm Delete
                                                    </h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-hidden="true">×</button>
                                                </div>

                                                <div class="modal-body">
                                                    <p>Apa anda yakin siswa "{{ $data->student_name }}"</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('jadwal-piket.destroy', $data->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="btn btn-secondary waves-effect"
                                                            data-dismiss="modal">Close</button>
                                                        <button type="submit"
                                                            class="btn btn-primary waves-effect waves-light">Delete</button>
                                                    </form>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-3 d-flex justify-content-center">
                            {{ $piket->links('pagination::bootstrap-4') }}
                        </div>




                        {{-- modal CREATE --}}
                        <div id="createModal" class="modal fade" tabindex="-1" role="dialog"
                            aria-labelledby="createModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" id="createModalLabel">Create Item</h4>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-hidden="true">×</button>
                                    </div>
                                    <form action="{{ route('jadwal-piket.store') }}" enctype="multipart/form-data"
                                        method="POST">
                                        @csrf
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="student_name">Nama</label>
                                                <input type="text" id="student_name" name="student_name"
                                                    class="form-control" value="{{ old('student_name') }}">
                                            </div>
                                            <div class="mb-3">
                                                <label for="day" class="text-white">Hari</label>
                                                <select name="day" id="day" class="form-control">
                                                    <option value="Monday">Senin</option>
                                                    <option value="Tuesday">Selasa</option>
                                                    <option value="Wednesday">Rabu</option>
                                                    <option value="Thursday">Kamis</option>
                                                    <option value="Friday">Jumat</option>
                                                    <option value="Saturday">Sabtu</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary waves-effect"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit"
                                                class="btn btn-primary waves-effect waves-light">Create</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
