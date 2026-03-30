<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function create_account(Request $request){

        $request->validate([
            'name'         => "required|string",
            'surname'      => "required|string",
            'email'        => "required|email",
            'password'     => "required|min:6",
            'profil'       => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'
        ]);

        // Upload vers Cloudinary
        //s'assurer d'avoir configuré les variables d'environnement CLOUDINARY_URL dans le fichier .env, d'avoir installé le package Cloudinary Laravel et d'avoir importé la façade Cloudinary en haut du fichier UserController.php, rendre public le provider de Cloudinary dans config/app.php, et d'avoir les bonnes permissions pour le dossier de stockage des images.

        $uploadedFileUrl = Cloudinary::upload(
        $request->file('profil')->getRealPath(),
        ['folder' => 'profils']
    )->getSecurePath();

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profil' => $uploadedFileUrl
        ]);

        return redirect('/login')->with(['password' => $request->password, 'email' => $request->email, 'message'=>'success']);
    }

    public function connexion(Request $request){
        $request->validate([
            'email' => "required|email",
            'password' => "required|min:6"
        ]);

        $user = User::where('email', $request->email)->first();

        if($user && Hash::check($request->password, $user->password)){
            auth()->login($user);

            $users = User::select('name', 'profil', 'id')->get();

            $tasks = $users->task;

            session(["users" => $users]);

            return redirect('dashboard')->with(['name' => $user->name, 'profil' => $user->profil, "tasks" => $tasks]);
        }else{
            return redirect('/login')->with(['error'=>'error']);
        }
    }

}
