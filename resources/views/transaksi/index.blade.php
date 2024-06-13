@extends("include.app")
@section("content")
    @php
        $typeIn = $type === "in";
        $title = "Pengadaan";
        if(!$typeIn){
            $title = "Penjualan";
        }
    @endphp
    <h1 class="card-title mb-9 fw-semibold">Data {{ $title }} Barang</h1>
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ url('transaksi/form') }}?type={{ $type }}" class="btn btn-primary" role="button" title="Tambah"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                        <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">No</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Kode</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Barang</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Tanggal</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Jumlah</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Total</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">@if($typeIn) Supplier @else Customer @endif</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Aksi</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($transaksi as $k => $v)
                        <tr>
                            <td>{{ $k +1 }}</td>
                            <td><b>#{{ $v->kode }}</b></td>
                            <td><b>{{ $v->barang_nama }}</b><br>{{ $v->kategori_nama }}</td>
                            <td>{!! str_replace(" ", " ", tglIndo($v->tanggal, "SHORT")) !!}</td>
                            <td>{{ $v->jumlah }} x {{ idr($v->harga) }}</td>
                            <td>{{ idr($v->total) }}</td>
                            <td>{{ $v->kontak_nama }}</td>
                            <td>
                                <a href="{{ url('transaksi/form') }}?type={{ $type }}&id={{ $v->id }}" class="btn btn-primary" role="button" title="Edit"><i class="glyphicon glyphicon-edit">Edit</i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <script>
                </script>
            </div>
        </div>
    </div>
@endsection

@section("js")
@endsection
