<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;

class StaffController extends Controller
{
    public function __construct(Staff $staff)
    {
        $this->staff = $staff;
    }

    public function index()
    {
        $data = $this->staff->all();
        return view('admin.about.index', compact('data'));
    }

    public function create()
    {
        return view('admin.about.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $ext = $data['profile']->extension();
        $unique = date('ymd') . time();
        $name = $unique . '.' . $ext;
        $data['profile'] = $name;
        $request->profile->move(public_path('/images/staffs'), $name);

        $this->staff->create($data);
        return redirect('/hotel-ace/admin/staffs')->with('success', 'Staff added successfully.');
    }

    public function edit($id)
    {
        $data = $this->staff->findOrFail($id);
        return view('admin.about.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_method', '_token');
        $this->staff->where('id', $id)->update($data);
        return redirect('/hotel-ace/admin/staffs')->with('success', 'Staff detail updated successfully.');
    }

    public function destroy($id)
    {
        $this->staff->findOrFail($id)->delete();
        return redirect('/hotel-ace/admin/staffs')->with('success', 'Staff removed successfully.');
    }
}
