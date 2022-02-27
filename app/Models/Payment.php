<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = array('id_user', 'month', 'date_payment','value');
    protected $table = 'payment';
    public function userpayment()
    {
        return $this->hasMany(User::class);
    }
}
