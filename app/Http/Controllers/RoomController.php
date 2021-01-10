<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\RoomService;

class RoomController extends Controller
{
    public function adminRoomsList(Request $request)
    {
        $param = $request->all();
//        dd($param);
        $data = DB::table('rooms')
            ->where('is_deleted', '=', 0)
            ->orderBy('id', 'desc');
        if (isset($param['name'])) {
            $data = $data->where('name', 'LIKE', '%' . $param['name'] . '%');
        }
        if (isset($param['type'])) {
            $data = $data->where('type', 'LIKE', '%' . $param['type'] . '%');
        }
        if (isset($param['number_of_seats'])) {
            $data = $data->where('number_of_seats', '>=', $param['number_of_seats']);
        }
        if (isset($param['address'])) {
            $data = $data->where('address', $param['address']);
        }
        $rooms = $data->paginate(10);
        return view('admin.rooms.list')->with('rooms', $rooms);
    }

    public function adminRoomsAdd()
    {
        $services = Service::all();
        return view('admin.rooms.add')->with('services', $services);
    }

    public function adminRoomsSave(Request $request)
    {
        $data = $request->all();
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string'],
            'number_of_seats' => ['required', 'integer', 'min:0'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        if (isset($data['image'])) {
            $file = $data['image'];
            $file->move('img', $file->getClientOriginalName());
            $img = $file->getClientOriginalName();
        }
        $room = Room::create([
            'name' => trim($data['name']),
            'type' => $data['type'],
            'number_of_seats' => $data['number_of_seats'],
            'address' => $data['address'],
            'status' => 1,
            'images' => isset($data['image']) ? strval($img) : '[]',
        ]);

        if (isset($data['services'])) {
            $services = Service::whereIn('id', $data['services'])->get();
            foreach ($services as $service) {
                $rs = [
                    'room_id' => $room->id,
                    'service_id' => $service->id
                ];
                if ($service->type !== 'BOOLEAN') {
                    $rs['min'] = $data['min'][$service->id];
                    $rs['max'] = $data['max'][$service->id];
                }
                RoomService::create($rs);
            }
        }
        session()->flash('alert_success', 'Bạn đã thêm phòng họp thành công');
        return redirect()->route('admin.rooms.list');
    }

    public function adminRoomsDelete(Room $room)
    {
        $room->is_deleted = 1;
        $room->save();
        session()->flash('alert_success', 'Bạn đã xóa phòng họp thành công');
        return redirect()->route('admin.rooms.list');
    }

    public function adminRoomsEdit(Room $room)
    {
        $services = Service::all();
        $roomService = RoomService::where('room_id', $room->id)->get();
        return view('admin.rooms.edit')
            ->with('room', $room)
            ->with('services', $services)
            ->with('roomService', $roomService);
    }

    public function adminRoomsUpdate(Request $request, Room $room)
    {
        $data = $request->all();
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string'],
            'number_of_seats' => ['required', 'integer', 'min:0'],
            'address' => ['required', 'string', 'max:255']
        ]);

        if (isset($data['image'])) {
            $file = $data['image'];
            $file->move('img', $file->getClientOriginalName());
            $img = $file->getClientOriginalName();

        }
        $room->update([
            $room->name = trim($data['name']),
            $room->type = $data['type'],
            $room->number_of_seats = $data['number_of_seats'],
            $room->address = $data['address'],
            $room->images = isset($data['image']) ? $img : '[]',
        ]);

        RoomService::where('room_id', $room->id)->forceDelete();
        if (isset($data['services'])) {
            $services = Service::whereIn('id', $data['services'])->get();
            foreach ($services as $service) {
                $rs = [
                    'room_id' => $room->id,
                    'service_id' => $service->id
                ];
                if ($service->type !== 'BOOLEAN') {
                    $rs['min'] = $data['min'][$service->id];
                    $rs['max'] = $data['max'][$service->id];
                }
                RoomService::create($rs);
            }
        }
        session()->flash('alert_success', 'Bạn đã sửa phòng họp thành công');
        return redirect()->route('admin.rooms.list');
    }
}
