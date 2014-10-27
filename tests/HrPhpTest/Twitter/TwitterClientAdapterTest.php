<?php
 
namespace HrPhpTest\Twitter;

use HrPhp\Twitter\TwitterClientAdapter;
use HrPhpTest\Fixtures\TwitterApiResponseFixture;

class TwitterClientAdapterTest extends \PHPUnit_Framework_TestCase
{

    private $mockTwitterClient;
    /**@var TwitterClientAdapter*/
    private $twitterClientAdapter;
    /**@var TwitterApiResponseFixture*/
    private $twitterApiResponseFixture;

    public function setUp()
    {
        $this->mockTwitterClient = $this->getMockBuilder('\TwitterApiExchange')
                                        ->disableOriginalConstructor()
                                        ->getMock(array('performRequest'));
        $this->twitterClientAdapter = new TwitterClientAdapter();
        $this->twitterApiResponseFixture = new TwitterApiResponseFixture();
    }

    public function testGetSetScreenName()
    {
        $this->twitterClientAdapter->setScreenName('test');
        $this->assertEquals('test', $this->twitterClientAdapter->getScreenName());
    }

    public function testGetSetTwitterClient()
    {
        $this->twitterClientAdapter->setTwitterClient($this->mockTwitterClient);
        $this->assertInstanceOf('\TwitterApiExchange', $this->twitterClientAdapter->getTwitterClient());
    }

    public function testGetUserFeed()
    {
        $this->mockTwitterClient->expects($this->once())
            ->method('performRequest')
            ->will($this->returnValue($this->twitterApiResponseFixture->getMockUserFeedResponse()));
        $this->twitterClientAdapter->setTwitterClient($this->mockTwitterClient);
        $tweet = $this->twitterClientAdapter->getUserFeed();
        $this->assertEquals('Test tweet content', $tweet[0]->text);
    }

    public function testGetUserFeedThrowsException()
    {
        $this->mockTwitterClient->expects($this->once())
            ->method('performRequest')
            ->will($this->returnValue('This is not json'));
        $this->twitterClientAdapter->setTwitterClient($this->mockTwitterClient);
        $this->setExpectedException('HrPhp\Exception\HrPhpException', 'Error parsing json: This is not json');
        $this->twitterClientAdapter->getUserFeed();

    }
}
