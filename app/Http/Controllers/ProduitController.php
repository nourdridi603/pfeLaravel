<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    public function addProduit()
    {
        return view('Produit/add-Produit');
    }
    public function storeProduit(Request $request)
    {
        $name = $request->name;
        $image = $request->file('file');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imageName);

        $Produit = new Produit();
        $Produit->nom = $name;
        $Produit->image = $imageName;
        $Produit->save();
        return back()->with('Produit-ajoute', "L'Produit est ajouté avec succés");
    }

    public  function Produits()
    {
        $Produits = Produit::all();
        return view('Produit/Produits', compact('Produits'));
    }
}
