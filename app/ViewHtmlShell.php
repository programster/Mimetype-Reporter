<?php

class ViewHtmlShell extends Programster\AbstractView\AbstractView
{
    private string $m_body;


    public function __construct(string $body)
    {
        $this->m_body = $body;
    }

    
    protected function renderContent()
    {
?>

 <!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>title</title>
    </head>
    <body>
        <?= $this->m_body; ?>
    </body>
</html>




<?php
    }
}