<?php

use App\Models\User;
use function Pest\Laravel\actingAs;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Laravel\putJson;

$userWithTransactions = function (bool $proAccount = true): array {
    $account = bankAccount();
    $transaction = transaction(['bank_account_id' => $account->id]);

    if (! $proAccount) {
        \Illuminate\Support\Facades\Config::set('pioneer.min', 0);
        $account->bankConnection->user->update(['trial_ends_at' => now()->subDay()]);
    }

    return [$account->bankConnection->user, $transaction];
};

$createToken = fn (User $user): string => actingAs($user)
    ->post('/api/tokens', ['name' => 'Any name'])->json('access_token');

it('update transaction with notes and category_id', function () use ($userWithTransactions, $createToken) {
    [$user, $transaction] = $userWithTransactions();
    $token = $createToken($user);

    $data = ['category_id' => 5, 'notes' => 'Random notes to test'];
    putJson('v1/transactions/'.$transaction->id, $data, ['Authorization' => 'Bearer '.$token])
        ->assertSuccessful();

    assertDatabaseHas(
        'transactions',
        [
            'id' => $transaction->id,
            ...$data,
        ]
    );
});
