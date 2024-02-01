<!-- Heredamos el contenido base de layout -->
@extends('app.layout')
<!-- Seteamos el segundo titulo de la pagina -->
@section('title', 'Argo Artist Paginate List')
<!-- Aqui vamos a poner el contenido dinámico de nuestra página -->
@section('content')

<div>
    <form action="" class="d-flex">
        <div class="form-group">
            <select class="form-select" name="rowPerPage" id="rowPerPage">
                @foreach($rpps as $index => $value)
                    <option value="{{ $index }}" {{ $rpp == $index ? 'selected' : '' }}>{{ $value }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" class="btn btn-primary" value="Submit"/>
    </form>
</div>
<div class="table-responsive small">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($artists as $artist)
                <tr>
                    <td>{{ $artist->id }}</td>
                    <td>{{ $artist->name }}</td>
                    <td>
                        <a href="{{ url('artist/' . $artist->id) }}" class="btn btn-info">Show</a>
                    </td>
            @endforeach
        </tbody>
    </table>
</div>
<div>
    <nav>
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="{{ url('') }}/paginateartist2?rowPerPage={{$rpp}}&amp;page={{ $page <= 1 ? $page : ($page - 1) }}" rel="prev" aria-label="« Previous">‹</a>
            </li>
            
            @for ($i = 1; $i <= $totalPages; $i++)
                @if($i <= 2 && $i < ($page - 2))
                    <li class="page-item">
                        <a class="page-link" href="{{ url('') }}/paginateartist2?rowPerPage={{$rpp}}&amp;page={{$i}}">{{$i}}</a>
                    </li>
                @endif
                
                @if($i == 3 && $i < ($page - 2))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
                @endif
                
                @if($i < $page && $i >= ($page - 2))
                    <li class="page-item">
                        <a class="page-link" href="{{ url('') }}/paginateartist2?rowPerPage={{$rpp}}&amp;page={{$i}}">{{$i}}</a>
                    </li>
                @endif
                
                @if($i == $page) 
                    <li class="page-item active">
                        <a class="page-link" href="{{ url('') }}/paginateartist2?rowPerPage={{$rpp}}&amp;page={{$page}}">{{$page}}</a>
                    </li>
                @endif
                
                @if($i > $page && $i <= ($page + 2))
                    <li class="page-item">
                        <a class="page-link" href="{{ url('') }}/paginateartist2?rowPerPage={{$rpp}}&amp;page={{$i}}">{{$i}}</a>
                    </li>
                @endif
                
                @if($i == ($totalPages - 2) && $i > ($page + 2))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">...</span></li>
                @endif
                
                @if($i > ($totalPages - 2) && $i > ($page + 2))
                    <li class="page-item">
                        <a class="page-link" href="{{ url('') }}/paginateartist2?rowPerPage={{$rpp}}&amp;page={{$i}}">{{$i}}</a>
                    </li>
                @endif
            @endfor
            
            <li class="page-item">
                <a class="page-link" href="{{ url('') }}/paginateartist2?rowPerPage={{$rpp}}&amp;page={{ $page == $totalPages ? $page : ($page + 1) }}" rel="next" aria-label="Next »">›</a>
            </li>
        </ul>
    </nav>
</div>
@endsection