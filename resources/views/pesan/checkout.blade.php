<x-app-layout>
    @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-5">
        </div>

    <?php $no = 1; ?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <div class="col-md-4">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Harga</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>


            @foreach($pesanan_details as $pesanan_detail)
            <tbody>
              <tr>
                <th scope="row">{{ $no++ }}</th>
                <td>{{ $pesanan_detail->nama_barang }}</td>
                <td> {{$pesanan_detail->jumlah}}</td>
                <td>Rp{{ number_format($pesanan_detail->harga) }}</td>
                <td>Rp{{ number_format($pesanan_detail->jumlah_harga) }}</td>

                <td>
                    <form action="{{ url('hapus') }}/{{ $pesanan_detail->pesanan_detail_id }}"
                        method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger"><i
                                class="fa fa-trash">Hapus</i></button>
                    </form>
                    <form action="{{ url('hapus') }}/{{ $pesanan_detail->pesanan_detail_id }}"
                        method="post">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger"><i
                                class="fa fa-trash">Soft Delete</i></button>
                    </form>
                </td>
            </tr>
            @endforeach
            <tr>
                <td colspan="4" align="right"><strong>Total Harga :</strong></td>
                <td><strong>Rp{{ number_format($total_harga) }}</strong></td>
                {{-- <td>
                    <form method="post" action="{{ route('bayar') }}">
                        @csrf
                        @foreach ($pesanan_details as $pesanan_detail)
                            <input type="hidden" name="pesanan_detail[]"
                                value="{{ $pesanan_detail->pesanan_detail_id }}">
                        @endforeach
                        <input type="hidden" name="total_harga" value="{{ $total_harga }}">
                        <button type="submit" class="btn btn-primary mt-3"><i
                                class="fa fa-shopping-cart"></i>Bayar</button>
                    </form>
                </td> --}}
            </tr>
            </tbody>
          </table>


</x-app-layout>
