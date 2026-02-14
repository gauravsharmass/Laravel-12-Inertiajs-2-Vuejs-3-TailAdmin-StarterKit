<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;

describe('Authentication', function () {
    describe('Registration', function () {
        it('displays the registration form', function () {
            $response = $this->get('/register');

            $response->assertSuccessful();
            $response->assertInertia(
                fn($page) => $page
                    ->component('Auth/Register')
            );
        });

        it('registers a new user with valid data', function () {
            // $this->withoutExceptionHandling();

            $response = $this->post('/register', [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => 'password123',
                'password_confirmation' => 'password123',
                'terms' => 'on',
                'role_id' => 2,
            ]);



            $this->assertDatabaseHas('users', [
                'name' => 'John Doe',
                'email' => 'john@example.com',
            ]);

            $response->assertRedirect('/login');
        });

        it('fails registration with invalid email', function () {
            $response = $this->post('/register', [
                'name' => 'John Doe',
                'email' => 'invalid-email',
                'password' => 'password123',
                'password_confirmation' => 'password123',
                'role_id' => 2,
            ]);

            $response->assertInvalid('email');
            $this->assertDatabaseMissing('users', [
                'name' => 'John Doe',
            ]);
        });

        it('fails registration with mismatched passwords', function () {
            $response = $this->post('/register', [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => 'password123',
                'password_confirmation' => 'different-password',
                'role_id' => 2,
            ]);

            $response->assertInvalid('password');
            $this->assertDatabaseMissing('users', [
                'email' => 'john@example.com',
            ]);
        });

        it('fails registration with duplicate email', function () {
            User::factory()->create([
                'email' => 'john@example.com',
            ]);

            $response = $this->post('/register', [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => 'password123',
                'password_confirmation' => 'password123',
                'role_id' => 2,
            ]);

            $response->assertInvalid('email');
        });

        it('fails registration with missing required fields', function () {
            $response = $this->post('/register', [
                'name' => '',
                'email' => '',
                'password' => '',
            ]);

            $response->assertInvalid(['name', 'email', 'password']);
        });
    });

    describe('Login', function () {
        it('displays the login form', function () {
            $response = $this->get('/login');

            $response->assertSuccessful();
            $response->assertInertia(
                fn($page) => $page
                    ->component('Auth/Login')
            );
        });

        it('logs in a user with valid credentials', function () {
            $user = User::factory()->create([
                'password' => Hash::make('password123'),
            ]);

            $response = $this->post('/login', [
                'email' => $user->email,
                'password' => 'password123',
            ]);

            $this->assertAuthenticatedAs($user);
            $response->assertRedirect('/user-dashboard');
        });

        it('fails login with invalid email', function () {
            $response = $this->post('/login', [
                'email' => 'nonexistent@example.com',
                'password' => 'password123',
            ]);

            $response->assertSessionHas('error', 'Invalid credentials,Please try again!');

            $this->assertGuest();
        });

        it('fails login with incorrect password', function () {
            $user = User::factory()->create([
                'password' => Hash::make('correct-password'),
            ]);

            $response = $this->post('/login', [
                'email' => $user->email,
                'password' => 'wrong-password',
            ]);

            $response->assertSessionHas('error', 'Invalid credentials,Please try again!');

            $this->assertGuest();
        });

        it('fails login with missing email', function () {
            $response = $this->post('/login', [
                'email' => '',
                'password' => 'password123',
            ]);

            $response->assertInvalid('email');
            $this->assertGuest();
        });

        it('fails login with missing password', function () {
            $response = $this->post('/login', [
                'email' => 'test@example.com',
                'password' => '',
            ]);

            $response->assertInvalid('password');
            $this->assertGuest();
        });
    });

    describe('Logout', function () {
        it('logs out an authenticated user', function () {
            $user = User::factory()->create();

            $response = $this->actingAs($user)
                ->post('/logout');

            $this->assertGuest();
            $response->assertRedirect('/login');
        });

        it('cannot logout when not authenticated', function () {
            $response = $this->post('/logout');

            $response->assertRedirect('/');
        });
    });
});
