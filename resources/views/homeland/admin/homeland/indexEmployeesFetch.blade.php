@extends('layouts.homeland')
@section('content')


<div class="container">
    <div class="row">
        <div class="col-8">
            <span>Selecciona geero para hacer busqueda</span>
            <select name="genero" id="genero" class="form-control select2">
                <option value="">All</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="non-binary">Non-binary</option>
            </select>
            </br>
            <button id="btnGetEmployeesUsingFetch" class="btn btn-info">Get Employees!</button>
            <table id="tblEmployees1">
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

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
