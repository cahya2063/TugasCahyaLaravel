<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\produk;
use App\Models\pesanan;
use App\Models\detail;
use Carbon\Carbon;
use Illuminate\view\view;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() : View
    {
        $produk = produk::get();
        return view('homeuser', compact('produk'));
    }
    
    public function index1() : View
    {
        $produk = produk::get();
        return view('home', compact('produk'));
    }

    public function index2() : View
    {
        
        return view('landing');
    }

    public function create() : View{
        return view('create');
    }

    public function store(Request $request) : RedirectResponse
    {
        $this->validate($request,[
            'nama' => 'required',
            'kategori_produk' => 'required',
            'jumlah_produk' => 'required',
            'harga_bunga'=>'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('images', $imageName, 'public');
        } else {
            $imageName = null; // No image uploaded
        }
    
        
    
        DB::table('produks')->insert([
            'nama' => $request->nama,
            'kategori_produk' => $request->kategori_produk,
            'jumlah_produk' => $request->jumlah_produk,
            'harga_bunga'=>$request->harga_bunga,
            'image' => $imageName,
        ]);
        return redirect()->route('produk.home')->with(['success' => 'Data Berhasil Disimpan']);
    }

    public function edit(string $id) : View
    {
        $produk = produk::findOrFail($id);

        return view('edit', compact('produk'));
        
    }

    public function update(Request $request, $id)
{
    $this->validate($request,[
        'nama' => 'required',
        'kategori_produk' => 'required',
        'jumlah_produk' => 'required',
        'harga_bunga'=>'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);
    $produk = produk::findOrFail($id);

    // Handle image upload and storage if a new image is selected
    if ($request->hasFile('image')) {
        // Delete the old image if it exists
        if ($produk->image) {
            Storage::delete('public/images/' . $produk->image);
        }

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('images', $imageName, 'public');

        $produk->image = $imageName; // Update the image file name in the database
    }

    $produk->nama = $request->nama;
    $produk->kategori_produk = $request->kategori_produk;
    $produk->jumlah_produk = $request->jumlah_produk;
    $produk->harga_bunga = $request->harga_bunga;
    $produk->save();

    return redirect()->route('produk.home')->with('success', 'Data berhasil diperbarui.');
}

public function destroy(string $id) : RedirectResponse
{
    $produk = produk::findOrFail($id);
    $produk->delete();
    return redirect()->route('produk.home')->with(['succes'=>'Data Berhasil DIsimpan']);
}

public function beli(string $id){
    
}
}
