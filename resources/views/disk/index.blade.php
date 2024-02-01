<!-- Heredamos el contenido base de layout -->
@extends('app.layout')
<!-- Seteamos el segundo titulo de la pagina -->
@section('title', 'Argo Disk List')
<!-- Aqui vamos a poner el contenido dinámico de nuestra página -->
@section('content')


<div class="table-responsive small">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">IdArtist</th>
                <th scope="col">Year</th>
                <th scope="col">Cover</th>
            </tr>
        </thead>
        <tbody>
            @foreach($disks as $disk)
                <tr>
                    <td>{{ $disk->id }}</td>
                    <td>{{ $disk->title }}</td>
                    <td>{{ $disk->idartist }} {{ $disk->artist->name }}</td>
                    <td>{{ $disk->year }}</td>
                    <td>
                        @if($disk->cover != null)
                            <img src="data:image/jpeg;base64,{{ $disk->cover }}">
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ url('disk/create')}}" class="btn btn-success">Add disk (no sense anymore)</a>
</div>
@endsection