<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employeeNonAktif = Employee::all()->where('status', '0');
        $employeeAktif = Employee::all()->where('status', '1');
        return view('employee.index', compact('employeeNonAktif', 'employeeAktif'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        $employee = new Employee();
        $employee->username = $request->get('username');
        $employee->password = Hash::make($request->get('password'));
        $employee->nama = $request->get('nama');
        $employee->jenis_kelamin = $request->get('jenisKelamin');
        $employee->tempat_lahir = $request->get('tempatLahir');
        $employee->tanggal_lahir = $request->get('tanggalLahir');
        $employee->email = $request->get('email');
        $employee->phone = $request->get('handphone');
        $employee->hiredate = now("Asia/Bangkok");
        $employee->alamat = $request->get('alamat');
        $employee->salary = $request->get('salary');
        $employee->jabatan = $request->get('jabatan');
        $employee->status = '1';
        $employee->tipe = $request->get('tipe');

        $employee->created_at = now("Asia/Bangkok");
        $employee->updated_at = now("Asia/Bangkok");
        $employee->save();
        return redirect()->route('employee.index')->with('status', 'New Employee ' .  $employee->nama . ' is already inserted');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::where('id', $id)->first();
        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        $employee = new Employee();
        $employee->username = $request->get('username');
        $employee->nama = $request->get('nama');
        $employee->jenis_kelamin = $request->get('jenisKelamin');
        $employee->tempat_lahir = $request->get('tempatLahir');
        $employee->tanggal_lahir = $request->get('tanggalLahir');
        $employee->email = $request->get('email');
        $employee->phone = $request->get('handphone');
        $employee->hiredate = now("Asia/Bangkok");
        $employee->alamat = $request->get('alamat');
        $employee->salary = $request->get('salary');
        $employee->jabatan = $request->get('jabatan');
        $employee->tipe = $request->get('tipe');

        $employee->updated_at = now("Asia/Bangkok");
        $employee->save();
        return redirect()->route('employee.index')->with('status', 'Edit Employee ' .  $employee->nama . ' is already updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function nonaktifkan(Request $request)
    {
        $employee = Employee::where('id', $request->get('id'))->first();
        $employee->status = '0';
        $employee->save();
        return response()->json(array('status' => 'success'), 200);
    }

    public function aktifkan(Request $request)
    {
        $employee = Employee::where('id', $request->get('id'))->first();
        $employee->status = '1';
        $employee->save();
        return response()->json(array('status' => 'success'), 200);
    }
}
