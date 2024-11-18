<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image_url',
        'published_year',
        'is_showing',
        'description',
    ];

    public function registerMovie($request)
    {
        return $this->create([
            'title' => $request->title,
            'image_url' => $request->image_url,
            'published_year' => $request->published_year,
            'is_showing' => $request->is_showing,
            'description' => $request->description,
        ]);
    }

    public function updateMovie($request, $id)
    {
        return $this->find($id)->update([
            'title' => $request->title,
            'image_url' => $request->image_url,
            'published_year' => $request->published_year,
            'is_showing' => $request->is_showing,
            'description' => $request->description,
        ]);
    }

    public function deleteMovie($id)
    {
        return $this->find($id)->delete();
    }
}
