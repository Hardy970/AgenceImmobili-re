@extends('admin.admin_base')

@section( 'title','Les biens')

@section('content')
<div class="d-flex justify-content-between align-items-center ">
    <h2>@yield('title')</h2>
    <a href="{{ route('admin.property.create') }}" class="btn btn-primary">Ajouter un bien</a>
</div>
<table class="table  table-striped">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Surface</th>
            <th>Prix</th>
            <th>Ville</th>
            <th class=" text-end ">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($properties as $property)
        <tr>
            <td>{{ $property->title }}</td>
            <td>{{ $property->surface }} m²</td>
            <td>{{ number_format($property->price,thousands_separator:' ') }}</td>
            <td>{{ $property->city }}</td>
            <td>
                <div class="d-flex gap-2 justify-content-end ">
                    <a href="{{ route('admin.property.edit',['property'=>$property->id]) }}" class="btn btn-primary ">Editer</a>
                    <form action="{{ route('admin.property.destroy',['property'=>$property->id]) }}" method="POST"> 
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger ms-3" onclick='return confirm("Etes vous sûr de vouloir supprimer ce bien ?")'>Supprimer</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $properties->links() }}
@endsection