<?php

namespace app\services;

/**
 * Class Session
 * @package app\services
 */
class Session
{
  /**
   * @return bool
   */
  private static function start()
  {
    return session_start();
  }

  /**
   * @return bool|void
   */
  public static function close()
  {
    return session_write_close();
  }

  /**
   * @param $key
   * @param $value
   * @return mixed
   */
  public static function write($key, $value)
  {
    self::start();
    $_SESSION[$key] = $value;
    return $value;
  }

  /**
   * @param $key
   * @param $child
   * @return bool|mixed
   */
  public static function read($key, $child = null)
  {
    self::start();
    if (isset($_SESSION[$key]) && !$child) {
      return $_SESSION[$key];
    } else if ($child) {
      return $_SESSION[$key][$child];
    } else {
      return false;
    }
  }

  public static function unset($key)
  {
    self::start();
    unset($_SESSION[$key]);
  }
}