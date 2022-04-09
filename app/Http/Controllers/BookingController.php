<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\Card;
use App\Models\Room;
use SebastianBergmann\Environment\Console;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }
    public function index($id)
    {
        $data = DB::table('bookings')->where('user_id', $id)->where('billing', 'unpaid')->orderBy('id', 'desc')->get();
        $paid = DB::table('bookings')->where('user_id', $id)->where('billing', 'paid')->orderBy('id', 'desc')->get();
        return view('booking.index', compact('data', 'paid'));
    }

    public function store(Request $request, $id)
    {
        $data = $request->all();
        $date = substr(Carbon::today(), 0, 10);
        if ($date >= $data['check-in']) {
            $status = "Checked In";
        } elseif ($data['check-in'] > $date) {
            $status = "Pending";
        }
        Booking::create([
            'user_id' => $id,
            'fullname' => $data['fullname'],
            'email' => $data['email'],
            'number' => $data['number'],
            'country' => $data['country'],
            'check_in' =>  $data['check-in'],
            'check_out' => $data['check-out'],
            'room_no' => $data['room-no'],
            'room_type' => $data['room-type'],
            'billing' => 'Unpaid',
            'status' => $status,
            'card_holder_name' => $data['card-holder-name'],
            'card_number' => $data['card-number'],
            'cvc_cvv' => $data['cvc-cvv'],
            'type' => $data['card-type'],
            'expiry_date' => $data['expiry-date']
        ]);
        $url = 'http://127.0.0.1:8000/hotel-ace/' . $id . '/booking';
        return redirect($url);
    }

    function bill($id)
    {
        $data = Booking::where('id', $id)->get();
        $price = Room::where('type', $data[0]->room_type)->pluck('price');
        $price_int = (int)$price[0];

        $in = str_replace("-", "", $data[0]->check_in, $count);
        $out = str_replace("-", "", $data[0]->check_out, $count);
        $today = substr(str_replace("-", "", Carbon::today()), 0, 8);
        if ($today > $out) {
            $total = ($today - $in) * $price_int;
        } else {
            $total = ($out - $in) * $price_int;
        }
        return view('booking.billing', compact('data', 'total', 'price'));
    }

    function pay($id)
    {
        Booking::where('id', $id)->update(['billing' => 'Paid']);
        return redirect('/hotel-ace');
    }

    //Controller for admin 
    public function view()
    {
        $data = Booking::paginate(7);
        return view('admin.booking.index', compact('data'));
    }

    public function  checkout($id)
    {
        $this->booking->where("id", $id)->update([
            'billing' => 'Paid',
            'status' => 'Checked Out'
        ]);
        return redirect('/hotel-ace/admin/booking/show')->with('success', "Successfully checkout!");
    }

    public function destroy(Request $request, $id)
    {
        $data = $request->all();
        $this->booking->where('id', "$id")->delete($data);
        return redirect('/hotel-ace/admin/booking/show')->with('success', 'Booking deleted successfully!');
    }
}
