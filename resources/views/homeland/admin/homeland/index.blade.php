@extends('layouts.homeland')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <table id="tblProperties1">
                <thead>
                    <tr>
                        <th>ADDRESS</th>
                        <th>PRICE</th>
                        <th>LINTING TYPE</th>
                        <th>OFFER TYPE</th>
                        <th>CITY</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($properties as $property)
                    <tr>
                        <td>{{ $property->address }}</td>
                        <td>{{ $property->price }}</td>
                        <td>{{ $property->list_type->name}}</td>
                        <td>{{ $property->offer_type }}</td>
                        <td>{{ $property->city->name }}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            <h2>PROPERTIES WITH AJAX</h2>
            <table id="tblProperties2">
                <thead>
                    <tr>
                        <th>ADDRESS</th>
                        <th>PRICE</th>
                        <th>LINTING TYPE</th>
                        <th>OFFER TYPE</th>
                        <th>CITY</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
