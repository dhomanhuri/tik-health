<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get data artikel all
        $artikel = Artikel::all();
        // return to dir artikel / artikel.blade.php with data artikel
        return view('artikel.artikel',compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // display create page with data kategori
        $kategori = Kategori::all();
        return view('artikel.add',compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // function route store
        $data = $request->all();
        // set data array foto to file foto
        $data['foto'] = $request->file('foto')->store('img');
        // insert data to artkel with orm
        Artikel::create($data);
        return redirect('artikel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit(Artikel $artikel)
    {
        // display edit with  data artikel and kategori
        $kategori = Kategori::all();
        return view('artikel.edit',compact('artikel','kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Artikel $artikel)
    {
        //update to table artikel
        $data = $request->all();
        try{
            $data['foto'] = $request->file('foto')->store('img');
            $artikel->update($data);
        }catch(\Throwable $th){
            $data['foto'] = $artikel->foto;
            $artikel->update($data);
        }
        return redirect('artikel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Artikel $artikel)
    {
        // delete data useing data from artikel
        $artikel->delete();
        return redirect('artikel');
    }
}
