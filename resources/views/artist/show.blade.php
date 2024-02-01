<!-- Heredamos el contenido base de layout -->
@extends('app.layout')
<!-- Seteamos el segundo titulo de la pagina -->
@section('title', 'Argo Artist')
<!-- Aqui vamos a poner el contenido dinámico de nuestra página -->
@section('content')
<div class="table-responsive small">
    <table class="table table-striped table-sm">
        <tbody>
            <tr>
                <td>#</td>
                <td>{{ $artist->id }}</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>{{ $artist->name }}</td>
            </tr>
            <tr>
                <td>Disks</td>
                <td>
                    @foreach($artist->disks as $disk)
                        {{ $disk->title }}, 
                    @endforeach
                </td>
            </tr>
        </tbody>
    </table>
    <a href="{{ url('disk/create?idartist=' . $artist->id) }}" class="btn btn-success">Add disk</a>
    <a href="{{ url('disk/create/' . $artist->id) }}" class="btn btn-success">Add disk bonito</a>
</div>
@endsection