<?php

namespace App\Http\Form;
use Symfony\Component\HttpFoundation\Request;

/**
 * AdminCustomValidator
 * This call a form validator class
 */
class AdminCustomValidator
{
    public function validate(Request $request, string $class)
    {
        // Declare object
        $formValidator = str_replace("{{$class}}", $class, "\App\Http\Form\{$class}");
        $formValidator = new $formValidator();
        // Validate inputs
        $error = $formValidator->validate($request);

        return $error;
    }
}