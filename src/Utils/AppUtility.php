<?php
namespace App\Utils;

/**
 * AppUtility.
 */
class AppUtility
{
    /*
     * function
     */
    public static function convSjis($txt) {
		return mb_convert_encoding($txt,"SJIS-win","auto");
	}
}
