<?php

namespace App\Http\Controllers;


use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceController extends Controller
{
    public function adminServicesList(Request $request)
    {
        $param = $request->all();
        $data = DB::table('services')->where('status','=',1);

        if (isset($param['name'])) {
            $data = $data->where('name', 'LIKE', '%' . $param['name'] . '%');
        }

        if (isset($param['type'])) {
            $data = $data->where('type', 'LIKE', '%' . $param['type'] . '%');
        }

        $services = $data->where('status', '=', 1)
            ->orderByDesc('id')->paginate(10);
        return view('admin.services.list')->with('services', $services);
    }

    public function adminServicesAdd()
    {
        return view('admin.services.add');
    }

    public function adminServicesSave(Request $request)
    {
        $data = $request->all();
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'in:BOOLEAN,INTEGER']
        ]);
        Service::create([
            'name' => trim($data['name']),
            'type' => $data['type'],
        ]);
        session()->flash('alert_success', 'Bạn đã thêm dịch vụ thành công');
        return redirect()->route('admin.services.list');
    }

    public function adminServicesDelete(Service $service)
    {
        $service->status=0;
        $service->save();
        session()->flash('alert_success', 'Bạn đã xóa dịch vụ thành công');
        return redirect()->route('admin.services.list');
    }

    public function adminServicesEdit(Service $service)
    {
        return view('admin.services.edit')->with('service', $service);
    }

    public function adminServicesUpdate(Service $service, Request $request)
    {
        $data = $request->all();
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'in:BOOLEAN,INTEGER']
        ]);
        $service->update([
            $service->name = trim($data['name']),
            $service->type = $data['type']
        ]);

        session()->flash('alert_success', 'Bạn đã sửa dịch vụ thành công');
        return redirect()->route('admin.services.list');
    }
}
