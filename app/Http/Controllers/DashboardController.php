<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {

        $userPosts = Post::where('user_id', auth()->id())
        ->latest()
        ->take(3)
        ->get();
        
        return view('dashboard.index', [
            
            'title'         => 'Home',
            'userPosts'     => $userPosts
        ]);
    }
}
