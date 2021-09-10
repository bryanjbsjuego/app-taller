<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Speciality;

class SpecialityController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(){
        $specialties = Speciality::all();
        return view('specialties.index',compact('specialties'));
    }
    public function create(){
        return view('specialties.create');
    }
    
    private function perfomValidation(Request $request){
        $rules=[
            'name' => 'required|min:3'
        ];
        $messages=[
            'name.required' => 'El campo nombre es obligatorio.',
            'name.min' => 'El campo nombre debe tener mínimo 3 caracteres.'
        ];

        $this->validate($request,$rules,$messages);
    }

    public function store(Request $request){
        //dd($request->all()); Sirve para imprimir la información enviada por el formulario
    
        $this->perfomValidation($request);
        $specialty= new Speciality();
        $specialty->name=$request->input('name');
        $specialty->description=$request->input('description');
       //Realizar el insert a la base de datos
        $specialty->save();
        $notification='La especialidad se ha registrado correctamente.';
        return redirect('/specialties')->with(compact('notification'));
    }

    public function edit(Speciality $specialty){
        
        return view('specialties.edit', compact('specialty'));
    }

    public function update(Request $request, Speciality $specialty ){
        //dd($request->all()); Sirve para imprimir la información enviada por el formulario
        
        $this->perfomValidation($request);
        $specialty->name=$request->input('name');
        $specialty->description=$request->input('description');
       //Realizar el insert a la base de datos
        $specialty->save();
        $notification="La especialidad se ha actualizado correctamente.";
        return redirect('/specialties')->with(compact('notification'));
        
    }

    public function destroy(Speciality $specialty){
        $deleteName=$specialty->name;
        $specialty->delete();
        $notification='La especialidad '.$deleteName.' se ha eliminado correctamente.';
        return redirect('/specialties')->with(compact('notification'));
    }

    
}
