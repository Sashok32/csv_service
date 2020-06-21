<?php


namespace widgets;


class Helper
{
    public static function setFlush($msg = '')
    {
        if (!empty($msg)) {
            $_SESSION['flush'] = $msg;
        }
    }

    public static function getFlush()
    {
        if (!empty($_SESSION['flush'])) {
            $msg = $_SESSION['flush'];
            $flush = "<button type='button' class='btn btn-outline-success flush'>{$msg}</button>";
            unset($_SESSION['flush']);
            return $flush;
        }
    }
}