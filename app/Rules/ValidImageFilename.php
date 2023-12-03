<?php

namespace App\Rules;

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ValidImageFilename implements Rule
{


    public function passes($attribute, $value)
    {
       return preg_match('/^[a-zA-Z0-9]+$/', pathinfo($value, PATHINFO_FILENAME));
    }

    public function message()
    {
        return 'The :attribute must contain only alphanumeric characters.';
    }

}
