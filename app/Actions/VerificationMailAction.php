<?php

namespace App\Actions;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;

class VerificationMailAction
{
    /**
     * Send a verification code to the given email.
     */
    public function sendCode(string $email): string
    {
        $code = rand(100000, 999999);

        // Store code in cache for 10 minutes
        Cache::put('email_verification_' . $email, $code, now()->addMinutes(10));

        // Send plain text email
        Mail::raw("Your verification code is: {$code}", function ($message) use ($email) {
            $message->to($email)
                    ->subject('Verify Your Email - Budget App');
        });

        return $code;
    }

    /**
     * Verify the given code against the cached one.
     */
    public function verify(string $email, string $code): bool
    {
        $cachedCode = Cache::get('email_verification_' . $email);

        if ($cachedCode && $cachedCode == $code) {
            // Clear the code after successful verification
            Cache::forget('email_verification_' . $email);
            return true;
        }

        return false;
    }
}
