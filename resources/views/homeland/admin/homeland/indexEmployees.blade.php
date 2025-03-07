@extends('layouts.homeland')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <table id="tblProperties1">
                <thead>
                    <tr>
                        <th>#EMPLEADO</th>
                        <th>NOMBRE</th>
                        <th>EMAIL</th>
                        <th>GENERO</th>
                        <th>DEPARTAMENTO</th>
                        <th>SALARIO</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->id??'undefined' }}</td>
                        <td>{{ $employee->first_name??'undefined'}}</td>
                        <td>{{ $employee->email??'undefined'}}</td>
                        <td>{{ $employee->gender??'undefined' }}</td>
                        <td>{{ $employee->department??'undefined' }}</td>
                        <td>{{ $employee->salary??'undefined' }}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
