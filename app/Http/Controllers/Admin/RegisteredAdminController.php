<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;

class RegisteredAdminController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function __construct(Admin $admin)
    {
        $this->admin = $admin;
    }

    public function show()
    {
        $data = $this->admin->all()->where('id', '!=', 10)->where('email', '!=', 'superadmin@gmail.com');
        return view('admin.admin_crud.index', compact('data'));
    }

    public function create()
    {
        return view('admin.admin_crud.create');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
        ]);

        $user = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        return redirect('/hotel-ace/admin/view');
    }

    public function destroy(Request $request, $id){
        $data = $request->all();
        $this->admin->where('id', "$id")->delete($data);
        return redirect('/hotel-ace/admin/view')->with('success', 'Admin removed successfully.');
    }

    public function edit(Request $request, $id){
        $data = $this->admin->findOrFail($id);
        return view('admin.admin_crud.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_method', '_token');
        $this->admin->where('id', $id)->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password'])
        ]);
        return redirect('/hotel-ace/admin/view')->with('success', 'Admin detail updated successfully.');
    }
}
