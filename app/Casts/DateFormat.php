<?php

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class DateFormat implements CastsAttributes
    {
        public function get($model, $key, $value, $attributes)
        {
            $date = strtotime($value);
            return date("d/m/Y h:iA",$date);
        }

        public function set($model, $key, $value, $attributes)
        {
            return $value;
        }
    }