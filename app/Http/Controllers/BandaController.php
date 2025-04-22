<?php

namespace App\Http\Controllers;

use App\Models\Band;
use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BandaController extends Controller
{
    //Função para ver todas as bandas

    public function returnAllBandsView() {
        $allBands = DB::table('bands')->get();

        return view('bands.all_bands', compact('allBands'));
    }

    //Função para adicionar bandas

    public function returnAddBandsview(){
        $bands = DB::table('bands')->get();
        return view('bands.add_bands', compact('bands'));
    }

    public function createBands(Request $request)
    {
        // Validação
        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:50',
            'albums' => 'required|integer',
        ]);

        $photoPath = null;
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('bands', 'public');
        }


        // Inserir banda
        Band::create([
            'photo' => $photoPath,
            'name' => $request->name,
            'albums' => $request->albums,
        ]);

        return redirect()->route('bands')->with('message', 'Band added successfully!');
    }

    //Função para ver/editar detalhes da banda

    public function bandsView($id){
        $ourBand = DB::table('bands')->where('id', $id)->first();

        return view('bands.bandsView', ['ourBand' => $ourBand]);
    }


    //Função para apagar uma banda

    public function deleteBand($id){

        Band::where('id', $id)->delete();

        return back();
    }

     //Função para editar uma banda

     public function updateBand(Request $request){
        $request->validate([
            'name' => 'required|string|max:50',
            'albums' => 'required|integer|min:0',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        //Se achar a banda atualiza, se não achar encerra a função
        $band = Band::findOrFail($request->id);

        if ($request->hasFile('photo')) {
            if ($band->photo) {
                Storage::disk('public')->delete($band->photo);
            }

            $photoPath = $request->file('photo')->store('bands', 'public');
            $band->photo = $photoPath;
        }

        $band->name = $request->name;
        $band->albums = $request->albums;
        $band->save();

        return redirect()->route('bands')->with('message', 'Band updated successfully!');
    }


    public function showAlbums($id)
{
    $bands = Band::find($id);
    $albums = Album::where('band_id', $id)->get();

    return view('albums.albums_index', [
        'albums' => $albums,
        'band' => $bands
    ]);
}


}


