<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class AuthPage extends Component
{
    public $isRegisterMode = false;

    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $remember = false;


    protected function rules()
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];

        if ($this->isRegisterMode) {
            $rules['name'] = 'required|min:3|max:255';
            $rules['email'] .= '|unique:users,email';
            $rules['password_confirmation'] = 'required|same:password';
        }

        return $rules;
    }

    protected $messages = [
        'name.required' => 'Nama lengkap wajib diisi.',
        'name.min' => 'Nama minimal 3 karakter.',
        'email.required' => 'Alamat email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'email.unique' => 'Email ini sudah terdaftar.',
        'password.required' => 'Password wajib diisi.',
        'password.min' => 'Password minimal 8 karakter.',
        'password_confirmation.required' => 'Konfirmasi password wajib diisi.',
        'password_confirmation.same' => 'Konfirmasi password tidak sesuai dengan password.',
    ];

    public function mount()
    {
        if (Auth::check()) {
            return redirect()->intended(route('home'));
        }
    }

    public function switchToRegister()
    {
        $this->isRegisterMode = true;
        $this->resetForm();
    }

    public function switchToLogin()
    {
        $this->isRegisterMode = false;
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->reset(['name', 'email', 'password', 'password_confirmation', 'remember']);
        $this->resetErrorBag();
    }

    public function submit()
    {
        $this->validate();

        if ($this->isRegisterMode) {
            $this->handleRegistration();
        } else {
            $this->handleLogin();
        }
    }

    private function handleRegistration()
    {
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('status', 'Registrasi berhasil!');
        return $this->redirect(route('home'), navigate: true);
    }

    private function handleLogin()
    {
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            session()->regenerate();
            session()->flash('status', 'Login berhasil!');
            return $this->redirect(url('/'), navigate: true);
        }

        $this->addError('email', 'Email atau password salah.');
    }

    public function render()
    {
        return view('livewire.auth-page')->layout('components.layouts.guest.auth');
    }
}
