<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $password;

    /**
     * Crear una nueva instancia de mensaje.
     *
     * @param  \App\Models\User  $user
     * @param  string  $password
     * @return void
     */
    public function __construct(User $user, $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Construir el mensaje.
     *
     * @return \Illuminate\Mail\Mailable
     */
    public function build()
    {
        return $this->subject('Tu nueva cuenta en el sistema')
            ->view('emails.user-created') 
            ->with([
                'user' => $this->user,
                'password' => $this->password,
            ]);
    }
}
