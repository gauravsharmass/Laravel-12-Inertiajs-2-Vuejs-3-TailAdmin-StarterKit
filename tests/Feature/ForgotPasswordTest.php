<?php

use App\Models\User;
use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;


it('sends a password reset link to the user', function () {
    Notification::fake();
    $user = User::factory()->create(['email' => 'test@example.com']);
    $response = $this->post('/forgot-password', [
        'email' => 'test@example.com',
    ]);
    $response->assertSessionHasNoErrors();
    Notification::assertSentTo($user, ResetPassword::class);
});

it('fails to send password reset link with invalid email', function () {
    $response = $this->post('/forgot-password', [
        'email' => 'invalid-email',
    ]);
    $response->assertSessionHasErrors('email');
});




it('resets the password with a valid token', function () {
    $user = User::factory()->create([
        'password' => Hash::make('old-password')
    ]);
    $token = Password::broker()->createToken($user);
    $response = $this->post('/reset-password', [
        'token' => $token,
        'email' => $user->email,
        'password' => 'new-password',
        'password_confirmation' => 'new-password',
    ]);

    $response->assertRedirect('/'); 
});

it('does not reset password with an invalid token', function () {
    $user = User::factory()->create(['password' => Hash::make('old-password')]);
    $this->post('/reset-password', [
        'token' => 'invalid-token',
        'email' => $user->email,
        'password' => 'new-password',
        'password_confirmation' => 'new-password',
    ]);

    expect(Hash::check('old-password', $user->fresh()->password))->toBeTrue();
});



