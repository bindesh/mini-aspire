<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;
class Loan extends Model
{
    // use HasFactory;

    protected $fillable =[
        'user_id',
        'amount',
        'duration',
        'repayment_freq',
        'interest_rate',
        'status'
    ];
    public function repayment(){
        return $this->hasMany(Repayment::class);
    }

    public function calcLoan(){
        $debt = $this->amount + ($this->amount * ($this->duration * $this->interest_rate / 100));
        return $debt;
    }

    public function amountLeft(){
        $debt = $this->calcLoan() - $this->repayment()->sum('amount');
        return $debt;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

   
}
