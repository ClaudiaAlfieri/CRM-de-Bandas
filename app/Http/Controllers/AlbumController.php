<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlbumController extends Controller
{
    //Função para ver todas os albums

    public function returnAllAlbumsView() {
        $allAlbums = DB::table('albums')->get();

        return view('albums.all_albums', compact('allAlbums'));
    }

     //Função para adicionar bandas

     public function returnAddAlbumsview(){
        $albums = DB::table('albums')->get();
        $bands = DB::table('bands')->get();
        return view('albums.add_albums', compact('albums', 'bands'));
    }

    public function createAlbums(Request $request){
    // Validação
    $request->validate([
        'photo' => 'nullable|image|max:2048',
        'name' => 'required|string|max:50',
        'band' => 'required|string|max:50',
        'releaseDate' => 'required|numeric',
    ]);

    $photoPath = null;
    if ($request->hasFile('photo')) {
        $photoPath = $request->file('photo')->store('albums', 'public');
    }

    // Obter o ID da banda com base no nome
    $bandId = DB::table('bands')->where('name', $request->band)->value('id');

    // Inserir Album na BD
    DB::table('albums')->insert([
        'photo' => $photoPath,
        'name' => $request->name,
        'band_id' => $bandId,
        'band_name' => $request->band,
        'releaseDate' => $request->releaseDate,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->route('albums')->with('message', 'Album created successfully!');
    }

    //Função para ver detalhes do album

    public function albumsView($id){
        $ourAlbum = DB::table('albums')->where('id', $id)->first();
        $bands = DB::table('bands')->get();

        return view('albums.albumsView', ['ourAlbum' => $ourAlbum, 'bands' => $bands]);
    }

     //Função para apagar um album

     public function deleteAlbum($id){

        Album::where('id', $id)->delete();

        return back();
    }

    //Função para editar um album

   public function updateAlbum(Request $request){
    $request->validate([
        'name' => 'required|string|max:50',
        'band' => 'required|integer|min:0',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'releaseDate' => 'required|string|max:50',
        ]);

    if ($request->hasFile('photo')) {
        if ($album->photo) {
            Storage::disk('public')->delete($album->photo);
        }

        $photoPath = $request->file('photo')->store('albums', 'public');
        $album->photo = $photoPath;
    }

    $album->name = $request->name;
    $album->band = $request->band;
    $album->releaseDate = $request->releaseDate;
    $album->save();

    return redirect()->route('albums')->with('message', 'Album updated successfully!');
}

}

