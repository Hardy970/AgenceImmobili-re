@extends('base')

@section('title','Se connecter')

@section("content")
    <div class=" container mt-4">
        <h1> @yield('title')</h1>
        @include('shared.flash')
        <form action="{{ route('login') }}" method="POST" class=" vstack gap-3">
            @csrf
            @include('shared.input',['type'=>'email','class'=>'col','label'=>'Email','name'=>'email'])
            @include('shared.input',['type'=>'password','class'=>'col','label'=>'Mot de passe ','name'=>'password',])

            <div>
                <button class="btn btn-primary"> @yield('title')</button>
            </div>
        </form>
    </div>
@endsection