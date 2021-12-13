<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repayment extends Model
{

    protected $fillable = ['user_id', 'loan_id', 'amount'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function loan(){
        return $this->belongsTo(Loan::class);
    }

    public static function saveRepayment($request, $loan){
        return    self::create(
            [
                'user_id' => $request->user()->id,
                'loan_id' => $loan->id,
                'amount' => $request->amount,
            ]
        );
    }
}
