<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\ProdukDetail;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Produk::all();
        return view('list-produk', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tambah-produk');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Nama' => 'required|max:255',
            'Deskripsi' => 'required|max:300',
            'Quantity' => 'required',
            'Expired'=> 'required',
            'gambar'=> 'image|file|mimes:png,jpeg,jpg|max:2048',
            'pabrik'=>'required',
            'bahan'=>'required',
            'kategori'=>'required',
        ]);
        

        $data= $request->all();
        if($request->file('gambar')) {
            
            $data['gambar']=$request->file('gambar')->store('post-gambar');
        };
        $produk =new Produk;
        $produk->Nama = $data['Nama'];
        $produk->Deskripsi = $data['Deskripsi'];
        $produk->Quantity = $data['Quantity'];
        $produk->Expired = $data['Expired'];
        $produk->gambar = $data['gambar'];
        $produk->save();

        $produkdetail = new ProdukDetail;
        $produkdetail->produk_id = $produk->id;
        $produkdetail->bahan = $data['bahan'];
        $produkdetail->pabrik = $data['pabrik'];
        $produkdetail->kategori = $data['kategori'];
        $produkdetail->save();

        

        return redirect()->route('home')->with('tambah_produk', 'Produk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Produk::where('id', $id)->first();
        return view('detail-produk', [
            'data'=> $data
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Produk::where('id', $id)->first();
        return view('edit-produk', [
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'Nama' => 'required|max:255',
            'Deskripsi' => 'required|max:300',
            'Quantity' => 'required',
            'Expired'=> 'required',
            'gambar'=> 'image|file|mimes:png,jpeg,jpg|max:2048',
            'pabrik'=>'required',
            'bahan'=>'required',
            'kategori'=>'required',
        ]);
        if($request->file('gambar')) {
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['gambar']=$request->file('gambar')->store('post-gambar');
        };
        $data= $request->all();
        $produk = Produk::findOrFail($id);
        $produk->update($validatedData);
        ProdukDetail::where('produk_id', '=', $id)->update([
            'bahan'=> $data['bahan'],
            'pabrik'=> $data['pabrik'],
            'kategori'=> $data['kategori'],
        ]);
        
        
        return redirect()->route('home')->with('edit_produk', 'Update data Produk berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $produk = Produk::findOrFail($id);
        $produk->delete();
        $produkdetail = ProdukDetail::where('produk_id', $id)->first();
        $produkdetail->delete();
        if($produk->gambar){
            Storage::delete($produk->gambar);
        }
        return redirect()->route('home')->with('hapus_produk', 'Produk Telah Dihapus');
    }
}
