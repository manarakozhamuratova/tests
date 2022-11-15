<?php

declare(strict_types=1);

use App\Validation\PaymentRequestValidator;
use PHPUnit\Framework\TestCase;

class PaymentRequestValidatorTest extends TestCase
{
     /**
     * @dataProvider allProvider
     */
    public function testValidate($data, $expected)
    {
        $validator = new PaymentRequestValidator();
        $actual = $validator->validate($data);
        $this->assertEquals($expected, $actual);
    }
    public function allProvider(){
        return [
            "Valid"=>[
                [
                    "name"=> "Manara Kozhamuratova",
                    "cardNumber" => "123456789123",
                    "expiration" => "12/26",
                    "cvv" => "123"
                ],
                []
            ],
            ];
    }
}