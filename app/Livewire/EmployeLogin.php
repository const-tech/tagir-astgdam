<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\LoginCode;
use Illuminate\Support\Facades\Auth;

class EmployeLogin extends Component
{
    public $screen = 'index';
    public $phone, $code;
    public function render()
    {
        return view('livewire.employe-login');
    }

    public function login()
    {
        $this->validate(['phone' => 'required|digits:10']);
        $user = User::wherePhone($this->phone)->whereType('employe')->first();
        if (!$user) {
            session()->flash('error', 'البيانات غير صحيحه');
        }
        $this->send_code($this->phone);
        session()->flash('success', 'تم ارسال الكود لهاتفك');
        $this->reset('phone');
        $this->screen = 'verify';
    }

    private function send_code($phone)
    {
        /* $test = [111111111, 222222222, 333333333];
        if (in_array($phone,$test)) {
            $code = 9999;
        } else {
            $code = random_int(1000, 9999);
        } */
        $code = 9999;
        return LoginCode::updateOrCreate(['phone' => $phone], ['code' => $code]);
    }

    public function verify()
    {
        $this->validate([
            'code' => 'required|digits:4',
            // 'fcm_token' => 'required',
            // 'device_id' => 'required'
        ]);
        $code = LoginCode::where('code', $this->code)->first();
        if (!$code) {
            session()->flash('error', 'البيانات غير صحيحه');
            return;
        }
        $user = User::wherePhone($code->phone)->first();
        if (!$user) {
            session()->flash('error', 'البيانات غير صحيحه');
            return;
        }
        $code->delete();
        // $user->fcm_tokens()->updateOrCreate(['device_id' => $request->device_id], [
        //     'token' => $request->fcm_token,
        //     'device_id' => $request->device_id,
        // ]);
        // $user->token = $token;
        Auth::login($user, true);
        return redirect()->route('home');
    }
}
