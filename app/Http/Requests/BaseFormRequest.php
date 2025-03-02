<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;

class BaseFormRequest extends Request
{
    public function validateResolved()
    {
        $validator = app('validator')->make($this->all(), $this->rules());

        if ($validator->fails()) {
            response()->json(['errors' => $validator->errors()], 422)->send();
            exit;
        }
    }
}
