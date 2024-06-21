@extends("include.app")
@section("content")
    <h1 class="card-title mb-9 fw-semibold">Data Kontak</h1>
    <div class="row">
        <div class="col-lg-12">
            <a href="{{ url('kontak/form') }}" class="btn btn-primary" role="button" title="Tambah"><i class="glyphicon glyphicon-plus"></i> Tambah</a> 
            <div class="row">
                <div class="mt-3 mb-3 col-md-6">
                    <label for="keyword" class="form-label">Cari</label>
                    <div class="row">
                        <div class="mt-3 mb-3 col-md-6">
                            <input type="text" class="form-control" placeholder="kata kunci" id="keyword" @if(isset($keyword)) value="{{ $keyword }}" @endif>
                        </div>
                        <div class="mt-3 mb-3 col-md-6">
                            <button class="btn btn-primary" onclick="javascript:window.location='{{ url('kontak') }}?keyword='+document.getElementById('keyword').value">Cari</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">No</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Nama</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Jenis</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Keterangan</h6>
                            </th>
                            <th class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">Aksi</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kontak as $k => $v)  
                        <tr>
                            <td>{{ $k +1 }}</td>
                            <td>{{ $v->nama }}</td>
                            <td>{{ $v->jenis }}</td>
                            <td>{{ $v->keterangan }}</td>
                            <td>
                                <a href="{{ url('kontak/form?id=' . $v->id) }}" class="btn btn-primary" role="button" title="Edit"><i class="glyphicon glyphicon-edit">Edit</i></a>
                                <a href="{{ url('kontak/riwayat?id=' . $v->id) }}" class="btn btn-success" role="button" title="Edit"><i class="glyphicon glyphicon-edit">Riwayat Transaksi</i></a>
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