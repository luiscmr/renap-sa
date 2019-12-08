<?php

namespace Modules\Autenticacion\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnviarPassword extends Mailable
{
    use Queueable, SerializesModels;
    public $password;
    public $cui;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($password,$cui)
    {
        $this->password = $password;
        $this->cui = $cui;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = 'no-reply@renap.gob.gt';
        $mail = $this->from($email,'Renap')
                    ->markdown('autenticacion::mail.password')
                    ->subject('Nueva Contraseña')
                    ->with(['password' => $this->password,'cui' => $this->cui])
                    ;
        return $mail;
    }
}
