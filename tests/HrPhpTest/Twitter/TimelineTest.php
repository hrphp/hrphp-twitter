<?php
 
namespace HrPhpTest\Twitter;

use HrPhp\Twitter\Timeline;

class TimelineTest extends \PHPUnit_Framework_TestCase
{
    /**@var \HrPhp\Twitter\Timeline */
    private $timeline;

    public function testGetSetAdapter()
    {
        $className = '\HrPhp\Twitter\Adapter\AdapterInterface';
        $adapter = $this->getMockForAbstractClass($className);
        $this->timeline->setAdapter($adapter);
        $this->assertInstanceOf($className, $this->timeline->getAdapter());
    }

    public function testGetTimeline()
    {
        $expectedValue = ['foo' => 'bar'];
        $className = '\HrPhp\Twitter\Adapter\AdapterInterface';
        $adapter = $this->getMockForAbstractClass($className);
        $adapter->expects($this->once())
            ->method('getUserTimeline')
            ->with('test')
            ->will($this->returnValue($expectedValue));
        $this->timeline->setAdapter($adapter);
        $this->assertSame($expectedValue, $this->timeline->get('test'));
    }

    protected function setUp()
    {
        $this->timeline = new Timeline();
    }
}
