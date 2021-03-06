<?php

/*
 * (c) Rob Bast <rob.bast@gmail.com>
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace L10n\ISO3166;

interface DataProvider
{
    /**
     * Return data for given alpha2 code.
     *
     * @param string $alpha2
     */
    public function getByAlpha2($alpha2);

    /**
     * Return data for given alpha3 code.
     *
     * @param string $alpha3
     */
    public function getByAlpha3($alpha3);

    /**
     * Return data for given numeric code.
     *
     * @param string $numeric
     */
    public function getByNumeric($numeric);
}
