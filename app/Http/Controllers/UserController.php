<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


    public function edit($id) {

        $data = User::findOrFail($id);

        return view('users.update', compact('data'));
    }

    public function update(Request $request) {

         $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($request->id)],
            'state' => ['required'],
            'role' => ['required']
        ]);

        $user = User::findOrFail($request->id);

        $user->name = $request->name;
        $user->surname = $request->surname;
        $user->email = $request->email;
        $user->state = $request->state;
        $user->role = $request->role;

        // Guardamos en base de datos
        $user->update();

        $users = User::all();

        return redirect()->route('getUsers', ['users' => $users])->with(
            ['message' => 'El usuario '.$user->name.' '.$user->surname.' se actualizo con éxito.']
        );

    }

    public function delete($id) {
        $user = User::findOrFail($id);
        $user->delete($user);

        $users = User::all();

        return redirect()->route('getUsers', ['users' => $users])->with(
            ['message' => 'El usuario '.$user->name.' '.$user->surname.' se elimino con éxito.']
        );

    }
}
