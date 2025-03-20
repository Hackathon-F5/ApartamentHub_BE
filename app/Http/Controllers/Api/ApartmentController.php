<?php

namespace App\Http\Controllers\Api;

use App\Models\Tag;
use App\Models\Picture;
use App\Models\Apartment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apartments = Apartment::with(['tags', 'pictures'])->get();
        return response()->json($apartments, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'address'     => 'required|string|max:255',
            'description' => 'nullable|string',
            'availability'=> 'required|boolean',
            'people'      => 'required|integer|min:1',
            'tags'        => 'array',
            'tags.*'      => 'string',
            'pictures'    => 'array',
            'pictures.*'  => 'string|url',
        ]);

        $apartment = Apartment::create([
            'name'        => $request->name,
            'address'     => $request->address,
            'description' => $request->description,
            'availability'=> $request->availability,
            'people'      => $request->people,
        ]);

        if (!empty($request->tags)) {
            $tagIds = [];
            foreach ($request->tags as $tagName) {
                $tag = Tag::firstOrCreate(['name' => $tagName]);
                $tagIds[] = $tag->id;
            }
            $apartment->tags()->attach($tagIds);
        }

        if (!empty($request->pictures)) {
            $pictureIds = [];
            foreach ($request->pictures as $pictureUrl) {
                $picture = Picture::firstOrCreate(['url' => $pictureUrl]);
                $pictureIds[] = $picture->id;
            }
            $apartment->pictures()->attach($pictureIds);
        }

        return response()->json($apartment->load(['tags', 'pictures']), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $apartment = Apartment::with(['tags', 'pictures'])->find($id);
        return response()->json($apartment, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
