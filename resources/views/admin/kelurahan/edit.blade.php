@extends('layouts.master')
@section('breadcrumb')
     <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin') }}">Admin</a></li>
                <li class="breadcrumb-item"><a href="{{ route('kelurahan.index') }}">Kelurahan</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Data</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ubah Daftar Kelurahan / Desa</div>
                <div class="card-body">
                    <form action="{{route('kelurahan.update',$kelurahan->id)}}" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label>Kode Kelurahan / Desa</label>
                            <input type="text" name="kode_kelurahan" class="form-control" value="{{ $kelurahan->kode_kelurahan }}" placeholder="Kode Kelurahan" required autofocus>
                            <label>Nama Kelurahan / Desa</label>
                            <input type="text" name="nama_kelurahan" class="form-control" value="{{ $kelurahan->nama_kelurahan }}" placeholder="Nama Kelurahan" required>
                            <label>Nama Kecamatan</label>
                            <select name="kecamatan_id" class="form-control" required>
                                @foreach ($kecamatan as $data)
                                <option value="{{$data->id}}" {{$data->id == $kelurahan->kecamatan_id ? 'selected' : ''}} >{{$data->nama_kecamatan}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
                        </div>
                        <div class="form-group">
                            <a href="{{ url()->previous() }}" class="btn btn-warning btn-block">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
