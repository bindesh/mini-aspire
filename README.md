# mini-aspire
hr
Mini Aspire API provides Loan Accessbility features for the user:

* Register new user & Login
* Create, get, update a loan
* Get list of loans
* Create repayment for a loan

# Requirements
Project is is Created is Laravel 5.8 with php 7.2 and mysql 5.6

# Installations

 * Clone the repo.
 * Run composer install
 * php artisan migrate

# Running Test Cases
 * Test Cases can be run by the phpunit.
 * phpunit --filter LoanTest

# API Details.

 * Added the postman collection verify that

# Assumptions 
 * Uer must login to create loan, get loan, create repayment
 * User must repay : amount + (interest_rate/100 * duration * amount)
 * Default loan status = Pending
 * User able to create repayment if loan status = Accepted
 * After loan fully repaid, function will set loan status = Completed
