<?php

namespace Firebase\Auth\Token;

use Firebase\Auth\Token\Domain\KeyStore;
use Lcobucci\JWT\Token;

final class Handler implements Domain\Generator, Domain\Verifier
{
    /**
     * @var Generator
     */
    private $generator;

    /**
     * @var Verifier
     */
    private $verifier;

    public function __construct($projectId, $clientEmail, $privateKey, KeyStore $keyStore = null)
    {
        $this->generator = new Generator($clientEmail, $privateKey);
        $this->verifier = new Verifier($projectId, $keyStore ? $keyStore : new HttpKeyStore());
    }

    public function createCustomToken($uid, array $claims = [], \DateTimeInterface $expiresAt = null)
    {
        return $this->generator->createCustomToken($uid, $claims, $expiresAt);
    }

    public function verifyIdToken($token)
    {
        return $this->verifier->verifyIdToken($token);
    }
}
