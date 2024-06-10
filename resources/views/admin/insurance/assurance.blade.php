@extends('layout.template')
@section('title')
    admin
@endsection
@section('content')
    <div class="container pt-3">
        <h3>List Asuransi</h3>
        <a class="btn btn-primary float-right my-3" href="/asuransi/create">Tambah Asuransi</a>
        <table class="table table-warning table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Cost</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $item->name }}</td>
                        <td>Rp {{ number_format($item->cost, 2, ',', '.') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
