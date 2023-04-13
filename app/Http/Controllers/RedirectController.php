<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortUrl;

class RedirectController extends Controller
{
    // Method to redirect the user to the full URL when they visit a shortened URL
    public function redirect($shortLink)
    {   
        // Get the full URL from the database based on the short URL
        $shortUrl = ShortUrl::where('short_link', $shortLink)->first();
     
        // If the short URL doesn't exist, return a 404 error
        if (!$shortUrl) {
            abort(404);
        }

        // Redirect the user to the full URL
        return redirect($shortUrl->full_link);
    }
}
