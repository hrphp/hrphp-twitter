<?php
/**
 * This file is part of the hrphp-twitter package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HrPhp\Twitter\Adapter;

interface AdapterInterface
{
    /**
     * @param $screenName
     * @return array
     * @throws \HrPhp\Exception\Exception
     */
    public function getUserTimeline($screenName);

    /**
     * @return mixed
     */
    public function getClient();
}
