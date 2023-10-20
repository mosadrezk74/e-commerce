<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        // Validate the request
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Upload the image
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/images', $imageName);

        // Save the image information to the database
        $image = new Image();
        $image->name = $imageName;
        $image->path = 'storage/images/' . $imageName;
        $image->save();

        // Return a success response
        return response()->json([
            'success' => true,
            'message' => 'Image uploaded successfully!',
            'image' => $image,
        ]);
    }
}
