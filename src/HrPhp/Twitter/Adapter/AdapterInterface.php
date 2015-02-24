<?php

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
