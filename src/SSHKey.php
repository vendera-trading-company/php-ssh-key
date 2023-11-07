<?php

namespace VenderaTradingCompany\PHPSSHKey;

class SSHKey
{
    public function create(string  $folderPath, string $fileName = 'ssh_key'): array | null
    {
        if (! is_dir($folderPath)) {
            shell_exec('mkdir ' . $folderPath);
        }

        $filePath = $folderPath . '/' . $fileName;

        $output = shell_exec("ssh-keygen -t rsa -b 4096 -N '' -f " . $filePath);

        $publicKey = shell_exec('cat ' . $filePath . '.pub');
        $privateKey = shell_exec('cat ' . $filePath);

        return [
            'public_key' => $publicKey,
            'private_key' => $privateKey,
        ];
    }
}
