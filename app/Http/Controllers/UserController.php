<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function adminUsersList(Request $request)
    {
        $param = $request->all();
        $data = DB::table('users')
            ->where('activated','=',1)
            ->orderBy('id', 'desc');
        if (isset($param['name'])) {
            $data = $data->where('name', 'LIKE', '%' . $request->name . '%')
                ->orWhere('email', 'LIKE', '%' . $request->get('name') . '%');
        }
        if (isset($param['is_admin'])) {
            $data = $data->where('is_admin', $request->get('is_admin'));
        }
        if (isset($param['roll'])) {
            $data = $data->where('roll', $request->get('roll'));
        }
        $list = $data->paginate(10);
        return view('admin.users.list')->with('users', $list);
    }

    public function adminUsersAdd()
    {
        return view('admin.users.add');
    }

    public function adminUsersSave(Request $request)
    {
        $data = $request->all();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);
//        dd($data);
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'roll' => $data['roll'],
            'activated' => isset($data['activated']) ? intval($data['activated']) : 0,
            'is_admin' => isset($data['is_admin']) ? intval($data['is_admin']) : 0,
            'password' => Hash::make($data['password']),
        ]);
        session()->flash('alert_success', 'Bạn đã thêm người dùng thành công');
        return redirect()->route('admin.users.list');
    }

    public function adminUsersDelete(User $user)
    {
        if (Auth::id() != $user->id) {
            $user->activated = 0;
            $user->save();
        }
        session()->flash('alert_success', 'Bạn đã xóa người dùng thành công');
        return redirect()->route('admin.users.list');
    }

    public function adminUsersEdit(User $user)
    {

        return view('admin.users.edit')->with('user', $user);
    }

    public function adminUsersUpdate(Request $request, User $user)
    {

        $data = $request->all();
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        if(isset($request->password)){
            $request->validate(['password' => [ 'string', 'min:8', 'confirmed']]);
        }
        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'roll' => $data['roll'],
            'is_admin' => isset($data['is_admin']) ? intval($data['is_admin']) : 0,
            'password' => Hash::make($data['password']),
        ]);
        session()->flash('alert_success', 'Bạn đã sửa người dùng thành công');
        return redirect()->route('admin.users.list');
    }
}
