<?php

namespace Modules\Autenticacion\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Modules\Autenticacion\Mail\EnviarPassword;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Modules\Usuarios\Entities\Persona;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */
    use SendsPasswordResetEmails;

    /**
     * Display the form to request a password reset link.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        return view('autenticacion::auth.passwords.email');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);

        $persona = Persona::where('cui', $request->cui)->first();

        if(!$persona) return redirect()->back()->with('alert_error',__('CUI no existe'))->withInput($request->only('cui'));
        $password = Str::random(8);
        $persona->update(['password' => $password]);
        // We will send the password reset link to this user. Once we have attempted
        // to send the link, we will examine the response then see the message we
        // need to show to the user. Finally, we'll send out a proper response.

        Mail::to($request->email)->send(new EnviarPassword($password, $request->cui));
        return redirect()->route('login')->with('alert_success',__('Contraseña nueva enviada al correo proporcionado.'));
    }

    /**
     * Validate the email for the given request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return void
     */
    protected function validateEmail(Request $request)
    {
        $request->validate(['cui' => 'required','email' => 'required|email']);
    }
}
