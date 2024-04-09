@extends('admin.admin_base')

@section('title',$property->exists?'Modifier un bien':'Créer un bien')

@section('content')
<div class="container">
    <h1>@yield(('title'))</h1>
    <form class="vstack gap-2" method="post" action="{{ route($property->exists ? 'admin.property.update' :'admin.property.store',$property) }}">
        @csrf
        @method($property->exists? 'PUT' : 'POST')
        <div class="row">
            <div class="col row">
                @include('shared.input',['class'=>'col','label'=>'Titre', 'name'=>'title','value'=>$property ->title])
                @include('shared.input',['class'=>'col','name'=>'surface','value'=>$property ->surface,'type'=>'number'])
                @include('shared.input',['class'=>'col','name'=>'price','label'=>'Prix','value'=>$property ->price,'type'=>'number'])
            </div>
        </div>
        @include('shared.input',['name'=>'description','value'=>$property ->description,'type'=>'textarea'])
        <div class="row">
            @include('shared.input',['class'=>'col','label'=>'Pièces','name'=>'rooms','value'=>$property ->rooms,'type'=>'number'])
            @include('shared.input',['class'=>'col','label'=>'Chambres','name'=>'bedrooms','value'=>$property ->bedrooms,'type'=>'number'])
            @include('shared.input',['class'=>'col','label'=>'Etages','name'=>'floor','value'=>$property->floor,'type'=>'number'])
        </div>
        <div class="row">
            @include('shared.input',['class'=>'col','label'=>'Adresse','name'=>'address','value'=>$property ->address])
            @include('shared.input',['class'=>'col','label'=>'Ville','name'=>'city','value'=>$property ->city])
            @include('shared.input',['class'=>'col','label'=>'Code postal','name'=>'postal_code','value'=>$property->postal_code])
            @include('shared.select',['label'=>'Options ','name'=>'options','value'=>$property->options()->pluck('id'),'options'=>$options])
            @include('shared.checkbox',['label'=>'Vendu ','name'=>'sold','value'=>$property->sold])
        </div>
        <button class="btn btn-primary ">
            @if($property->exists)
            Modifier
            @else
            Créer
            @endif
        </button>
    </form>
@endsection
