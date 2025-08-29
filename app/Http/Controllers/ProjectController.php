<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Liste de tous les projets avec pagination, recherche et catégorie
    public function index(Request $request)
    {
        // On récupère recherche et catégorie
        $search = $request->input('search');
        $categoryId = $request->input('category');

        // Query de base
        $query = Project::with('category');

        // Si recherche
        if ($search) {
            $query->where('title', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
        }

        // Si catégorie
        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        // Résultats avec pagination
        $projects = $query->paginate(6)->withQueryString();

        // Récupère toutes les catégories
        $categories = Category::all();

        return view('projets', compact('projects', 'categories', 'search', 'categoryId'));
    }

    // Détail d’un projet
    public function show($id)
    {
        $project = Project::with('category')->findOrFail($id);
        return view('projet-detail', compact('project'));
    }
}
