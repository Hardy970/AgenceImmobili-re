@extends('base')

@section('title','Tous nos biens ')

@section('content')

    <div class=" bg-light p-5 mb-5 text-center ">
        <form action="" method="get" class=" d-flex gap-2 container ">
            <input type="number" class="form-control" placeholder="Surface minimum" name="surface" value="{{$value['surface']??'' }}" >
            <input type="number" class="form-control" placeholder="Nombre de pièce min" name="rooms" value="{{$value['rooms']??'' }}" >
            <input type="number" class="form-control" placeholder="Budget max" name="price" value="{{$value['price']??'' }}" >
            <input class="form-control" placeholder="Mot clef" name="title" value="{{$value['title']??'' }}" >
            <button class="btn btn-primary btn-sm flex-grow-0">Rechercher</button>
        </form>
    </div>

    <div class="container">
        <div class="row">
            @forelse ($properties as $property )
                <div class="col-3 mb-4">
                    @include('property.card')
                </div>

                @empty
                <div class="col">
                    Aucun bien ne correspond  à votre recherche
                </div>
            @endforelse
        </div>
        {{-- Pagination --}}
        <div >
            {{$properties->links() }}
        </div>
    </div>
@endsection