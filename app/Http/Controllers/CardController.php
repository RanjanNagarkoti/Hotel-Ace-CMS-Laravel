<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;
use Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CardController extends Controller
{
    public function __construct(Card $card)
    {
        $this->card = $card;
    }

    public function index()
    {
        $id = Auth::user()->id;
        $data = $this->card->where('user_id', $id)->get();
        $count = count($data);

        $detail = $this->card->where('user_id', $id)->get();

        if($count == 1){
            return view('card.show', compact('detail'));
        }
        else{
            return view('card.index');
        }
    }

    public function store(Request $request, $id)
    {
        $date = Carbon\Carbon::now() . date('ymd');
        $this->card->create([
            'card_holder_name' => $request->card_holder_name,
            'type' => $request->card_type,
            'card_number' => $request->card_number,
            'cvc_cvv' => $request->cvc_cvv,
            'expiry_date' => $request->expiry_date,
            'user_id' => $id,
            'created_at' => $date,
            'updated_at' => $date,
        ]);
        return redirect('/hotel-ace/{{$id}}/card/show');
    }

    public function show($id)
    {
        $detail = $this->card->where('user_id', $id)->get();
        return view('card.show', compact('detail'));
    }

    public function edit($id)
    {
        $detail = $this->card->where('user_id', $id)->get();
        return view('card.edit', compact('detail'));
    }

    public function update(Request $request,$id){
        $data = $request->except('_method', '_token');
        $this->card->where('user_id', $id)->update($data);
        $detail = $this->card->where('user_id', $id)->get();
        return view('card.show', compact('detail'));
    }
}
