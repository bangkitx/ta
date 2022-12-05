<x-app-layout>
    <x-slot name="header">
        <div class="container">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <a href="{{ url('checkout') }}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Check Out</a></h2>
                    <form action="cari" method="GET">
                        <input type="text" name="cari" placeholder="Cari apa ? .." value="{{ old('cari') }}">
                        <input type="submit" value="">
                    </form>
                    <br>
          </div>
</x-slot>
    @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-5">
        </div>

    @foreach($baranglist as $barangs)
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <div class="col-md-4">
    <div class="card" style="width: 18rem;">
        <img src="{{ url('uploads') }}/{{ $barangs->gambar }}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{ $barangs->nama_barang }}</h5>
          <p class="card-text">
            <strong>Harga :</strong> Rp. {{ number_format($barangs->harga)}} <br>
                    <strong>Stok :</strong> {{ $barangs->stok }} <br>
                    <hr>
                    <strong>Keterangan :</strong> <br>
                    {{ $barangs->keterangan }}
          </p>
          <a href="{{ url('pesan') }}/{{ $barangs->id }}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Pesan</a>
        </div>
      </div>
    </div>
    @endforeach

</x-app-layout>
