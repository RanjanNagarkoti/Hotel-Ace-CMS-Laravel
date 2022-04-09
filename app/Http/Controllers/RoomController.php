<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RoomController extends Controller
{
    public function __construct(Room $room)
    {
        $this->room = $room;
    }

    public function index()
    {
        $data = $this->room->paginate(5);
        return view('admin.room.index', compact('data'));
    }

    public function create()
    {
        return view('admin.room.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $extension = $data['imgIn']->extension();
        $unique = date('ymd') . time();
        $name = $unique . '.' . $extension;
        $data['imgIn'] = $name;
        $request->imgIn->move(public_path('/images/room'), $name);

        $this->room->create($data);
        return redirect('/hotel-ace/admin/room')->with('success', 'Room added successfully.');
    }

    public function edit($id)
    {
        $room = $this->room->findOrFail($id);
        return view('admin.room.edit', compact('room'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_method', '_token');
        if (count($data) == 5) {
            $this->room->where('id', "$id")->update($data);
        } elseif (count($data) > 5) {
            dd($data);
            $extension = $data['imgIn']->extension();
            $unique = date('ymd') . time();
            $name = $unique . '.' . $extension;
            $data['imgIn'] = $name;
            $request->imgIn->move(public_path('/images/room'), $name);
            $this->room->where('id', "$id")->update($data);
        }
        return redirect('/hotel-ace/admin/room')->with('success', 'Room detail updated successfully.');
    }

    public function destroy($id)
    {
        $this->room->findOrFail($id)->delete();
        return redirect('/hotel-ace/admin/room')->with('success', 'Room removed successfully.');
    }
}
