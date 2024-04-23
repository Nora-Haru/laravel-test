<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthorController extends Controller
{
    public function index()
    {
        // Fetch all users who are authors
        $authors = User::all();

        // Pass the authors data to the view
        return view('dashboard.authors.index', compact('authors'));
    }
}
