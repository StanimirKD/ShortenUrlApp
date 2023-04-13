<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\ShortUrl;
use Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class ShortUrlController extends Controller
{
    // Show form to create new short URL
    public function create()
    {
        return view('shorturls.create');
    }

    // Store a new short URL in the database
    public function store(Request $request)
    {
        try {
            // Validate user input
            $validatedData = $request->validate([
                'full_link' => 'required|url|max:255',
            ]);

            // Generate short link
            $shortLink = Str::random(6);

            // Create new ShortUrl record
            $shortUrl = new ShortUrl();

            // Set the ID of the user who created the short URL
            $shortUrl -> id=Auth::id();

            // Determine the maximum ID in the user_links table and add 1 to generate a new ID
            $maxId = DB::table('user_links')->max('id');
            $shortUrl->id = $maxId+1;

            // Set the short link and full link for the new record
            $shortUrl->short_link = $shortLink;
            $shortUrl->full_link = $validatedData['full_link'];
            $shortUrl->save();

            // Set success message in session
            $request->session()->flash('success', 'Short URL created successfully!');

            // Redirect back to same page
            return redirect()->back();
        } catch (ValidationException $exception) {
            // Retrieve and display the validation errors
            $errors = $exception->validator->errors()->all();
            dd($errors);
        }
    }

    // Show form to edit an existing short URL
    public function edit($id)
    {
        $shortUrl = ShortUrl::findOrFail($id);
        return view('shorturls.edit', compact('shortUrl'));
    }

    // Update an existing short URL in the database
    public function update(Request $request, $id)
    {
        // Validate user input
        $validatedData = $request->validate([
            'full_link' => 'required|url|max:255',
        ]);

        // Find the ShortUrl record to update
        $shortUrl = ShortUrl::findOrFail($id);

        // Update the full link for the record
        $shortUrl->full_link = $validatedData['full_link'];
        $shortUrl->save();

        // Redirect back to the dashboard with a success message
        return redirect()->route('dashboard')->with('success', 'Short URL updated successfully!');
    }

    // Delete an existing short URL from the database
    public function destroy($id)
    {
        // Find the ShortUrl record to delete
        $shortUrl = ShortUrl::findOrFail($id);

        // Delete the record from the database
        $shortUrl->delete();

        // Redirect back to the dashboard with a success message
        return redirect()->route('dashboard')->with('success', 'Short URL deleted successfully!');
    }
}
