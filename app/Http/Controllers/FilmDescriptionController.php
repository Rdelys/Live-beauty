<?php

namespace App\Http\Controllers;

use App\Models\FilmDescription;
use Illuminate\Http\Request;

class FilmDescriptionController extends Controller
{
    public function index()
    {
        $films = FilmDescription::all();
        return view('admin.films', compact('films'));
    }

    public function store(Request $request)
    {
        $request->validate(['description' => 'required']);
        FilmDescription::create($request->only('description'));

        return back()->with('success', 'Description ajoutée');
    }

    public function update(Request $request, $id)
    {
        $request->validate(['description' => 'required']);
        FilmDescription::findOrFail($id)->update($request->only('description'));

        return back()->with('success', 'Modifié avec succès');
    }

    public function destroy($id)
    {
        FilmDescription::findOrFail($id)->delete();

        return back()->with('success', 'Supprimé');
    }
}
