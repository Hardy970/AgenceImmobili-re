@extends('base')

@section('title','HomePage')

@section('content')

<div class="px-4 py-5  text-center">
    <h1 class="display-5 fw-bold text-body-emphasis">Centered hero</h1>
    <div class="col-lg-6 mx-auto">
      <p class="lead">Quickly design and customize responsive mobile-first sites with Bootstrap, the world’s most popular front-end open source toolkit, featuring Sass variables and mixins.</p>
    </div>
  </div>

  <div class="container">
    <h2>Nos derniers biens</h2>
        <div class="row">
            @foreach ($properties as $property)
                <div class="col">@include('property.card')</div>
            @endforeach
        </div>
  </div>

@endsection