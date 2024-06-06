@extends('layout.template')
@section('title')
    Card
@endsection
@section('content')
    <table class="table table-warning table-bordered">
        <thead>
            <tr>
                <th scope="col">Transaction Id</th>
                <th scope="col">Account Id</th>
                <th scope="col">Transaction Type</th>
                <th scope="col">Amount</th>
                <th scope="col">Transaction_date</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
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
