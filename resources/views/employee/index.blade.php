@extends('layout.template')

@section('content')
@if (session('status'))
<div class="alert alert-success">{{session('status')}}</div>
@endif
<div style="margin: 20px; font-size: 20px;">
    <strong>Daftar Karyawan</strong>
</div>
<div style="float: right; margin: 15px;">
    <a href="{{ route('employee.create') }}" class="btn btn-success btn-m"><i class="fa fa-plus"></i> Add Karyawan</a>
</div>
<table id="daftarEmployee" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <td>#</td>
            <td>Nama</td>
            <td>Jenis Kelamin</td>
            <td>Tempat, tanggal lahir</td>
            <td>Email</td>
            <td>Phone</td>
            <td>Alamat</td>
            <td>Hire Date</td>
            <td>Jabatan</td>
            <td>Tipe</td>
        </tr>
    </thead>
    <tbody>
        @if (count($employeeAktif) == 0)
        <tr>
            <td class="text-center" colspan="8">Tidak ada karyawan yang terdata</td>
        </tr>
        @else
        @foreach ($employeeAktif as $ep)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $ep->nama }}</td>
            <td>{{ $ep->jenis_kelamin }}</td>
            <td>{{ $ep->tempat_lahir . ", " . $ep->tanggal_lahir}}</td>
            <td>{{ $ep->email }}</td>
            <td>{{ $ep->phone }}</td>
            <td>{{ $ep->alamat }}</td>
            <td>{{ $ep->hiredate }}</td>
            <td>{{ $ep->jabatan }}</td>
            <td>{{ $ep->tipe }}</td>
            <td class="text-center"><a href="{{ route('employee.edit', $ep->id) }}" class="btn btn-sm btn-primary"><i class='bx bx-edit-alt'></i></a></td>
            <td class="text-center"><button onclick="nonaktifkan({{ $ep->id}})" class="btn btn-sm btn-danger"><i class='bx bx-power-off'></i></button></td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
<div>
    <div style="margin: 15px; font-size: 20px;">
        <strong>List Supplier Nonaktif</strong>
    </div>
    <table id="daftarEmployee" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <td>#</td>
                <td>Nama</td>
                <td>Jenis Kelamin</td>
                <td>Tempat, tanggal lahir</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Alamat</td>
                <td>Hire Date</td>
                <td>Jabatan</td>
                <td>Tipe</td>
            </tr>
        </thead>
        <tbody>
            @if (count($employeeNonAktif) == 0)
            <tr>
                <td class="text-center" colspan="8">Tidak ada karyawan yang terdata</td>
            </tr>
            @else
            @foreach ($employeeNonAktif as $ep)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $ep->nama }}</td>
                <td>{{ $ep->jenis_kelamin }}</td>
                <td>{{ $ep->tempat_lahir . ", " . $ep->tanggal_lahir}}</td>
                <td>{{ $ep->email }}</td>
                <td>{{ $ep->phone }}</td>
                <td>{{ $ep->alamat }}</td>
                <td>{{ $ep->hiredate }}</td>
                <td>{{ $ep->jabatan }}</td>
                <td>{{ $ep->tipe }}</td>
                <td class="text-center"><a href="{{ route('employee.edit', $ep->id) }}" class="btn btn-sm btn-primary"><i class='bx bx-edit-alt'></i></a></td>
                <td class="text-center"><button onclick="aktifkan({{ $ep->id }})" class="btn btn-sm btn-danger"><i class='bx bx-power-off'></i></button></td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#daftarEmployee').DataTable({
            "scrollX": true
        });
    });

    function nonaktifkan(id) {
        $.ajax({
            type: 'POST',
            url: "{{ route('employee.nonaktifkan') }}",
            data: {
                '_token': '<?php echo csrf_token(); ?>',
                'id': id,
            },
            success: function (data) {
                if (data['status'] == 'success') {
                    window.location.reload(true);
                }
            }
        });
    }

    function aktifkan(id) {
        $.ajax({
            type: 'POST',
            url: "{{ route('employee.aktifkan')}}",
            data: {
                '_token': '<?php echo csrf_token(); ?>',
                'id': id,
            },
            success: function (data) {
                if (data['status'] == 'success') {
                    window.location.reload(true);
                }
            }
        });
    }
</script>
@endsection


