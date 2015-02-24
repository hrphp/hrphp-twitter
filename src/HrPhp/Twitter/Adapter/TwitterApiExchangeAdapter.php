<?php
/**
 * This file is part of the hrphp-twitter package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace HrPhp\Twitter\Adapter;

use HrPhp\Exception\HrPhpException;
use TwitterAPIExchange;
use Zend\Json\Json;

class TwitterApiExchangeAdapter implements AdapterInterface
{
    /** @var \TwitterAPIExchange */
    private $client;

    /**
     * @param \TwitterAPIExchange $client
     */
    public function __construct(TwitterAPIExchange $client)
    {
        $this->client = $client;
    }

    /**
     * {@inheritdoc}
     */
    public function getUserTimeline($screenName)
    {
        $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
        $params = '?screen_name=' . $screenName;
        $requestMethod = 'GET';
        $this->getClient()->setGetfield($params);
        $this->getClient()->buildOauth($url, $requestMethod);
        try {
            $json = $this->getClient()->performRequest();
            $tweets = Json::decode($json, Json::TYPE_OBJECT);
            return $tweets;
        } catch (\Exception $ex) {
            throw new HrPhpException(sprintf('Could not fetch timeline for user "%s".', $screenName));
        }
    }

    /**
     * @return \TwitterAPIExchange
     */
    public function getClient()
    {
        return $this->client;
    }
}
