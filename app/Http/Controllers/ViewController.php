<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    //
    public function change_view(Request $request, $view_name) {
        $allowedViews = [
            'recapitulatif',
            'task_gest',
            'task_priority',
            'comments',
            'notifications',
            'profil',
            'add_task'
        ];

        if (!in_array($view_name, $allowedViews)) {
            abort(404);
        }

        return view($view_name);
    }
}
