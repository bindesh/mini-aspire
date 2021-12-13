<?php

namespace Tests\Unit;

use App\Loan;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Factory as EloquentFactory;

class LoanTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

  

    public function testCreationOfLoanWithoutAuth(){
        $loan = factory(Loan::class)->make();
       
        $response = $this->json('POST','/api/loans/save-loan', $loan->toArray());
        $response->assertStatus(401);
        $response->assertJson(['message' => 'Unauthenticated.']);
    }

    public function testCreationOfLoanWithAuth(){
        $loan = factory(Loan::class)->make();
        $user = factory(User::class)->create();
        $response = $this->actingAs($user, 'api')->json('POST','/api/loans/save-loan', $loan->toArray());
        $response->assertStatus(200);
      
        $response->assertJson(['data' => $loan->toArray()]);
      
    }

    public function testFetchingAllLoanWithOutAuth(){
        $response = $this->json('GET','/api/loans');
        $response->assertStatus(401);
        $response->assertJson(['message' => 'Unauthenticated.']);
    }

    public function testFetchingAllLoanWithAuth(){
        $user = factory(User::class)->create();
        $response = $this->actingAs($user, 'api')->json('GET','/api/loans');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
            '*' => [
                'id', 
                'user', 
                'amount', 
                'duration', 
                'repayment_freq', 
                'interest_rate', 
                'arr_fee', 
                'status', 
                'created_at', 
                'updated_at', 
                'amount_left', 
                'repayments', 
                ]
            ]
        ]);
    }

    public function testFetchingSingleLoanByID(){
       
        $user = factory(User::class)->create();
        $loan = factory(Loan::class)->create([
            'user_id' => $user->id,
        ]);
        $response = $this->actingAs($user, 'api')->json('GET', '/api/loans/'.$loan->id);
        $response->assertStatus(200);
        $response->assertJson(['data' => ['user' => $user->toArray()]]);
        unset($loan{'user_id'});
        $response->assertJson(['data' => $loan->toArray()]);
    
    }

    public function testFetchingLoanDetailsOfOtherUser(){
        $user1 = factory(User::class)->create();
        $loan1 = factory(Loan::class)->create([
            'user_id' => $user1->id,
        ]);
        $user2 = factory(User::class)->create();
        $loan2 = factory(Loan::class)->create([
            'user_id' => $user2->id,
        ]);
        $response = $this->actingAs($user1, 'api')->json('GET', '/api/loans/'.$loan2->id);
        $response->assertStatus(403);
        $response->assertJson(['message' => 'You can only see your own loans.']);
    }
}
