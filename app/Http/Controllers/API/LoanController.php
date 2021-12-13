<?php

namespace App\Http\Controllers\API;



use App\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoanRequest;
use App\Http\Resources\LoanResource;
use App\Http\Services\LoanService;
use App\Loan;

class LoanController extends BaseController
{
    protected $loan_service;
    public function __construct(LoanService $loan_service)
    {
       $this->loan_service = $loan_service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_loans = $this->loan_service->getAllLoans();

        return $this->sendResponse($all_loans, 'All available loans take by the user');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoanRequest $request)
    {
       $save_loan_details =  $this->loan_service->createLoanDetails($request->all());
       if($save_loan_details){
            return $this->sendResponse($save_loan_details, 'Loan Details saved successfully');
       }else{
            return $this->sendError('Something went wrong');
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
     
        $loan = $this->loan_service->getLoanByID($id);
        if ($request->user()->id !== $loan->user_id){
            return response()->json(['message' => 'You can only see your own loans.'], 403);
        }
        return new LoanResource($loan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LoanRequest $request, $id)
    {
        $loan = $this->loan_service->getLoanByID($id);
        if ($request->user()->id !== $loan->user_id){
            return response()->json(['message' => 'You can only update your own loan details.'], 403);
        }

        $update_loan_details = $this->loan_service->updateLoan($request->all(), $loan);

        if($update_loan_details){
            return $this->sendResponse($update_loan_details, 'Loan Details updated successfully');
        }else{
                return $this->sendError('Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function acceptLoan($id){
        $accept_loan = $this->loan_service->acceptLoan($id);

        if($accept_loan){
            return $this->sendResponse($accept_loan, 'Loan is Accepted');
        }else{
                return $this->sendError('Something went wrong');
        }
    }
}
