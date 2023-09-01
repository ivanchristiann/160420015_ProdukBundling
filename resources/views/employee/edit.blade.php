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
        Add New Employee
    </div>
</div>

<form method="POST" action="{{route('employee.update', $employee->id)}}">
    @csrf
    @method("PUT")
    <div class="form-group">
        <label>username</label>
        <input type="text" name="username" class="form-control" id="username" required value='{{$employee->username}}'>
        
        <label>Nama Lengkap</label>
        <input type="text" name="nama" class="form-control" id="nama" required value='{{$employee->nama}}'>

        <label>Jenis Kelamin</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="jenisKelamin" id="jenisKelamin" value="Pria" @if($employee->jenis_kelamin === 'Pria') checked @endif>
            <label class="form-check-label" for="jenisKelaminPria">Pria</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="jenisKelamin" id="jenisKelamin" value="Wanita" @if($employee->jenis_kelamin === 'Wanita') checked @endif>
            <label class="form-check-label" for="jenisKelaminWanita">Wanita</label>
        </div>
        
        <label>Tempat, Tanggal Lahir</label>
        <div class="row">
            <div class="col-md-3">
                <input type="text" name="tempatLahir" class="form-control" id="tempatLahir" required value='{{$employee->tempat_lahir}}'>
            </div>
            <div class="col-md-3">
                <input type="date" name="tanggalLahir" class="form-control" id="tanggalLahir" value='{{$employee->tanggal_lahir}}'>
            </div>
        </div>

        <label>Email</label>
        <input type="email" name="email" class="form-control" id="email" required value='{{$employee->email}}'>

        <label>Handphone</label>
        <input type="tel" name="handphone" class="form-control" id="handphone" required value='{{$employee->phone}}'>

        <label>alamat</label>
        <input type="text" name="alamat" class="form-control" id="alamat" required value='{{$employee->alamat}}'>

        <label>Hire Date</label>
        <input type="date" name="email" class="form-control" id="email" required value='{{$employee->hiredate}}' readonly>

        <label>salary</label>
        <input type="number" name="salary" class="form-control" id="salary" required value='{{$employee->salary}}'>

        <label>jabatan</label>
        <input type="text" name="jabatan" class="form-control" id="jabatan" required value='{{$employee->jabatan}}'>

        <label>Tipe</label>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipe" id="tipe" value="Kontrak" @if($employee->tipe === 'Kontrak') checked @endif>
            <label class="form-check-label" for="tipeKontrak">Pegawai Kontrak</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipe" id="tipe" value="Magang" @if($employee->tipe === 'Magang') checked @endif>
            <label class="form-check-label" for="tipeMagang">Pegawai Magang</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="tipe" id="tipe" value="Tetap" @if($employee->tipe === 'Tetap') checked @endif>
            <label class="form-check-label" for="tipeTetap">Pegawai Tetap</label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Submit</button>
</form>
@endsection
