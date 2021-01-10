<?php

namespace App\Http\Controllers;


use App\Models\Room;
use App\Models\RoomService;
use App\Models\Service;
use App\Models\Order;
use App\Models\OrderDetail;
//use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{

    public function booking(Request $request)
    {
        $param = $request->all();
        $data = DB::table('rooms');
        if ($request->delete) {
            session()->flash('alert_fail', 'Bạn đã xóa người dùng thành công');
        }
        if (isset($param['name'])) {
            $data = $data->where('name', 'LIKE', '%' . $param['name'] . '%');
        }
        if (isset($param['number_of_seats'])) {
            $data = $data->where('number_of_seats', '>=', $param['number_of_seats'])
                ->orderBy('number_of_seats');
        }
        if (isset($param['type'])) {
            $data = $data->where('type', 'LIKE', '%' . $param['type'] . '%');
        }

        $list = $data->where('is_deleted', '=', 0)
            ->orderByDesc('id')
            ->paginate(10);
        return view('user.list')->with('rooms', $list);
    }


    public function roomDetail(Room $room)
    {
        $roomServices = RoomService::where('room_id', $room->id)->get();
        $service_id = array();
        foreach ($roomServices as $k => $roomService){
            array_push($service_id,$roomService->toArray()['service_id'])  ;
        }
        $Services = Service::whereIn('id', $service_id)->get();
        return view('user.roomDetails')->with('room', $room)
            ->with('services', $Services)
            ->with('roomServices', $roomServices);
    }

    public function bookingSave( Room $room, Request $request)
    {
        $param= $request->all();
        $order = new Order();
        $order->room_id = $room->id;
        $order->user_id = Auth::id();

        $order->note = $param['note'];
        if ($param['time'] == 0) {
            $date = explode("-", $param['date']);
            $order->time_start = mktime(6, 0, 0, intval($date[1]),
                intval($date[2]), intval($date[0]));
            $order->time_end = mktime(12, 0, 0, intval($date[1]),
                intval($date[2]), intval($date[0]));
        } else {
            $date = explode("-", $param['date']);
            $order->time_start = mktime(13, 0, 0, intval($date[1]),
                intval($date[2]), intval($date[0]));
            $order->time_end = mktime(18, 0, 0, intval($date[1]),
                intval($date[2]), intval($date[0]));
        }
        $order->save();
        session()->flash('alert_success', 'Bạn đã thêm thành công yêu cầu đặt phòng');
        return redirect()->route('room.booking');
    }
    public function orderDetail(Request $request){
        $param = $request->all();
        $data = DB::table('orders')->where('user_id','=',Auth::id())
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
        return view('user.orderDetail')->with('orders',$orders);
    }
}
