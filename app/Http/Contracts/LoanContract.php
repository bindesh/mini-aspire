<?php

namespace App\Http\Contracts;

interface LoanContract
{
   public function getAllLoans();

   public function createLoanDetails(array $data);

   public function getLoanByID($id);
}
