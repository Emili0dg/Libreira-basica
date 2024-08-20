<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class SinCaracteresEspeciales implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        
    }

    protected $prohibidos;

    public function __construct()
    {
        // Define los caracteres o palabras que quieres prohibir
        $this->prohibidos = ['$', '@', '#', '%', 'http', 'https'];
    }

    public function passes($attribute, $value)
    {
        // Verifica si algún carácter o palabra prohibida está presente en el valor
        foreach ($this->prohibidos as $prohibido) {
            if (stripos($value, $prohibido) !== false) {
                return false;
            }
        }
        return true;
    }

    // Mensaje de error personalizado
    public function message()
    {
        return 'El campo :attribute no puede contener caracteres o palabras prohibidas.';
    }
}
