<?php

namespace App\Http\Controllers\Admin;

use App\Models\Option;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyFormRequest;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties=Property::orderBy('created_at','desc')->paginate(2);
        return  view('admin.properties.index',['properties'=>$properties]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $property=new Property();
        $property->fill([
            'title'=>'Mon titre ',
            'surface'=>20,
            'description'=>'ma description ...',
            'price'=>50000,
            'city'=>'Cotonou',
            'address'=>'1234 Rue de l\'océan',
            'rooms'=>4,
            'bedrooms'=>2,
            'floor'=>1,
            'sold'=>false,
            'postal_code'=>'229'
        ]);
        return view('admin.properties.form',['property'=>$property,'options'=>Option::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PropertyFormRequest $request)
    {
        $property=Property::create($request->validated());
        $property->options()->sync($request->validated('options'));
        return to_route('admin.property.index')->with('success','Le bien a bien été créé');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        return view('admin.properties.form',['property'=>$property,'options'=>Option::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyFormRequest $request, Property $property)
    {
        $property->update($request->validated());
        $property->options()->sync($request->validated('options'));
        return to_route('admin.property.index')->with('success','Le bien a été modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        $property->delete();
        return to_route('admin.property.index')->with('success','Le bien a été supprimé avec succès');
    }
}
