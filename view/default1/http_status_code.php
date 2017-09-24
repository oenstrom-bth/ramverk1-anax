<?php

$title   = isset($title)   ? $title   : "Title not set";
$message = isset($message) ? $message : "Message not set";



?>
<div class="mdl-cell mdl-cell--12-col">
    <h1><?= $title ?></h1>

    <p><?= $message ?></p>
</div>
