<?php
 
namespace HrPhp\Twitter;

use HrPhp\Twitter\Adapter\AdapterInterface;

class Timeline
{
    /**@var \HrPhp\Twitter\Adapter\AdapterInterface */
    private $adapter;

    /**
     * @param string $screenName
     * @return array
     * @throws \HrPhp\Exception\HrPhpException
     */
    public function get($screenName)
    {
        return $this->getAdapter()->getUserTimeline($screenName);
    }

    /**
     * @param \HrPhp\Twitter\Adapter\AdapterInterface $adapter
     */
    public function setAdapter(AdapterInterface $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @return \HrPhp\Twitter\Adapter\AdapterInterface
     */
    public function getAdapter()
    {
        return $this->adapter;
    }
}
