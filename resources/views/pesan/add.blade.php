<x-app-layout>
    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mb-5">
            </div>
            @if($errors->any())
<div class="alert alert-danger">
<ul>
@foreach($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <div class="col-md-4">
        <div class="card">
            <h5 class="card-header">Tambah Barang</h5>
            <div class="card-body">

<form method="post" action="{{route('pesan.store') }}">
@csrf
<div class="mb-3">
<label for="id" class="form-label">ID</label>
<input type="number" class="form-control"id="id" name="id">
</div>

<div class="mb-3">
<label for="nama_barang" class="form-label">Nama Barang</label>
<input type="text" class="form-control"id="nama_barang" name="nama_barang">
</div>

<div class="mb-3">
<label for="harga" class="form-label">Harga</label>
<input type="number" class="form-control"id="harga" name="harga">
</div>

<div class="mb-3">
<label for="gambar" class="form-label">Gambar</label>
<input type="file" class="form-control" id="gambar" name="gambar">
</div>

<div class="mb-3">
<label for="stok" class="form-label">Stok</label>
<input type="number" class="form-control" id="stok" name="stok">
</div>

<div class="mb-3">
<label for="keterangan" class="form-label">Keterangan</label>
<input type="text" class="form-control" id="keterangan" name="keterangan">
</div>

<div class="text-center"><input type="submit" class="btnbtn-primary" value="Tambah" />

</div>
</div>
</div>
 </x-app-layout>
