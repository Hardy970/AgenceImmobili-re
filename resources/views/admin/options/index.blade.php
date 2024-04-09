@extends('admin.admin_base')

@section('title','Les options')

@section('content')
    <div class="d-flex justify-content-between align-items-center ">
        <h1>@yield('title')</h1>
        <a href="{{ route('admin.option.create') }}" class="btn btn-primary ">Ajouter une option</a>
    </div>
    <table class=" table ">
        <thead>
            <tr>
                <th>Nom</th>
                <th class=" text-end ">Actions </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($options as $option )
                <tr>
                    <td>{{$option->name}}</td>
                    <td class="d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.option.edit',['option'=>$option->id]) }}" class=" btn btn-primary ">Editer</a>
                        <form action="{{ route('admin.option.destroy',['option'=>$option->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger " onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette option')" >Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection