@extends('layout.template')

@section('content')
<section class="content">

    <!--Default box-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">LIST ICE CREAM</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widge="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widge="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" action="{{$url_form}}">
                @csrf
                {!! (isset($ice))? method_field('PUT') : '' !!}
                <div class="form-group">
                    <label >Kode Barang</label>
                    <input class="form-control @error('kode_barang') is-invalid @enderror" value="{{isset($ice)? $ice->kode_barang: old('kode_barang') }}" name="kode_barang" type="text" />
                    @error('kode_barang')
                      <span class="error invalid-feedback">{{ $message }} </span>
                    @enderror
      
                </div>
                <div class="form-group">
                    <label >Nama Ice</label>
                    <input class="form-control @error('nama_ice') is-invalid @enderror" value="{{isset($ice)? $ice->nama_ice: old('nama_ice') }}" name="nama_ice" type="text"/>
                    @error('nama_ice')
                      <span class="error invalid-feedback">{{ $message }} </span>
                    @enderror
      
                </div>
                <div class="form-group">
                    <label >Harga</label>
                    <input class="form-control @error('harga') is-invalid @enderror" value="{{isset($ice)? $ice->harga: old('harga') }}" name="harga" type="text"/>
                    @error('harga')
                        <span class="error invalid-feedback">{{ $message }} </span>
                    @enderror

                </div>
                <div class="form-group">
                    <label >Gambar</label>
                    <input class="form-control @error('gambar') is-invalid @enderror" value="{{isset($ice)? $ice->gambar: old('gambar') }}" name="gambar" type="img"/>
                    @error('gambar')
                      <span class="error invalid-feedback">{{ $message }} </span>
                    @enderror
      
                </div>
                <div class="form-group">
                    <label >QTY</label>
                    <input class="form-control @error('qty') is-invalid @enderror" value="{{isset($ice)? $ice->qty: old('qty') }}" name="qty" type="text"/>
                    @error('tanggal_lahir')
                      <span class="error invalid-feedback">{{ $message }} </span>
                    @enderror
      
                </div>
                
                
                <div class="form-group">
                    <button class="btn btn-sm btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.card -->

    </section>
@endsection