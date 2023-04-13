<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortUrl;

class DashboardController extends Controller
{
    public function index()
    {
        // Get the authenticated user
        $user = auth()->user();

        // Get all the short URLs for the authenticated user
        $shortUrls = ShortUrl::all();

        // Return the dashboard view with the short URLs
        return view('dashboard', compact('shortUrls'));
    }
}

?>
