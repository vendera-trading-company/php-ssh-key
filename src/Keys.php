<?php

namespace VenderaTradingCompany\PHPSSHKey;

class Keys
{
    private Key $privateKey;
    private Key $publicKey;

    public function __construct(Key $privateKey, Key $publicKey)
    {
        $this->privateKey = $privateKey;
        $this->publicKey = $publicKey;
    }

    /** Returns the private key */
    public function getPrivateKey(): Key
    {
        return $this->privateKey;
    }

    /** Returns the public key */
    public function getPublicKey(): Key
    {
        return $this->publicKey;
    }
}
