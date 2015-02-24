<?php
 
namespace HrPhp\Twitter;

use HrPhp\Twitter\Adapter\AdapterInterface;

class Service
{
    /**@var \HrPhp\Twitter\Adapter\AdapterInterface */
    private $adapter;

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
