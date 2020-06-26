<?php

namespace App;

use Exception;
use Illuminate\Support\Facades\Http;

trait MustVerifyMobile
{
    protected $api_key = '394e6c7f-b21e-11ea-9fa5-0200cd936042';
    protected $template = 'default';

    /**
     * Determine if the user has verified their mobile address.
     *
     * @return bool
     */
    public function hasVerifiedMobile()
    {
        return !is_null($this->mobile_verified_at);
    }

    /**
     * Mark the given user's mobile as verified.
     *
     * @return bool
     */
    public function markMobileAsVerified()
    {
        return $this->forceFill([
            'mobile_verified_at' => $this->freshTimestamp(),
        ])->save();
    }

    /**
     * Send the mobile verification notification.
     *
     * @return void
     */
    public function sendMobileVerificationNotification()
    {
        session(['otp_id' => Http::get("https://2factor.in/API/V1/{$this->api_key}/SMS/{$this->getMobileForVerification()}/AUTOGEN/{$this->template}")['Details']]);
    }

    public function isValidOTP($otp)
    {
        $res = Http::get("https://2factor.in/API/V1/{$this->api_key}/SMS/VERIFY/" . session('otp_id', '') . "/{$otp}");
        return $res->successful() && $res['Details'] == 'OTP Matched';
    }

    /**
     * Get the email address that should be used for verification.
     *
     * @return string
     */
    public function getMobileForVerification()
    {
        return $this->mobile;
    }
}
