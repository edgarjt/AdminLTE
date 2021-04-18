<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function addUserView() {
        return view('users.add');
    }

    public function config() {
        return view('users.config');
    }

    public function setting(Request $request) {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.Auth::User()->id]
        ]);

        $user = Auth::User();
        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');

        $image = $request->file('avatar');

        if ($image) {
            $image_name = time().$image->getClientOriginalName();
            Storage::disk('users')->put($image_name, File::get($image));

            $user->avatar = $image_name;
        }

        $user->update();

        return redirect()->route('configUser')->with(['message' => 'Usuario actualizado correctamente.']);
    }

    public function getImage($filename) {
        $file = Storage::disk('users')->get($filename);
        return new Response($file, 200);
    }

    public function addUser(Request $request) {

        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required']
        ]);

        $user = new User();

        $user->name = $request->input('name');
        $user->surname = $request->input('surname');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->state = 0;
        $user->role = $request->input('role');

        $user->save();

        if ($user) {
            $users = User::all();
            return redirect()->route('getUsers', ['users' => $users])
                ->with(
                    ['message' => 'El usuario ' . $user->name . ' '. $user->surname . ' se registro con éxito.']
                );
        }


    }


    public function edit($id) {

        $data = User::findOrFail($id);

        if ($data->notification == 1) {
            $data->notification = 0;
            $data->update();
        }


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
