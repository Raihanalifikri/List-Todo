@extends('layouts.parent')
@section('content')
    <div class="section dashboard">
        <div class="col-xxl-4 col-xl-12">
revenue
customer

            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Todo List <span></span></h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon  rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-card-list"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $todoList }}</h6>
                            <span class="text-danger small pt-1 fw-bold">Buatlah List</span> <span
                                class="text-muted small pt-2 ps-1">Yang ingin kamu Lakukan</span>
                        </div>
                    </div>

                </div>
                <div class="mx-3">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTodo">
                        Basic Modal
                    </button>
                    @include('pages.modal-create')
                </div>
            </div>
        </div>
    </div><!-- End Customers Card -->
    </div>



    <div class="card">
        <div class="card-body">
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Keinginan</th>
                        <th>status</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($todo as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->keinginan }}</td>
                            <td>{{ $row->status }}</td>
                            <td>
                                <button class="btn btn-warning" type="submit" data-bs-toggle="modal"
                                    data-bs-target="#editModal{{ $row->id }}">
                                    <i class="bi bi-pencil"></i>
                                </button>

                                <form action="{{ route('todo.destroy', $row->id) }}" method="post" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @include('pages.modal-edit')
                    @empty
                        <tr>
                            <td colspan="5">Belum ada data yang di isi</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
@endsection
