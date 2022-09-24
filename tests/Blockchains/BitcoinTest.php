<?php declare(strict_types=1);

namespace BlockChair\Tests\Blockchains;

use BlockChair\BlockChair;
use BlockChair\Contracts\BaseEndpoint;

class BitcoinTest extends \PHPUnit\Framework\TestCase
{

    public function getInstance(): BaseEndpoint
    {
        return (new BlockChair())->bitcoin();
    }

    public function testStats()
    {
        $instance = $this->getInstance();
        $stats = $instance->stats();

        $this->assertIsInt($stats['blocks']);
        $this->assertIsInt($stats['transactions']);
    }

    public function testBlocks()
    {
        $instance = $this->getInstance();
        $blocks = $instance->blocks();

        $this->assertIsArray($blocks);
        $this->assertIsIterable($blocks);
        $this->assertIsInt($blocks[0]['id']);
        $this->assertIsInt($blocks[0]['size']);
    }

    public function testTransactions()
    {
        $instance = $this->getInstance();
        $blocks = $instance->blocks(1);
        $transactions = $instance->transactions($blocks[0]['id']);

        $this->assertIsArray($transactions);
        $this->assertIsIterable($transactions);
        $this->assertIsInt($transactions[0]['id']);
        $this->assertIsInt($transactions[0]['size']);
        $this->assertIsInt($transactions[0]['block_id']);
    }

    public function testTransaction()
    {
        $instance = $this->getInstance();
        $blocks = $instance->blocks(1);
        $transactions = $instance->transactions($blocks[0]['id']);

        $hash = $transactions[0]['hash'];
        $transaction = $instance->transaction($hash);

        $this->assertIsArray($transaction);
        $this->assertIsIterable($transaction);
        $this->assertIsInt($transaction[$hash]['transaction']['id']);
        $this->assertIsInt($transaction[$hash]['transaction']['size']);
        $this->assertIsInt($transaction[$hash]['transaction']['block_id']);
    }

    public function testMarketPrice()
    {
        $instance = $this->getInstance();
        $marketPrice = $instance->marketPrice();

        $this->assertIsArray($marketPrice);
        $this->assertIsIterable($marketPrice);
        $this->assertIsInt($marketPrice[0][0]);
        $this->assertIsFloat($marketPrice[0][1]);
    }

}