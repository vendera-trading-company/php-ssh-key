<?php

namespace VenderaTradingCompany\PHPSSHKey;

class Key
{
    private string $folderPath = '';
    private string $fileName = '';
    private string $content  = '';

    public function __construct(string $folderPath, string $fileName, string $content)
    {
        $this->folderPath = $folderPath;
        $this->fileName = $fileName;
        $this->content = $content;
    }

    /** Returns the key content */
    public function getContent(): string
    {
        return $this->content;
    }

    /** Returns the key folder path */
    public function getFolderPath(): string
    {
        return $this->folderPath;
    }

    /** Returns the key file name */
    public function getFileName(): string
    {
        return $this->fileName;
    }
}
