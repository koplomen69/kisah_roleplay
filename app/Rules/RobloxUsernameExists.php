<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Services\RobloxService;

class RobloxUsernameExists implements ValidationRule
{
    protected $robloxService;

    public function __construct()
    {
        $this->robloxService = new RobloxService();
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (empty($value)) {
            $fail('The :attribute field is required.');
            return;
        }

        $verification = $this->robloxService->verifyUser($value);

        if (!$verification['exists']) {
            $fail($verification['error'] ?? 'This Roblox username does not exist or is invalid.');
        }
    }
}
