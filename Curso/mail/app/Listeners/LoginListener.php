<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Auth\Events\Login;
use App\Mail\NovoAcesso;
use Illuminate\Support\Facades\Mail;

class LoginListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(Login $event)
    {
        info('Logou!');
        info($event->user->name);
        info($event->user->email);
        // user, users[], email

        $quando = now()->addMinutes(5);

        Mail::to($event->user)
            //->send(new NovoAcesso($event->user));
            ->queue(new NovoAcesso($event->user));
            //->later($quando, new NovoAcesso($event->user));
        Mail::to($event->user)
            ->queue(new NovoAcesso($event->user));            
        Mail::to($event->user)
        ->queue(new NovoAcesso($event->user));            
        Mail::to($event->user)
        ->queue(new NovoAcesso($event->user));            
        Mail::to($event->user)
        ->queue(new NovoAcesso($event->user));            


    }

}
