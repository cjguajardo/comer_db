<?php

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

function setUser($user)
{
  $_SESSION['user'] = $user;
}

function setMessage($message)
{
  $_SESSION['message'] = $message;
}

function setErrorMessage($message)
{
  $_SESSION['error'] = $message;
}

function checkIsLogged()
{
  return (!isset($_SESSION['user'])) ? false : true;
}

function checkIsAdmin()
{
  return (isset($_SESSION['user']) && $_SESSION['user']->id_perfil == 1) ? true : false;
}