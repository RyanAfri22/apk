@extends('layout.template')
@section('title')
    Card
@endsection
@section('content')
    <table class="table table-warning table-bordered">
        <thead>
            <tr>
                <th scope="col">Card Id</th>
                <th scope="col">Account Id</th>
                <th scope="col">Card Number</th>
                <th scope="col">Card Type</th>
                <th scope="col">Expiry Date</th>
                <th scope="col">Cvv</th>
                <th scope="col">Pin</th>
                <th scope="col">Is Block</th>
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
                <td>@mdo</td>
            </tr>
        </tbody>
    </table>
@endsection
