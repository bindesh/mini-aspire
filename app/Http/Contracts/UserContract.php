<?php

namespace App\Http\Contracts;

interface UserContract
{
   public function register(array $request);

   public function login(array $request);
}
