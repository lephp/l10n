<?php
/**
 * Created in LeEco
 * User: Marlin<toleranthink@gmail.com>
 * Date: 4/29/16
 * Time: 11:12 PM
 * @copyright LeEco
 * @since 1.0.0
 */

namespace L10n\ISO639;


interface DataProvider
{
    public function getByEnglishName($englishName);

    public function getByISO639V2($iso639V2);

    public function getByISO639V1($iso639V1);

    public function getByHttpName($httpName);
}