<?php

namespace App\Models\Traits\Method;

use App\Notifications\MailResetPasswordToken;

/**
 * Trait UserMethod.
 */
trait UserMethod
{
    /**
     * Send a password reset email to the user.
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MailResetPasswordToken($token));
    }
}
