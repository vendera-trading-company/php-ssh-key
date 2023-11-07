<?php

namespace Tests;

require_once __DIR__ . '/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use VenderaTradingCompany\PHPSSHKey\SSHKey;

class SSHKeyGenerationTest extends TestCase
{
    protected function tearDown(): void
    {
        shell_exec('rm -R ' . (__DIR__ . '/storage/'));
    }

    public function testSSHKeyCanBeCreated()
    {
        $sshKey = new SSHKey();

        $keys = $sshKey->create(__DIR__ . '/storage/');

        $this->assertNotEmpty($keys);
    }

    public function testSSHKeyContainsPublicKey()
    {
        $sshKey = new SSHKey();

        $keys = $sshKey->create(__DIR__ . '/storage/');

        $this->assertNotEmpty($keys);

        $this->assertStringStartsWith('ssh-rsa ', $keys->getPublicKey()->getContent());
    }

    public function testSSHKeyContainsPrivateKey()
    {
        $sshKey = new SSHKey();

        $keys = $sshKey->create(__DIR__ . '/storage/');

        $this->assertNotEmpty($keys);

        $this->assertNotEmpty($keys->getPrivateKey());
    }
}
