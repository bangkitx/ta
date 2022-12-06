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
                        <form action="{{ route('Pesan.update', $barangid->id )}}" method="post">

                            @csrf
                            <div class="mb-3">
                                <label for="harga" class="form-label">harga</label>
                                <input type="number" class="form-control" id="harga" name="harga" value="{{ $barangid->harga }}">
                            </div>
                            <div class="mb-3">
                                <label for="stok" class="form-label">stok</label>
                                <input type="number" class="form-control" id="stok" name="stok" value="{{ $barangid->stok }}">
                            </div>
                            <div class="mb-3">
                                <label for="keterangan" class="form-label">keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $barangid->keterangan }}">
                            </div>
                            {{-- <div class="text-center">
                                <input type="submit" class="fa fa-shopping-cart"value="Ubah" />
                            </div> --}}
                            <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart">Submit</button>
                        </form>

                        {{-- <tr>
                            <td>Harga</td>
                            <td>:</td>
                            <td>
                            <form method="post" action="{{ url('edit') }}/{{ $barangid->harga }}" >
                                @csrf
                                    <input type="text" name="harga" class="form-control" required="" value="{{ $barangid->harga}}">

                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>Stok</td>
                            <td>:</td>
                            <td>
                            <form method="post" action="{{ url('edit') }}/{{ $barangid->stok }}" >
                                @csrf
                                    <input type="text" name="stok" class="form-control" required="" value="{{ $barangid->stok}}">

                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td>:</td>
                            <td>
                                <form method="post" action="{{ url('edit') }}/{{ $barangid->keterangan }}" >
                               @csrf
                                   <input type="text" name="keterangan" class="form-control" required="" value="{{ $barangid->keterangan}}">

                               </form>
                           </td>
                        </tr> --}}

            {{-- </div>
          </div>
        <td> --}}
            {{-- <form action="{{ url('dashboard') }}/{{ $barangid->id }}" method="post">
                <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart">Submit</button>
            </form> --}}
            {{-- <a href="{{ url('dashboard') }}" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> submit</a> </td> --}}
        </x-app-layout>
