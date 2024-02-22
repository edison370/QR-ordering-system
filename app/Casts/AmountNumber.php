<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class AmountNumber implements CastsAttributes
    {
        public function get($model, $key, $value, $attributes)
        {
            return number_format($value, 2, '.', ','); 
        }

        public function set($model, $key, $value, $attributes)
        {
            return $value;
        }
    }