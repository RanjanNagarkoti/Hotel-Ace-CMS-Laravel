<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Models\User;
use App\Models\Admin;
use App\Models\Staff;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $data = DB::select("SELECT * FROM `bookings` WHERE status = ? OR status = ? ORDER BY id DESC LIMIT 5", ["Checked Out", "Checked In"]);
        $users = User::all()->count();
        $booking = Booking::all()->count();
        $admin = Admin::all()->count();
        $room = Room::all()->count();
        return view('admin.dashboard', compact('users', 'booking', 'admin', 'room', 'data'));
    }

    public function home()
    {
        $data = Room::all()->where('status', 'Available');
        return view('user.index', compact('data'));
    }

    public function room()
    {
        return view('user.room');
    }

    public function roomNo($id)
    {
        $data = Room::all()->where('type', $id)->pluck('room-no');
        return $data;
    }

    public function detail($id)
    {
        $data = user::find($id);
        $card = User::find($id)->card;
        return response(compact("data", "card"));
    }

    public function about()
    {
        $data = Staff::all();
        return view('user.about', compact('data'));
    }

    public function checkDate($check_in, $room_no)
    {
        $new = DB::select('SELECT MAX(check_out) AS `out`, MAX(check_in) AS `in` FROM `bookings` WHERE room_no = ?', [$room_no]);
        if ($check_in == $new[0]->in || $check_in <= $new[0]->out) {
            return response()->json([
                'msg' => 'Booked'
            ]);
        } else {
            return response()->json([
                'msg' => 'Available'
            ]);
        }
    }
}
