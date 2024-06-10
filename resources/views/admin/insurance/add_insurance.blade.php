@extends('layout.template')
@section('title')
    admin
@endsection
@section('content')
    <div class="container pt-3">
        <h3>Tambah Asuransi</h3>
        <form action="/asuransi" method="POST">
            @csrf
            <div class="form-group">
                <label>Insurance's Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter insurance's name" required>
            </div>
            <div class="form-group">
                <label>Insurance's Cost</label>
                <input type="number" class="form-control" name="cost" placeholder="Enter insurance's cost" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
