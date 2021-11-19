<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function mark_all_notifications(){
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->route('admin_orders.index');
    }
    public function mark_a_notifications($notification_id, $compra_id){
        auth()->user()->unreadNotifications->when($notification_id, function($query) use($notification_id){
            return $query->where('id',$notification_id);
        })->markAsRead();
        $compra = Compra::find($compra_id);
        return redirect()->route('detalles_orders.show',$compra);
    }
}
