<?php

namespace App\Listeners;

use App\Events\LoginLogs;
use Illuminate\Support\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

class LoginListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(LoginLogs $event): void
    {
        //storing data
        $time=Carbon::now()->toDateTimeString();
        $username=$event->username;
        $phone=$event->phone;
        $email = $event->email;

        DB::table('login_logs')->insert([
            'name' => $username,
            'phone' => $phone,
            'email' => $email,
            'created_at' => $time,
            'updated_at' => $time
        ]);
    }
}
