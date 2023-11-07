<?php

namespace VenderaTradingCompany\PHPSSHKey;

class SSHKey
{
    /** Creates a new ssh key pair */
    public function create(string  $folderPath, string $fileName = null): Keys | null
    {
        if (!is_dir($folderPath)) {
            shell_exec('mkdir ' . $folderPath);
        }

        $fileName = $fileName ?? ('ssh_key_' . time());

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
