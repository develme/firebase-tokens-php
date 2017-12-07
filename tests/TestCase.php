<?php

namespace Firebase\Auth\Token\Tests;

use Firebase\Auth\Token\Tests\Mock\SignerMock;
use Lcobucci\JWT\Signature;
use Lcobucci\JWT\Signer;

class TestCase extends \PHPUnit_Framework_TestCase
{
    /**
     * @return Signer|\PHPUnit_Framework_MockObject_MockObject
     */
    public function createMockSigner()
    {
        return new SignerMock;
    }
}
