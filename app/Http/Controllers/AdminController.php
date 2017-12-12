<?php

namespace App\Http\Controllers;

//use Tymon\JWTAuth\Exceptions\JWTExceptio;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function index()
    {
        return view('admin.content');
    }

    public function newUser()
    {
        return view('auth.register');
    }

    public function adminSetting()
    {
        $users = User::all();
        return view('admin.controlAdmin.admin', compact('users'));
    }

    /**
     * Показать форму
     * для изминения пароля
     **/
    public function showFormReset($name, $id)
    {
//        $token = User::all('token')->where('id',$id);,compact('token')
        return view('auth.passwords.reset', compact('id'), compact('name'));
    }

    /**
     * Изменить пароль
     **/
    public function resetPassword($id)
    {
        $this->validate(request(), [
            'password' => 'required|min:5|max:255',
        ]);
        if (!empty($id) && request('password')) {

            $password = Hash::make(request('password'));
            User::query()
                ->where('id', $id)
                ->update([
                    'password' => $password
                ]);
            return redirect(route('adminSetting'));
        }
    }

    /**
     * Добавляем нового админа
     **/
    public function create(){

        $this->validate(request(), [
            'name' => 'required|min:5|max:255',
            'password' => 'required|min:5|max:255',
        ]);
        $password = Hash::make(request('password'));
        User::query()->create([
            'name'     => request('name'),
            'password' => $password,
        ]);
        return redirect(route('adminSettings'));
    }
    /**
     * Удаляем администратора
     */
    public function destroy($id)
    {

        if ($id != Auth::id()) {
            $user = User::query()->find($id);
            $user->delete();
        }
        return redirect(route('adminSettings'));
    }
}