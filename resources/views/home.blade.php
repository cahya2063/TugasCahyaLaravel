@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <h3 class="text-center my-4">Data produk</h3>
                    <hr>
                    <table class="table table-bordered">
                    <a href=" {{ route('produk.create') }} " class="btn btn-md btn-success mb-3">TAMBAH</a>
                        <thead>
                            <tr>
                                <th scope="col">Nama produk</th>
                                <th scope="col">Kategori produk</th>
                                <th scope="col">Jumlah produk</th>
                                <th scope="col">harga bunga</th>
                                <th scope="col">gambar bunga</th>
                                <th scope="col">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($produk as $produk)
                            <tr>
                                <td>{{ $produk->nama }}</td>
                                <td>{{ $produk->kategori_produk }}</td>
                                <td>{{ $produk->jumlah_produk }}</td>
                                <td>{{ $produk->harga_bunga }}</td>
                                <td>
                                        @if($produk->image)
                                        <img src="{{ asset('storage/images/' . $produk->image) }}" alt="Gambar" style="max-width: 200px; max-height: 200px;">

                                        @else
                                        <p>Tidak ada gambar yang tersedia</p>
                                        @endif
                                    
                                    </td>
                                <td class="text-center">
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" 
                                            action="{{ route('produk.destroy', $produk->id) }}" method="POST">  
                                            <a href="{{ route('produk.edit', $produk->id) }}" {{ $produk->id }} class="btn btn-sm btn-primary">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="3">
                                    <div class="alert alert-danger">
                                        Data produk belum tersedia.
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection