<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'no_hp' => '08' . fake()->numerify('##########'),
            'blok_rumah' => 'Blok ' . fake()->randomLetter() . ' No. ' . fake()->numberBetween(1, 30),
            'role' => 'warga',
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * State: jadikan user ini sebagai admin.
     * Penggunaan: User::factory()->admin()->create();
     */
    public function admin(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'admin',
        ]);
    }

    /**
     * State: jadikan user ini sebagai warga (default, disediakan untuk eksplisit di seeder).
     */
    public function warga(): static
    {
        return $this->state(fn (array $attributes) => [
            'role' => 'warga',
        ]);
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}