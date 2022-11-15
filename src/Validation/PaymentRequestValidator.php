<?php

declare(strict_types=1);

namespace App\Validation;

class PaymentRequestValidator
{
    public function validate(array $request): array
    {
        $card = new CheckValidation($request['name'], $request['cardNumber'], $request['expiration'], $request['cvv']);
        $nameErrors = $card->nameValidator() ?? 0;
        $cardNumberErrors = $card->cardNumberValidator() ?? 0;
        $expirationErrors = $card->expValidator() ?? 0;
        $cvvErrors = $card->cvvValidator() ?? 0;
        return array_merge($nameErrors, $cardNumberErrors, $expirationErrors, $cvvErrors);
    }
}
