<style>
    label{
        margin-top: 15px;
        margin-bottom: 10px;
        color: black;
    }
</style>
@extends('layout.template')

@section('content')
<div class="portlet-title">
    <div style="display: inline-block; margin: 15px; font-size: 25px; font-weight: bold;">
        Edit Supplier
    </div>
</div>

<form method="POST" action="{{route('supplier.update', $supplier->id)}}">
    @csrf
    @method("PUT")

    <div class="form-group">
        <label>Nama Supplier</label>
        <input type="text" name="nama" class="form-control" id="nama" required value='{{$supplier->nama}}'>

        <label>Alamat Supplier</label>
        <input type="text" name="alamat" class="form-control" id="alamat" required value='{{$supplier->alamat}}'>

        <label>Email Supplier</label>
        <input type="email" name="email" class="form-control" id="email" required value='{{$supplier->email}}'>

        <label>Nama Bank</label>
        <input type="text" name="namabank" style="text-transform: uppercase" class="form-control" id="namabank" value='{{$supplier->nama_bank}}'>
        @error('namabank')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <label>Nomor Rekening</label>
        <input type="number" name="nomorrekening" class="form-control" id="nomorrekening" value='{{$supplier->nomor_rekening}}'>
        @error('nomorrekening')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <label>Contact Person</label>
        <input type="tel" name="cp" class="form-control" id="cp" required value='{{$supplier->contact_person}}'>
    </div>
    <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Submit</button>
</form>
@endsection
