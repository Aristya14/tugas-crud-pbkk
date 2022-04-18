<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <title>Edit produk</title>
</head>
<body>
<center>
    <div class="container-fluid">
        <div class="container position-center">
            <div class="row page-bg">
                <div class="p-4 col-md-12">
                    <div class="text-center top-icon">
                        <h1 class="mt-3">Edit produk</h1>
                        <br>
                        @if (Session::has('error'))
                            <div class="alert alert-danger">{{ Session::get('error') }}</div>
                        @endif

                        @if (Session::has('wrongUsername'))
                            <div class="alert alert-danger">{{ Session::get('wrongUsername') }}</div>
                        @endif

                        
                            <form id="form-login" action="{{ route('produk.update', $data->id) }}" method="post" onsubmit="return confirm('Apakah Anda Yakin Edit Data ?');" enctype="multipart/form-data">
                                @csrf
                                
                                <div class="form-group" style="text-align: left">
                                    <label for="gambar">Gambar</label>
                                    <br>
                                    <input type="hidden" name="oldImage" value="{{ $data->gambar }}">
                                    @if($data->gambar)
                                        <img src="{{ asset('storage/'. $data->gambar) }}"class="img-preview img-fluid col-sm-3 d-block">
                                    @endif
                                    <br>
                                    <input type="file" class="form-control-file" id="gambar" name="gambar" onchange="previewImage()">
                                </div>
                                @error('gambar')
                                <div class="alert alert-danger">
                                    gambar salah
                                </div>
                                @enderror

                                <div style="text-align: left" class="mt-3">
                                    <label for="Nama">Nama</label>
                                    <input class="mt-3 form-control form-control-lg @error('Nama') is-invalid @enderror" name="Nama" type="text" 
                                    placeholder="Nama" value="{{ $data->Nama ? $data->Nama : 'Tidak Ada Data' }}" autofocus required>
                                </div>

                                @error('Nama')
                                <div class="alert alert-danger">
                                    Nama salah
                                </div>
                                @enderror

                                <div style="text-align: left" class="mt-3">
                                    <label for="Deskripsi">Deskripsi</label>
                                    <input class="mt-3 form-control form-control-lg @error('Deskripsi') is-invalid @enderror" name="Deskripsi" type="text"
                                        placeholder="Deskripsi" value="{{ $data->Deskripsi ? $data->Deskripsi : 'Tidak Ada Data' }}" autofocus required>
                                </div>

                                @error('Deskripsi')
                                <div class="alert alert-danger">
                                    Deskripsi Salah
                                </div>
                                @enderror
                                
                                <div style="text-align: left" class="mt-3">
                                    <label for="Quantity">Quantity</label>
                                    <input class="mt-3 form-control form-control-lg @error('Quantity') is-invalid @enderror" name="Quantity" type="text"
                                        placeholder="Quantity" value="{{ $data->Quantity ? $data->Quantity : 'Tidak Ada Data' }}" autofocus required>
                                </div>

                                @error('Quantity')
                                <div class="alert alert-danger">
                                    Quantity Salah
                                </div>
                                @enderror
                                <div style="text-align: left" class="mt-3">
                                    <label for="Expired" >Expired</label>
                                    <input class="mt-3 form-control form-control-lg" name="Expired" type="date"
                                        placeholder="Expired" autofocus required value="{{ $data->Expired ? $data->Expired : 'Tidak Ada Data' }}">
                                </div>

                                @error('Expired')
                                <div class="alert alert-danger">
                                    Expired kosong
                                </div>
                                @enderror
                                <div>
                                    <input class="mt-3 form-control form-control-lg" name="pabrik" type="text"
                                        placeholder="pabrik" autofocus required value="{{ $data->produkdetail->pabrik ? $data->produkdetail->pabrik : 'Tidak Ada Data' }}" readonly>
                                </div>

                                @error('pabrik')
                                <div class="alert alert-danger">
                                    pabrik kosong
                                </div>
                                @enderror
                                
                                <div>
                                    <input class="mt-3 form-control form-control-lg" name="kategori" type="text"
                                        placeholder="kategori" autofocus required value="{{ $data->produkdetail->kategori ? $data->produkdetail->kategori : 'Tidak Ada Data' }}" readonly>
                                </div>

                                @error('kategori')
                                <div class="alert alert-danger">
                                    Kategori kosong
                                </div>
                                @enderror
                                <div>
                                    <input class="mt-3 form-control form-control-lg" name="bahan" type="text"
                                        placeholder="Bahan Baku" autofocus required value="{{ $data->produkdetail->bahan ? $data->produkdetail->bahan : 'Tidak Ada Data' }}" readonly>
                                </div>

                                @error('bahan')
                                <div class="alert alert-danger">
                                    Bahan Baku kosong
                                </div>
                                @enderror
                                
                            </form>
                        <br>
                        <div class="mt-4 text-center submit-btn">
                            <a href="{{ route('home') }}" class="btn btn-secondary" onclick="return confirm('Apakah Anda Yakin Kembali ke Halaman Utama ?');">Kembali</a>
                            <button type="submit" class="btn btn-primary" form="form-login">Edit Produk</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</center>
</body>
<script>
    function previewImage(){
        const image=document.querySelector('#gambar');
        const imgPreview= document.querySelector('.img-preview');

        imgPreview.style.display ='block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }

    }
    
</script>
</html>