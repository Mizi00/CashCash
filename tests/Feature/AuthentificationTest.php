<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Employee;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AuthentificationTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * Tests the login functionality for an employee.
     * Creates an employee for testing.
     * Attempts to log in using the employee's credentials.
     * Asserts redirection to the intended URL after successful login.
     * Asserts that the user is authenticated after login.
     */
    public function test_employee_can_login(): void
    {
        // Create a employee for testing
        $employee = Employee::factory()->create();

        // Attempt to log in with the employee's credentials
        $response = $this->post('/login', [
            'mailAddress' => $employee->mailAddress,
            'password' => 'P@ssword',
        ]);

        // Assert that the user is redirected to the intended URL after successful login
        $response->assertRedirect('/stats');

        // Assert that the user is authenticated
        $this->assertAuthenticatedAs($employee);
    }
}
