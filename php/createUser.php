<?php
/**
 * Created by PhpStorm.
 * User: alexfront
 * Date: 21/12/2017
 * Time: 9:57
 */
‌‌;
$hashed_password = password_hash($_POST["password"],PASSWORD_DEFAULT);
‌‌password_verify($_POST["password"],$hashed_password);