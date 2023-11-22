@extends('layouts.app1')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-body">
                    <h3 class="text-center my-4">Data produk</h3>
                    <hr>
                    <table class="table table-bordered">
                   
                        <thead>
                            <tr>
                                <th scope="col">Nama produk</th>
                                <th scope="col">Kategori produk</th>
                                <th scope="col">Jumlah produk</th>
                                <th scope="col">harga bunga</th>
                                <th scope="col">gambar bunga</th>
                                <th scope="col">aksi</th>
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
                                    
                                    <td>
                                    <form action="{{ url('pesan') }}/{{ $produk->id }}" method="post">
                                        <input type="text" name="jumlah_pesan" id="" class="form-control" placeholder="jumlah beli">
                                        <br>
                                        <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-shopping-cart"></i>masukkan keranjang</button>
                                        
                                    
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