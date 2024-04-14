<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Mail\PropertyContactMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\PropertyContactRequest;
use App\Http\Requests\SearchPropertiesRequest;

class PropertiesController extends Controller
{
    public function index(SearchPropertiesRequest $request)
    {
        $query=Property::query()->available()->recent();
        //si l'utilisateur a entré un prix maximal ajouter la condition
        if($request->validated('price')){
        $query->where('price','<=',$request->validated('price'));
        }
        //si l'utilisateur a entré une surface minimale ajouter la condition
        if($request->validated('surface')){
            $query->where('surface','>=',$request->validated('surface'));
            }
        //si l'utilisateur a entré un nombre de pièce minimal ajouter la condition
        if($request->validated('rooms')){
            $query->where('rooms','>=',$request->validated('rooms'));
            }

            //si l'utilisateur a entré un nombre de pièce minimal ajouter la condition
        if($request->validated('title')){
            $query->where('title','like',"%{$request->validated('title')}%");
            }

        $properties=$query->paginate(16);
        return view('property.index',['properties'=>$properties,'value'=>$request->validated()]);
    }
    public function show(string $slug,Property $property)
    {
        if($slug != $property->getSlug())
        {
            return to_route('property.show',['slug'=>$property->getSlug(),'property'=>$property]);
        }
        return view('property.show',['property'=>$property]);
    }
    public function contact(PropertyContactRequest $request ,Property $property)
    {
        Mail::send(new PropertyContactMail($property,$request->validated()));
        return back()->with('success','Votre demande de contact a bien été envoyée');
    }
}
