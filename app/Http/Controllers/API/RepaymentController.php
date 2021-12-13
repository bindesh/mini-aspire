<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\RepaymentResource;
use App\Loan;
use App\Repayment;

class RepaymentController extends BaseController
{
    public function store(Request $request, Loan $loan){
   
        if ($request->user()->id !== $loan->user_id){
            return response()->json(['message' => 'You can only update your own loans.'], 403);
        }
        if ($loan->status == 'Accepted'){
            $repay = Repayment::saveRepayment($request, $loan);
           
            if ($loan->repayment()->sum('amount') >= $loan->calcLoan()){
                // update status to complete
                $loan->status = 'Completed';
                $loan->save();
            }
            return new RepaymentResource($repay);
        }
        return response()->json(['message' => 'Your loan status is not Accepted.'], 403);
    }
}
