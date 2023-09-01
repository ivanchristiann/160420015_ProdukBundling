@extends('layout.template')

@section('content')
@if (session('status'))
<div class="alert alert-success">{{session('status')}}</div>
@endif
<div>
<div style="margin: 20px; font-size: 20px;">
    <strong>Daftar Supplier</strong>
</div>
<div style="float: right; margin: 15px;">
    <a href="{{ route('supplier.create') }}" class="btn btn-success btn-m"><i class="fa fa-plus"></i> Add Supplier</a>
</div>
<table id="daftarSupplier" class="table table-striped" style="width:100%">
    <thead>
        <tr>
            <td>#</td>
            <td>Nama Supplier</td>
            <td>Alamat</td>
            <td>Email</td>
            <td>Nomor Rekening</td>
            <td>Contact Person</td>
            <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @if (count($supplierAktif) == 0)
        <tr>
            <td class="text-center" colspan="8">Tidak ada supplier yang terdata</td>
        </tr>
        @else
        @foreach ($supplierAktif as $sp)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $sp->nama }}</td>
            <td>{{ $sp->alamat }}</td>
            <td>{{ $sp->email }}</td>
            <td>{{ $sp->nama_bank . ' - '. $sp->nomor_rekening }}</td>
            <td>{{ $sp->contact_person }}</td>
            <td class="text-center"><a href="{{ route('supplier.edit', $sp->id) }}" class="btn btn-sm btn-primary"><i class='bx bx-edit-alt'></i></a></td>
            <td class="text-center"><button onclick="nonaktifkan({{ $sp->id}})" class="btn btn-sm btn-danger"><i class='bx bx-power-off'></i></button></td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>
</div>
<div>
    <div style="margin: 15px; font-size: 20px;">
        <strong>List Supplier Nonaktif</strong>
    </div>
    <table id="dokterNonAktif" class="table table-striped" style="width:100%">
        <thead>
            <tr>
                <td>#</td>
                <td>Nama Supplier</td>
                <td>Alamat</td>
                <td>Email</td>
                <td>Nomor Rekening</td>
                <td>Contact Person</td>
                <td colspan="2">Action</td>
            </tr>
        </thead>
    <tbody>
        @foreach ($supplierNonAktif as $sp)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $sp->nama }}</td>
            <td>{{ $sp->alamat }}</td>
            <td>{{ $sp->email}}</td>
            <td>{{ $sp->nama_bank . ' - '. $sp->nomor_rekening }}</td>
            <td>{{ $sp->contact_person }}</td>
            <td class="text-center"><a href="{{ route('supplier.edit', $sp->id) }}" class="btn btn-sm btn-primary"><i class='bx bx-edit-alt'></i></a></td>
            <td class="text-center"><button onclick="aktifkan({{ $sp->id}})" class="btn btn-sm btn-danger"><i class='bx bx-power-off'></i></button></td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#daftarSupplier').DataTable({
            "scrollX": true
        });
    });
    function nonaktifkan(id) {
        $.ajax({
            type: 'POST',
            url: "{{ route('supplier.nonaktifkan') }}",
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
            url: "{{ route('supplier.aktifkan')}}",
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


