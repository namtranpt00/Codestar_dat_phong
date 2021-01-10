<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function adminOrdersList(Request $request)
    {
        $param = $request->all();
        $data = DB::table('orders')
            ->orderBy('id', 'desc');
        if (isset($param['from_date'])) {
            $data->where('time_start', '>=', $param['from_date']);
        }
        if (isset($param['to_date'])) {
            $data->where('time_start', '<=', $param['to_date']);
        }

        if (isset($param['note'])) {
            $data->where('note', $param['note']);
        }
        if (isset($param['status'])) {
            $data->where('status', $param['status']);
        }
        $orders = $data->paginate(10);
//        $users_id = array();
//        $rooms_id = array();
//        foreach ($orders as $order) {
//            array_push($users_id, $order->user_id);
//            array_push($rooms_id, $order->room_id);
//
//        }
//        $users = DB::table('users')->whereIn('id',  $users_id)->get();
//
//        $rooms = DB::table('rooms')->whereIn('id',  $rooms_id)->get();
////        dd($rooms);


        return view('admin.orders.list')->with('orders', $orders);
//            ->with('users', $users)
//            ->with('rooms', $rooms);
    }

    public function adminOrdersAdd(Order $order)
    {

        $room = Room::find($order->room_id);
        $user = User::find($order->user_id);
        return view('admin.orders.add')
            ->with('order', $order)
            ->with('user', $user)
            ->with('room', $room);
    }

    public function adminOrdersSave(Order $order, Request $request)
    {
        $order->status = $request->status;
        $order->save();
        return redirect()->route('admin.orders.list');
    }
}
