<?php

class ViewUploadForm extends Programster\AbstractView\AbstractView
{

    protected function renderContent()
    {
?>


<form enctype="multipart/form-data" action="/" method="POST">
  <input name="uploadFile" type="file" /><br /><br />
  <input type="submit" value="Send File" />
</form>



<?php
    }
}