<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // consultar las notificaiones del usaurio autenticado
        $unreadnotifications = auth()->user()->unreadNotifications;
        // tocad las notificaiones
        $notifications = auth()->user()->notifications;

        // marcar notificaiones como leidas una vez que se ingrese a la ruta
        auth()->user()->unreadNotifications->markAsRead();
        return view('notifications.index')
                    ->with('unreadnotifications', $unreadnotifications)
                    ->with('notifications',$notifications);
    }
}
