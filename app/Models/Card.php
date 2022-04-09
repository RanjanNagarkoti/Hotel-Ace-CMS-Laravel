<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $fillable = ['card_holder_name', 'type', 'expiry_date', 'cvc_cvv', 'user_id', 'card_number'];

    public function card(){
        return $this->belongsTo(Card::class);
    }
}
