<?php
namespace App\Policies;

// app/Policies/UserPolicy.php
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Policies\UserPolicy;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
  
    use HandlesAuthorization;

    
    public function viewAny(User $user)   // is used to completely hide resources from the navigation menu, and prevents the user from accessing any pages.
    {
        return !$user->hasRole(['admin','writer','user','su']);
        

    }
    
   
    
    public function create(User $user)     
    {
    
       return !$user->hasRole(['admin','writer','user','su']);
       
    }
    public function update (User $user)   
    {
        return !$user->hasRole(['admin','writer']);
       

    }
    public function view(User $user)  
    {
       // return $user->hasRole(['admin','writer','user','su']);
       return !$user->hasRole(['admin','writer']);


    }
    public function delete(User $user)        
    {
        return !$user->hasRole(['admin','writer']);
       //return $user->hasAnyRole('admin');

    }
   
   }









