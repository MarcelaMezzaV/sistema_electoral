<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function updateAuthorize(User $user, User $useredit){
        if($user->hasAnyRole(['admin'])){//verifiacndo si es admin para que pueda editar cualquier perfil
            return true;
        }
        return $user->id === $useredit->id;//esto devolvera true si es igual y podra actualizar y falso si no
    }
    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
}
