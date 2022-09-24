<?php declare(strict_types=1);

namespace BlockChair\Contracts;

interface BasicPointInterface
{

    public function stats(): array;

    public function blocks(int $limit = 10, int $offset = 0, string $sort = 'id', string $order = 'desc'): array;

    public function transactions(int $blockId, int $limit = 10, int $offset = 0, string $sort = 'id', string $order = 'asc'): array;

    /**
     * @param string $symbol [optional] default: USD
     * @return array
     */
    public function marketPrice(string $symbol = 'USD'): array;

    public function transaction(string $hash): array;

}