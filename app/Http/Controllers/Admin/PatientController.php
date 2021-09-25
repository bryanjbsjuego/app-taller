<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\Controller;

class PatientController extends Controller
{
    
    public function index()
    {
        $patients = User::patients()->paginate(1);
        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
            'name' => 'required|min:3',
            'email' => 'required|email',
            'cedula' => 'nullable|digits:8',
            'address' => 'nullable|min:5',
            'phone' => 'nullable|min:6'

        ];
        $this->validate($request,$rules);
        //mass assigment--asignación masiva
        User::create(
            $request->only('name','email','cedula','address','phone')
            + [
                'role' => 'patient',
                'password' => bcrypt($request->input('password'))
            ]
        );
        $notification="El paciente se ha registrado correctamente.";
        return redirect('/patients')->with(compact('notification'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    
    public function edit(User $patient)
    {
        return view('patients.edit',compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules=[
            'name' => 'required|min:3',
            'email' => 'required|email',
            'cedula' => 'nullable|digits:8',
            'address' => 'nullable|min:5',
            'phone' => 'nullable|min:6'

        ];
        $this->validate($request,$rules);
        //mass assigment--asignación masiva
        $user=User::patients()->findOrFail($id);
        $data=$request->only('name','email','cedula','address','phone');
        $password=$request->input('password');
        if($password)
            $data['password'] = bcrypt($password);
        $user->fill($data);
        $user->save(); // Update
        $notification="La información del paciente se ha actualizado correctamente.";
        return redirect('/patients')->with(compact('notification'));
    }

    
    public function destroy(User $patient)
    {
        $patientName=$patient->name;
        $patient->delete();
        $notification="El paciente $patientName se ha eliminado correctamte.";
        return redirect('/patients')->with(compact('notification'));
    }
}
