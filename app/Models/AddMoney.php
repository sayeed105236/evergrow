<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class AddMoney extends Model
{
    use HasFactory;
      protected $guarded =[];
    protected $table ="add_money";
    public function user()
    {

         return $this->belongsTo(User::class, 'user_id');

    }
    public function receiver()
    {
        return $this->belongsTo(User::class,'receiver_id');
    }
    public function sender()
    {
        return $this->belongsTo(User::class,'received_from');
    }


}
