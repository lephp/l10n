<?php
/**
 * Created in LeEco
 * User: Marlin<toleranthink@gmail.com>
 * Date: 4/30/16
 * Time: 3:44 PM
 * @copyright LeEco
 * @since 1.0.0
 */

namespace L10n;


class GettextCachedIntFileReader extends GettextCachedFileReader
{
    public function __construct($filename)
    {
        parent::__construct($filename);
    }

}