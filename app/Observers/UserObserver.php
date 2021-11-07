<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        //
        $email_list['email'] = $user->email;
        $email_list['user'] = $user;
        dispatch(new \App\Jobs\QueueJob($email_list));
        // dd('User created dy');
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        //
        // if ($user->wasChanged()){
        //     dd('The user table has been updated');
        // }
        // dd('The user table has been updated');
        $email_list['email'] = $user->email;
        $email_list['user'] = $user;
        dispatch(new \App\Jobs\UpdatedEmailJob($email_list));
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //To make changes for delete observer
        // dd('The selected user has been deleted');
        $email_list['email'] = $user->email;
        $email_list['user'] = $user;
        dispatch(new \App\Jobs\DeletedJob($email_list));
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
