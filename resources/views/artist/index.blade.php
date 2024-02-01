<!-- Heredamos el contenido base de layout -->
@extends('app.layout')
<!-- Seteamos el segundo titulo de la pagina -->
@section('title', 'Argo Artist List')
<!-- Aqui vamos a poner el contenido dinámico de nuestra página -->
@section('content')


<div class="table-responsive small">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Disks</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($artists as $artist)
                <tr>
                    <td>{{ $artist->id }}</td>
                    <td>{{ $artist->name }}</td>
                    <td>
                        @foreach($artist->disks as $disk)
                            {{ $disk->title }}, 
                        @endforeach
                    </td>
                    <td>
                        <a href="{{ url('artist/' . $artist->id) }}" class="btn btn-info">Show</a>
                    </td>
            @endforeach
        </tbody>
    </table>
</div>
@endsection