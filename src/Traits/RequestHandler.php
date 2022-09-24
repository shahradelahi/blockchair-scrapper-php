<?php declare(strict_types=1);

namespace BlockChair\Traits;

use BlockChair\Exception\EmptyResponseException;
use EasyHttp\Client;

/**
 * The request handler trait.
 *
 *
 * This is part of the BlockChair library.
 *
 * @link https://github.com/shahradelahi/blockchair-scrapper-php
 * @author Shahrad Elahi <shahrad@litehex.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
trait RequestHandler
{

    /**
     * Base URL for the API.
     *
     * @var string
     */
    private string $baseApiUrl = 'https://api.blockchair.com/';

    /**
     * Base URL for the website.
     *
     * @var string
     */
    private string $baseWebsiteUrl = 'https://blockchair.com/';

    /**
     * The request handler.
     *
     * @param string $method
     * @param string $url
     * @param array $options
     * @return array
     */
    private function request(string $method, string $url, array $options = []): array
    {
        $response = (new Client())->request($method, $url, $options);

        if (($body = $response->getBody()) === null) {
            throw new EmptyResponseException(
                'Empty response from the API.'
            );
        }

        return json_decode($body, true);
    }

}