<x-app-layout>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-5">

        </div>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <div class="col-md-4">
        <img src="{{ url('uploads') }}/{{ $barangid->gambar }}" class="card-img-top" alt="...">
    <div class="card">
        <h5 class="card-header">Description</h5>
        <div class="card-body">
            <table class="table">
                <tbody>
                    <tr>
                        <td>Harga</td>
                        <td>:</td>
                        <td>Rp. {{ number_format($barangid->harga) }}</td>
                    </tr>
                    <tr>
                        <td>Stok</td>
                        <td>:</td>
                        <td>{{ number_format($barangid->stok) }}</td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>:</td>
                        <td>{{ $barangid->keterangan }}</td>
                    </tr>

                    <tr>
                        <td>Jumlah Pesan</td>
                        <td>:</td>
                        <td>
                             <form method="post" action="{{ url('pesan') }}/{{ $barangid->id }}" >
                            @csrf
                                <input type="text" name="jumlah_pesan" class="form-control" required="">
                                <button type="submit" class="btn btn-primary mt-2"><i class="fa fa-shopping-cart"></i> Masukkan Keranjang</button>
                            </form>
                        </td>
                    </tr>

          <h5 class="card-title">{{ $barangid->nama_barang }}</h5>
          <p class="card-text">{{ $barangid->keterangan }}</p>
        </div>
      </div>

    </x-app-layout>
