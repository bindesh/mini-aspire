<?php 


namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Http\Contracts\LoanContract;
use App\Http\Resources\LoanResource;
use App\Loan;
use Auth;

class LoanService implements LoanContract
{

    public function getAllLoans(){
        $all_loans = Auth::user()->loans()->get();

        return LoanResource::collection($all_loans);
    }

    public function createLoanDetails(array $data){
       
            return Loan::create([
                'user_id' => Auth::id(),
                'amount' => $data['amount'],
                'duration' =>  $data['duration'],
                'repayment_freq' =>  !empty($data['repayment_freq'])?$data['repayment_freq']:'Monthly',
                'interest_rate' =>   !empty($data['interest_rate'])?$data['interest_rate']:5,
            ]);
       
        

        
    }

    public function getLoanByID($id){
        return Loan::find($id);
    }

    public function updateLoan($data, $loan_obj){
        if($loan_obj){
            $loan_obj->user_id = Auth::id();
            $loan_obj->amount = $data['amount'];
            $loan_obj->duration =$data['duration'];
            $loan_obj->repayment_freq = !empty($data['repayment_freq'])?$data['repayment_freq']:'Monthly';
            $loan_obj->interest_rate = !empty($data['interest_rate'])?$data['interest_rate']:5;
            $loan_obj->save();
            return $loan_obj;
        }
    }

    public function acceptLoan($id){
        $loan = Loan::find($id);
        if($loan){
            $loan->update([
                'status'=>'Accepted'
            ]);
            
        }
        return $loan;

    }
}