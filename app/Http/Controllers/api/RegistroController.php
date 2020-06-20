<?php

namespace App\Http\Controllers\api;

use App\Registro;

use App\Sensor;

use App\Sala;

use App\User;

use Illuminate\Support\Facades\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class registroController extends ApiResponseController
{
    //
    public function registro(Request $request){
        $sensor = Sensor::where('id','=', $request['id'])->take(1)->get();
        if(count($sensor)>0){
            $salax = Sala::where('id','=', $sensor[0]->sala_id)->take(1)->get();
            $temperatura = $salax[0]->temperatura;
            $temperatura_maxima = $salax[0]->temperatura + $salax[0]->t_mas;
            $temperatura_minima = $salax[0]->temperatura - $salax[0]->t_menos;
            if($request['temperatura']>$temperatura_maxima || $request['temperatura'] < $temperatura_minima){
                 //si la tempetura es igual al anterior q no haga nada
                $registro = Registro::where('sensor_id','=', $request['id'])->orderBy('id', 'asc')->take(1)->get();
                if($registro[0]->temperatura == $request['temperatura']){
                    echo $registro[0]->temperatura. " - ";
                    echo $request['temperatura'];
                    echo "no manda correo, temperatura igual a la anterior";
                } else {
                    $this->correo($request['id'], $request['temperatura'],$salax[0]->empresa_id, $salax[0]->nombre);
                }
                //$this->sms();
               // $this->enviar();
            }
            $registro = new Registro();
            $registro->sensor_id = $request['id'];
            $registro->temperatura = $request['temperatura'];
    
            $registro->save();
            return $registro;
        } else {
            return [];
        }

    }

    public function sensor(Request $request){
        $registros = Registro::where('sensor_id','=', $request['id'])
        ->orderBy('id', 'DESC')->take(1)->get();
        if (intval(count($registros)) == 0){
            return count($registros);
        } else {
            return $this->successResponse($registros[0]);
        }
    }


    public function login(Request $request){
        $user = $request['user'];
        $password= $request['pass'];
        $user = User::where('email', '=', $user)->first();
        if (!$user) {
            return response()->json(['success'=>false, 'message' => 'Login Fail, please check email id']);
        }
        if (!Hash::check($password, $user->password)) {
            return response()->json(['success'=>false, 'message' => 'Login Fail, pls check password']);
        }
        return $this->successResponse($user);
    }

    public function sms(){
        $basic  = new \Nexmo\Client\Credentials\Basic('4d7fe2be', '8tkh9u3MZDK41xM6');
        $client = new \Nexmo\Client($basic);

        $message = $client->message()->send([
            'to' => '526421097926',
            'from' => 'PC OK',
            'text' => 'Mensaje desde internet'
        ]);
    }

    public function enviar(){
            $objDemo = new \stdClass();
            $objDemo->demo_one = 'Demo One Value';
            $objDemo->demo_two = 'Demo Two Value';
            $objDemo->sender = 'SenderUserName';
            $objDemo->receiver = 'ReceiverUserName';
     
            Mail::to("allanz.ez@gmail.com")->send(new registroController($objDemo));
    }
    public function correo($sensor_id, $temperatura, $empresa_id, $sala){

        $usuarios = User::where('empresa_id','=', $empresa_id)->get();

        $data['title'] = "El sensor con ID ".$sensor_id." registro una temperatura fuera de rango de ".$temperatura. " grados centigrados en la sala ".$sala;
        $msg = "El sensor con ID ".$sensor_id." registro una temperatura fuera de rango de ".$temperatura. " grados centigrados en la sala ".$sala;
        foreach($usuarios as $usuario){
            $u = $usuario->email;
            $n = $usuario->name;
            Mail::send('emails.email', $data, function ($message) use ($u, $n) {
                $message->to($u, $n)
                    ->from('no-reply@energiahollman.com', 'Ricardo Hollman')
                    ->subject("Temperatura fuera de rango");
                //echo $u;
            });
    
            // if (Mail::failures()) {
            //     return "Mensaje no enviado";
            // } else {
            //     return "Mensaje enviado";
            // }
        }

        $apiToken = "1186657904:AAEy8oAzejmOko0rrt7dshja3e2RKFO1tY8";
        $data = [
            'chat_id' => '-350684539',
            'text' => $msg
        ];
        $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" . http_build_query($data) );    

    }

    public function dd(Request $request){
        $registros = Registro::all();
        return json_encode($registros);
    }
}
