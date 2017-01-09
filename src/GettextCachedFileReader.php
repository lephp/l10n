<?php
/**
 * Created in LeEco
 * User: Marlin<toleranthink@gmail.com>
 * Date: 4/30/16
 * Time: 3:40 PM
 * @copyright LeEco
 * @since 1.0.0
 */

namespace L10n;


class GettextCachedFileReader extends GettextStringReader
{
    /**
     * GettextCachedFileReader constructor.
     * @param string $filename
     */
    public function __construct($filename)
    {
        parent::__construct();
        $this->str = file_get_contents($filename);
        if (false === $this->str)
            return false;
        $this->pos = 0;
    }
}