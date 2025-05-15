<?php

namespace App\Jobs;

use App\Models\EmailVerification;
use App\Notifications\OtpVerificationNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SendOtpNotification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */

    protected $otp;
    protected $verification;
    public function __construct(EmailVerification $verification, string $otp)
    {
        $this->verification = $verification;
        $this->otp = $otp;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->verification->notify(new OtpVerificationNotification($this->otp));
    }
}
