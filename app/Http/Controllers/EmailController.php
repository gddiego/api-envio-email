<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\RequestStack;

class EmailController extends Model
{
    //


    public function sendEmail(Request $request)
    {

        $dados = $request->all();

        $chaves = array(
            'atendimento@cruzesantos.com.br' => 'uK00xNGGiO0AIBUIWRqg',
        );



        $token = $chaves[$dados['email_destino']];

        if ($token == $dados['token']) {
            Mail::send('emailcontato', $dados, function ($message, $dados) {
                $message->to($dados['email_destino'])->subject('Email enviado pelo site');
            });
        } else {
            return response()->json(['error' => 'Não foi possivel enviar o email verifique as informações']);
        }


        // if ($request->has('chave'))
        //
        // Mail::send(
        //     'emailcontato',
        //     $messages =  [
        //         'nome' => $request->input('nome'),
        //         'telefone' => $request->input('telefone'),
        //         'email' => $request->input('email'),
        //         'mensagem' => $request->input('mensagem'),

        //     ],
        //     function ($message, $dados) {

        //         $message->to($request->input('email_destino'))->subject('Email enviado pelo site');
        //     }
        // );




        return response()->json(['Email' => $dados]);
    }
}
