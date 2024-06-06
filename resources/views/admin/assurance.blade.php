@extends('layout.template')
@section('title')
    admin
@endsection
@section('content')
    <table class="table table-warning table-bordered">
        <thead>
            <tr>
                <th scope="col">Payment Id</th>
                <th scope="col">User Id</th>
                <th scope="col">Insurance Company</th>
                <th scope="col">Amount</th>
                <th scope="col">Due Date</th>
                <th scope="col">Payment Date</th>
                <th scope="col">AStatus</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
                <td>@mdo</td>
            </tr>
        </tbody>
    </table>
@endsection
