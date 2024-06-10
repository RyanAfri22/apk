@extends('layout.template')
@section('title')
    admin
@endsection
@section('content')
    <div class="container pt-3">
        <h3>Data User</h3>
        @if (session('success'))
            <div class="alert alert-primary">
                {{ session('success') }}
            </div>
        @endif
        <table class="table table-warning table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->email }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#modal-default-{{ $item->user_id }}">Kirim Pengingat</button>
                        </td>
                    </tr>
                    <!-- Modal -->
                    <div class="modal fade" id="modal-default-{{ $item->user_id }}">
                        <div class="modal-dialog">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Form Pengingat</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="/pengingat" method="post">
                                    @csrf
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input type="hidden" value="{{ $item->user_id }}" name="user_id">
                                            <label>Pilih asuransi yang ingin diingatkan</label>
                                            <select name="insurance" class="form-control" required>
                                                <option value="">Pilih asuransi</option>
                                                @foreach ($insurance as $item)
                                                    <option value="{{ $item->insurance_id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Kirim Pengingat</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
