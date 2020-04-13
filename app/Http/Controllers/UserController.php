<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\ImageManagerStatic as Image;
use File;
class UserController extends Controller
{
    public function index(){
        $users = User::all();
        return view('users.index', ['users'=>$users]);
        //return $users; 
    }
    public function show(User $user){
        return View('users.perfil', compact('user'));
    }
    public function edit(User $user){
        return view('users.edit', compact('user'));
    }
    public function update(Request $request, User $user){
        //dd(Hash::make($request['old_password']));
        //$this->authorize('update', $user);
        if(Hash::check($request['old_password'], $user->password)){

            $validateData = $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users,id,'.$user->id],
                'password' => ['required', 'string', 'min:8', 'confirmed'],
                'avatar' => ['required','image','mimes:jpeg,bmp,png']
            ]);
            //para actualizar la imagen
            if (isset($request['avatar'])) {
                $avatar = $request['avatar'];
                $filename = time() . '.' . $avatar->getClientOriginalName();//para la extencion getClientOriginalEntension()
                $img = Image::make($avatar);
                // resize image to fixed size
                $img->resize(200, 200);
                $img->save(public_path().'/imgs/'. $filename);//si se quiere mas carpetas se debe crear la ruta mkdir($save_path, 666, true);
                //eliminando la foto antigua
                File::delete(public_path().'/imgs/'.$user['avatar']);
                
            }
            //aun falta proteger que solo el autor pueda editar
            $user->name = $validateData['name'];
            $user->email = $validateData['email'];
            $user->password = Hash::make($validateData['password']);
            $user->avatar= $filename;
            
            $user->save(); //insert
            $info = 'Tus datos fueron actualizados';
            return redirect('users/'.$user->id.'/edit')->with(compact('info'));
        }else{
            $error = 'La contraseña antigua es incorrecta';
            return redirect('users/'.$user->id.'/edit')->with(compact('error'));
        }

    }
}
