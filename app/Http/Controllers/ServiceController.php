<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        // Récupère tous les services
        $services = Service::all();

        // Passe la variable à la vue
        return view('services', compact('services'));
    }
}
