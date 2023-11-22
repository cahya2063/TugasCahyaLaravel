<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Menggunakan 'judul' sebagai nama input -->
                            <div class="form-group">
                                <label class="font-weight-bold">nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama', $produk->nama) }}" placeholder="nama produk">
                                <!-- error message untuk 'judul' -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- Menggunakan 'pengarang' sebagai nama input -->
                            <div class="form-group">
                                <label class="font-weight-bold">kategori produk</label>
                                <input type="text" class="form-control @error('kategori_produk') is-invalid @enderror" name="kategori_produk" value="{{ old('kategori_produk', $produk->kategori_produk) }}" placeholder="kategori_produk">
                                <!-- error message untuk 'pengarang' -->
                                @error('kategori_produk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <!-- Menggunakan 'penerbit' sebagai nama input -->
                            <div class="form-group">
                                <label class="font-weight-bold">stok</label>
                                <input type="number" class="form-control @error('jumlah_produk') is-invalid @enderror" name="jumlah_produk" value="{{ old('jumlah_produk', $produk->jumlah_produk) }}" placeholder="jumlah produk">
                                <!-- error message untuk 'penerbit' -->
                                @error('jumlah_produk')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="font-weight-bold">harga</label>
                                <input type="number" class="form-control @error('harga_bunga') is-invalid @enderror" name="harga_bunga" value="{{ old('harga_bunga', $produk->harga_bunga) }}" placeholder="harga_bunga">
                                <!-- error message untuk 'penerbit' -->
                                @error('harga_bunga')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="font-weight-bold">Gambar</label>
                                <input type="file" class="form-control-file @error('image') is-invalid @enderror" name="image">
                                 @error('image')
                            <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>
    @enderror
</div>
                            

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
</body>
</html>