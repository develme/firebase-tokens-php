<?php

namespace Firebase\Auth\Token\Tests\Mock;

use Lcobucci\JWT\Signer;

class SignerMock implements Signer
{

    public function getAlgorithmId()
    {
        return 'mock';
    }

    public function modifyHeader(array &$headers)
    {
        return function (&$headers) {
            $headers['alg'] = 'mock';
        };
    }

    public function verify($expected, $payload, $key)
    {
        return function ($expected, $payload, $key) {
            return $expected === $payload.$key;
        };
    }

    public function sign($payload, $key)
    {

    }
}
