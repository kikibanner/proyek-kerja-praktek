@extends('layouts.master')

@section('ipolt')
    class="active"
@endsection

@section('title')
    Daftar OLT
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Data OLT</h3>
                <div class="right">
                </div>
            </div>
            <div class="panel-body">
                <!-- TAMBAH DATA -->
                @if(auth()->user()->role=='admin')
                <button type="button" class="btn btn-success btn-sm " data-toggle="modal" data-target="#exampleModal">
                    + Tambah Data
                </button>
                @endif
                <!-- /TAMBAH DATA -->
                <br>
                <br>
                <table class="table table-hover" id="example">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>STO</th>
                            <th>Merk</th>
                            <th>Type</th>
                            <th>Hostname</th>
                            <th>IP OAM</th>
                            @if(auth()->user()->role=='admin')
                            <th>Aksi (Lihat, Edit, Hapus)</th>
                            @else
                            <th>Aksi (Lihat)</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ipolt as $ip)
                        <tr>
                            <td>{{ $loop->iteration  }}</td>
                            <td>{{ $ip->sto }}</td>
                            <td>{{ $ip->merk }}</td>
                            <td>{{ $ip->type }}</td>
                            <td>{{ $ip->hostname }}</td>
                            <td>{{ $ip->ip_oam }}</td>
                            <td>
                            @if(auth()->user()->role=='admin')
                                <a href="/ipolt/{{$ip->id}}/detail" class="btn btn-sm btn-info"><i class="lnr lnr-eye"></i></a>
                                <a href="/ipolt/{{$ip->id}}/edit" class="btn btn-sm btn-warning"><i class="lnr lnr-cog"></i></a>
                                <a href="/ipolt/{{$ip->id}}/delete" class="btn btn-sm btn-danger" onclick="return confirm('Yakin mau dihapus?')"><i class="lnr lnr-trash"></i></a>
                            @else
                                <a href="/ipolt/{{$ip->id}}/detail" class="btn btn-sm btn-info"><i class="lnr lnr-eye"></i></a>
                            @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<!-- Modal Tambah Data -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Data OLT</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/ipolt/create" method="POST">
                    {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">STO</label>
                            <input type="text" class="form-control" name="sto" placeholder="Masukkan STO (Wajib Diisi)" required> 
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Merk</label>
                            <input type="text" class="form-control" name="merk" placeholder="Masukkan Merk (Wajib Diisi)"required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Type</label>
                            <input type="text" class="form-control" name="type" placeholder="Masukkan Type (Wajib Diisi)"required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Hostname</label>
                            <input type="text" class="form-control" name="hostname" placeholder="Masukkan Hostname (Wajib Diisi)"required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">IP OAM</label>
                            <input type="text" class="form-control" name="ip_oam" placeholder="Masukkan IP OAM (Wajib Diisi)"required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Metro</label>
                            <input type="text" class="form-control" name="metro" placeholder="Masukkan Metro (Opsional)">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Metro Port 1</label>
                            <input type="text" class="form-control" name="metro_port_1" placeholder="Masukkan Metro Port 1 (Opsional)">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Metro Port 2</label>
                            <input type="text" class="form-control" name="metro_port_2" placeholder="Masukkan Metro Port 2 (Opsional)">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">VLAN Inet</label>
                            <input type="text" class="form-control" name="vlan_inet" placeholder="Masukkan VLAN Inet (Opsional)">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <input type="text" class="form-control" name="alamat" placeholder="Masukkan Alamat (Opsional)">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /Modal Tambah Data -->
@endsection
