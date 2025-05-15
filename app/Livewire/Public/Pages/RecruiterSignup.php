<?php

namespace App\Livewire\Public\Pages;

use App\Models\EmailVerification;
use App\Models\User;
use App\Notifications\OtpVerificationNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Layout("layouts.loginLayout")]
class RecruiterSignup extends Component
{
    #[Validate('required|string|max:255')]
    public $Fname;
    #[Validate('required|string|max:255')]
    public $Lname;
    #[Validate('required|email|unique:users,email')]
    public $email;
    #[Validate('required|string|min:8|regex:/[0-9]/|regex:/[^A-Za-z0-9]/')]
    public $password;

    public $showOtpForm = false;
    public $otp;
    public $verificationId;
    public $isResending = false;

    public function submitRegistrationForm()
    {
        $this->validate();
        $this->sendOtp();
    }

    public function sendOtp()
    {
        EmailVerification::where('email', $this->email)->delete();

        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        $verification = EmailVerification::create([
            'email' => $this->email,
            'otp' => Hash::make($otp),
            'expires_at' => Carbon::now()->addMinutes(10),
        ]);

        $this->verificationId = $verification->id;
        $verification->notify(new OtpVerificationNotification($otp));

        $this->showOtpForm = true;

        session()->flash('message', $this->isResending ? 'New OTP has been sent.' : 'Please verify your email with OTP.');
        $this->isResending = false;
    }

    public function resendOtp()
    {
        $this->isResending = true;
        $this->sendOtp();
    }

    public function verifyOtp()
    {
        $this->validate([
            'otp' => 'required|digits:6'
        ]);

        $verification = EmailVerification::find($this->verificationId);

        if (!$verification) {
            $this->addError('otp', 'Invalid verification session. Please try again.');
            return;
        }

        if (Carbon::now()->isAfter($verification->expires_at)) {
            $verification->delete();
            $this->addError('otp', 'OTP has expired. Please request a new one.');
            return;
        }

        if (!Hash::check($this->otp, $verification->otp)) {
            $this->addError('otp', 'Invalid OTP.');
            return;
        }

        $this->register();
    }

    public function register()
    {
        $this->validate();

        try {
            $user = User::create([
                'first_name' => $this->Fname,
                'last_name' => $this->Lname,
                'email' => $this->email,
                'password' => $this->password,
                'role' => 'recruiter',
            ]);

            EmailVerification::where('email', $this->email)->delete();
            auth()->login($user);

            return redirect()->route('teacher.dashboard')->with('success', 'Registration successful!');
        } catch (\Exception $e) {
            $this->addError('general', 'An error occurred during registration. Please try again.');
        };
    }
    public function render()
    {
        return view('livewire.public.pages.recruiter-signup');
    }
}
