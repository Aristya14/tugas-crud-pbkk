<html>
<head>
	<title>Tutorial Membuat CRUD</title>
</head>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <body>
    <div class="container mt-5">
        <center><h3>Data Produk</h3></center>

	<a href="{{ route('produk.tambah-produk') }}" class="btn btn-success"> + Tambah produk Baru</a>

	<br/>
	<br/>
    @if (Session::has('tambah_produk'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%; height:auto;">
                <strong><i class="fa fa-check-circle"></i> Berhasil!</strong>
                <br>
                    Penambahan Produk Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                {{-- <button type="button" class="btn-close" data-bs-dismiss="alert"></button> --}}
                </button>
            </div>
        @endif
 
        @if (Session::has('edit_produk'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%; height:auto;">
                <strong><i class="fa fa-check-circle"></i> Berhasil!</strong>
                <br>
                    Pengeditan Produk Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @endif
 
        @if (Session::has('hapus_produk'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="width: 100%; height:auto;">
                <strong><i class="fa fa-check-circle"></i> Berhasil!</strong>
                <br>
                    Penghapusan Produk Berhasil
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
        @endif

	  <table class="table" style="background-color:lightgray">
            <thead class="thead-dark" style="background-color:gray ; color: white">
                <tr>
                    <th>ID</th>
                    <th>Gambar</th>
                    <th>Nama</th>
                    <th>Deskripsi</th>
                    <th>Quantity</th>
                    <th>Expired</th>
                    <th>Action</th>
                </tr>
            </thead>
			@php
                $it = 1;
            @endphp
		@foreach($data as $d)
		<tr>
            
			<td style="background-color:gray ; color: white">{{ $d->id }}</td>
            <td>
                <img src="{{ asset('storage/'.$d->gambar)}}" class="img-fluid" style="width: 60px; height:60px; text-align:center; margin:0">
            </td>
			<td>{{ $d->Nama }}</td>
			<td>{{ $d->Deskripsi }}</td>
			<td>{{ $d->Quantity }}</td>
			<td>{{ $d->Expired }}</td>
            
			<td>
                {{-- href="{{ route('produk.edit', $d->id) }}
                {{ route('produk.detail', $d->id) }} --}}
				
				
                <form onsubmit="return confirm('Apakah Anda Yakin Menghapus Data ini ?');" action="{{ route('produk.destroy', $d->id) }}" method="POST">
                        <a href="{{ Route('produk.edit', $d->id) }}" class="btn btn-sm btn-primary shadow"><i class="fa fa-edit"></i> Edit</a>
                        |
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger shadow"><i class="fa fa-trash"></i> Delete</button>
                        |
                        <a href="{{ route('produk.show' , $d->id) }}" class="btn btn-sm btn-warning shadow"><i class="fa fa-info-circle"></i> Detail</a>
                    </form>
                
			</td>
		</tr>
		@php
            $it+=1;
    	@endphp
		@endforeach
	</table>
</div>

</body>
</html>