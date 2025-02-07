@include('header')

<div>
    <h2>
        SERVICES - VASS</div>
    </h2>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($services as $service)
            <tr>
                <td>{{ $service->id }}</td>
                <td>{{ $service->name }}</td>
                <td>{{ $service->description }}</td>
            </tr>
        @endforeach

    </tbody>
</table> <br>
@include('footer')
