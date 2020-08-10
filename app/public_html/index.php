<?php

require_once(__DIR__ . '/../bootstrap.php');

$uploadFileManager = new Programster\UploadFileManager\UploadFileManager();
$uploadFiles = $uploadFileManager->getUploadFiles();

$body = new ViewUploadForm();

if (count($uploadFiles) > 0)
{
    $uploadFile = \Programster\CoreLibs\ArrayLib::getFirstElement($uploadFiles);

    if ($uploadFile->wasSuccessful())
    {
        /* @var $uploadFile \Programster\UploadFileManager\UploadFile */
        $mimeType = $uploadFile->getMimeType();
        $body .= "<p>A file was uploaded with mimetype: {$mimeType}</p>";
        unlink($uploadFile->getFilepath());
    }
}

print new ViewHtmlShell($body);
