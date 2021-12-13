<?php

namespace Tests\Unit;

use App\Loan;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RepaymentTest extends TestCase
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

    public function testRepaymentCreationWithOutAuth(){
        $response = $this->json('POST', '/api/repay/0');
        $response->assertStatus(401);
        $response->assertJson(['message' => 'Unauthenticated.']);
    }

    public function testtoUpdateotherUsersRepaymentInfo(){
        $user1 = factory(User::class)->create();
        $loan1 = factory(Loan::class)->create([
            'user_id' => $user1->id,
        ]);
        $user2 = factory(User::class)->create();
        $response = $this->actingAs($user2, 'api')->json('POST', '/api/repay/'.$loan1->id);
        $response->assertStatus(403);
        $response->assertJson(['message' => 'You can only update your own loans.']);
    }

    public function testRepaymentWithoutAcceptingLoan(){
        $user = factory(User::class)->create();
        $loan = factory(Loan::class)->create([
            'user_id' => $user->id,
            'status' => 'Pending',
        ]);
        $response = $this->actingAs($user, 'api')->json('POST', '/api/repay/'.$loan->id);
        $response->assertStatus(403);
        $response->assertJson(['message' => 'Your loan status is not Accepted.']);
    }

    public function testRepaymentWithAcceptingStatus(){
        $user = factory(User::class)->create();
        $loan = factory(Loan::class)->create([
            'user_id' => $user->id,
            'status' => 'Accepted',
        ]);
        $payload = ['amount' => '1000'];
        $response = $this->actingAs($user, 'api')->json('POST', '/api/repay/'.$loan->id, $payload);
        $response->assertStatus(201);
        unset($loan{'user_id'});
        $response->assertJson(['data' => ['loan' => $loan->toArray()]]);
       
    }
}
