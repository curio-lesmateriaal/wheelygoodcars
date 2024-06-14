<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Car;
use Illuminate\Auth\Access\HandlesAuthorization;

class CarPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Car $car)
    {
        // Implementeer logica om te bepalen of de gebruiker de auto mag bekijken
        return true; // Voorbeeld: laat altijd toe
    }

    public function update(User $user, Car $car)
    {
        return $user->id === $car->user_id;
    }

    public function delete(User $user, Car $car)
    {
        return $user->id === $car->user_id;
    }
}
