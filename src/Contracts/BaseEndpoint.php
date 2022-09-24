<?php declare(strict_types=1);

namespace BlockChair\Contracts;

use BlockChair\Exception\InvalidResponseException;
use BlockChair\Traits\RequestHandler;
use BlockChair\Util\Toolkit;

/**
 * The base class for the BlockChair library.
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
class BaseEndpoint implements BasicPointInterface
{

    use RequestHandler;

    /**
     * @var string
     */
    private string $kebabCaseClass;

    /**
     * BaseEndpoint constructor.
     *
     * @var string $blockchain
     */
    public function __construct(private string $blockchain)
    {
        $this->kebabCaseClass = ucfirst(Toolkit::kebabToCamel($this->blockchain));
    }

    /**
     * @param string $symbol
     * @return array
     */
    public function MarketPrice(string $symbol = 'USD'): array
    {
        $response = $this->request('GET', $this->baseWebsiteUrl . '_api/market_price', [
            'query' => [
                'query' => json_encode([
                    'currency' => $symbol
                ])
            ]
        ]);

        if (!isset($response['data']) || $response['data'] == []) {
            throw new InvalidResponseException(
                'Invalid response from the API.'
            );
        }

        return $response['data'][0];
    }

    /**
     * @return array
     */
    public function stats(): array
    {
        $response = $this->request('GET', $this->baseApiUrl . $this->blockchain . '/stats');

        if (!isset($response['data']) || $response['data'] == []) {
            throw new InvalidResponseException(
                'Invalid response from the API.'
            );
        }
        return $response['data'];
    }


    /**
     * @param int $limit [optional] Limit the number of results. Default: 100. Maximum: 1000.
     * @param int $offset [optional] Offset the number of results. Default: 0.
     * @param string $sort [optional] Sort the results by a given field. Default: id. Available: id, size, time, etc.
     * @param string $order [optional] Order the results by a given field. Default: desc. Available: asc, desc.
     * @return array
     */
    public function blocks(int $limit = 10, int $offset = 0, string $sort = 'id', string $order = 'desc'): array
    {
        $response = $this->request('GET', $this->baseApiUrl . $this->blockchain . '/blocks', [
            'query' => [
                's' => $sort . '(' . $order . ')',
                'limit' => $limit,
                'offset' => $offset
            ]
        ]);

        if (!isset($response['data']) || $response['data'] == []) {
            throw new InvalidResponseException(
                'Invalid response from the API.'
            );
        }

        return $response['data'];
    }

    /**
     * @param int $blockId
     * @param int $limit
     * @param int $offset
     * @param string $sort
     * @param string $order
     * @return array
     */
    public function transactions(int $blockId, int $limit = 10, int $offset = 0, string $sort = 'id', string $order = 'asc'): array
    {
        $response = $this->request('GET', $this->baseApiUrl . $this->blockchain . '/transactions', [
            'query' => [
                'q' => 'block_id(' . $blockId . ')',
                'limit' => $limit,
                'offset' => $offset,
                's' => $sort . '(' . $order . ')'
            ]
        ]);

        if (!isset($response['data']) || $response['data'] == []) {
            throw new InvalidResponseException(
                'Invalid response from the API.'
            );
        }

        return $response['data'];
    }

    /**
     * @param string $hash
     * @return array
     */
    public function transaction(string $hash): array
    {
        $response = $this->request('GET', $this->baseApiUrl . $this->blockchain . '/dashboards/transaction/' . $hash);

        if (!isset($response['data']) || $response['data'] == []) {
            throw new InvalidResponseException(
                'Invalid response from the API.'
            );
        }

        return $response['data'];
    }

}