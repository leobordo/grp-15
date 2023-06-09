<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NullableIfRule implements Rule
{
    protected $field;
    protected $values;

    public function __construct($field, $values)
{
    $this->field = $field;
    $this->values = $values;
}


public function passes($attribute, $value)
{
    $otherFieldValue = request()->input($this->field);

    if (!in_array($otherFieldValue, $this->values)) {
        return $value === null;
        /*se il valore del campo tipologia non è compreso nel array che gli viene passato
        ovvero[Sconto],ritorna il confronto tra il valore del campo corrente e null(cioè il campo corrente deve essere null
        per ritornare true).
        $value è di DEFAULT passato e rapprensenta il valore del campo che viene validato.
        il metodo passes viene invocato quando si usa validate() di Validator.
        */
    }

    return true;
}


    public function message()
    {
        return 'Il campo :attribute deve essere nullo quando ' . $this->field . ' è diverso da Sconto.';
    }
}
