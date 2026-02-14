<?php

use App\Models\User;

it('can update the user profile', function () {
    $user = User::factory()->create([
        'name' => 'Old Name',
        'email' => 'old@example.com',
    ]);
    $this->actingAs($user);
    $response = $this->post(route('updateProfile'), [
        'name' => 'New Name',
        'email' => 'new@example.com',
    ]);
    $response->assertSessionHasNoErrors();
    $response->assertRedirect();
    $this->assertDatabaseHas('users', [
        'id'    => $user->id,
        'name'  => 'New Name',
        'email' => 'new@example.com',
    ]);
});

it('fails to update profile with invalid email', function () {
    $user = User::factory()->create();
    $this->actingAs($user);
    $response = $this->post(route('updateProfile'), [
        'name' => 'New Name',
        'email' => 'invalid-email',
    ]);
    $response->assertSessionHasErrors('email');
    $this->assertDatabaseHas('users', [
        'id'    => $user->id,
        'name'  => $user->name,
        'email' => $user->email,
    ]);
});

it('fails to update profile with duplicate email', function () {
    $user1 = User::factory()->create([
        'email' => 'duplicate@example.com',
    ]);
    $user2 = User::factory()->create([
        'email' => 'another@example.com',
    ]);
    $this->actingAs($user2);
    $response = $this->post(route('updateProfile'), [
        'name' => 'New Name',
        'email' => 'duplicate@example.com',
    ]);
    $response->assertSessionHasErrors('email');
    $this->assertDatabaseHas('users', [
        'id'    => $user2->id,
        'name'  => $user2->name,
        'email' => $user2->email,
    ]);
});

it('can change password with valid data', function () {
    $user = User::factory()->create([
        'password' => Hash::make('oldpassword'),
    ]);
    $this->actingAs($user);
    $response = $this->post(route('postChangePassword'), [
        'password' => 'newpassword',
        'password_confirmation' => 'newpassword',
    ]);
    $response->assertSessionHasNoErrors();
    $response->assertRedirect();
});
