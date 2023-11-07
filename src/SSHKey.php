<?php

namespace VenderaTradingCompany\PHPSSHKey;

class SSHKey
{
    public function create(string  $folderPath, string $fileName = 'ssh_key'): Keys | null
    {
        if (!is_dir($folderPath)) {
            shell_exec('mkdir ' . $folderPath);
        }

        $filePath = $folderPath . '/' . $fileName;

        $output = shell_exec("ssh-keygen -t rsa -b 4096 -N '' -f " . $filePath);

        if (empty($output)) {
            return null;
        }

        $publicKey = shell_exec('cat ' . $filePath . '.pub');

        if (empty($publicKey)) {
            return null;
        }

        $privateKey = shell_exec('cat ' . $filePath);

        if (empty($privateKey)) {
            return null;
        }

        return new Keys(new Key($folderPath, $fileName, $privateKey), new Key($folderPath, $fileName . '.pub', $publicKey));
    }
}
