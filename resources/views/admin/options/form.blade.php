@extends('admin.admin_base')

@section('title',$option->exists?'Modifier une option':'Créer une option')

@section('content')
    <h1>@yield('title')</h1>

    <form action="{{ route($option->exists?'admin.option.update':'admin.option.store',['option'=>$option->id]) }}" method="post" class=" form">
        @csrf
        @method( $option->exists ?'put':'post')
        @include('shared.input',['label'=>'Nom:','name'=>'name','value'=>$option->name])
        <button class="btn btn-primary mt-3">
            @if($option->exists)
            Modifier
            @else
            Créer
            @endif
        </button>
    </form>
@endsection