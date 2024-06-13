@extends("include.app")
@section("content")
    @php
    @endphp
    <h1 class="card-title mb-9 fw-semibold">Riwayat Transaksi {{ $kontak->nama }} ({{ $kontak->jenis }}) </h1>
    <div class="row">
        <div class="col-lg-12">
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($riwayat as $k => $v)
                        <tr>
                            <td>{{ $k +1 }}</td>
                            <td><b>#{{ $v->kode }}</b></td>
                            <td><b>{{ $v->barang_nama }}</b><br>{{ $v->kategori_nama }}</td>
                            <td>{!! str_replace(" ", " ", tglIndo($v->tanggal, "SHORT")) !!}</td>
                            <td>{{ $v->jumlah }} x {{ idr($v->harga) }}</td>
                            <td>{{ idr($v->total) }}</td>
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
