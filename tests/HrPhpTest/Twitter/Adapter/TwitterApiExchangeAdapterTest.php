<?php

namespace HrPhpTest\Twitter\Adapter;

use HrPhp\Twitter\Adapter\TwitterApiExchangeAdapter;
use HrPhpTest\Fixtures\TwitterApiResponseFixture;

class TwitterApiExchangeAdapterTest extends \PHPUnit_Framework_TestCase
{
    /**@var \TwitterApiExchange */
    private $twitterApiExchange;

    /**@var \HrPhpTest\Fixtures\TwitterApiResponseFixture */
    private $twitterApiResponseFixture;

    public function testGetUserFeed()
    {
        $response = $this->twitterApiResponseFixture->getMockUserFeedResponse();
        $this->twitterApiExchange->expects($this->once())
            ->method('performRequest')
            ->will($this->returnValue($response));
        $adapter = new TwitterApiExchangeAdapter($this->twitterApiExchange);
        $tweets = $adapter->getUserTimeline('test');
        $this->assertEquals('Test tweet content', $tweets[0]->text);
    }

    public function testGetUserFeedThrowsException()
    {
            $response = 'This is not json';
        $this->twitterApiExchange->expects($this->once())
            ->method('performRequest')
            ->will($this->returnValue($response));
        $adapter = new TwitterApiExchangeAdapter($this->twitterApiExchange);
        $this->setExpectedException('HrPhp\Exception\HrPhpException');
        $adapter->getUserTimeline('test');
    }

    protected function setUp()
    {
        $this->twitterApiExchange = $this->getMockBuilder('\TwitterApiExchange')
            ->disableOriginalConstructor()
            ->getMock(array('performRequest'));
        $this->twitterApiResponseFixture = new TwitterApiResponseFixture();
    }
}
