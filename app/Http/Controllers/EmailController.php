<?php

namespace App;

use GuzzleHttp\Psr7\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\RequestStack;

class EmailController extends Model
{
    //

    public function sendEmail(Request $request)
    {

        Mail::send(
            'pages.site.emailcontato',
            $message = [
                'nome' => $request->$request->input('nome'),
                'email' => $request->$request->input('email'),
                'mensagem' => $request->$request->input('mensagem'),

            ],
            function ($message) {

                $message->to('diego@bksoft.com.br')->subject('Email de contato');
            }
        );


        return response()->json(['message', $message]);
    }
}
