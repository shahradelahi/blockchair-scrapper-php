<?php declare(strict_types=1);

namespace BlockChair\Tests;

class BlockChairTest extends \PHPUnit\Framework\TestCase
{

    public function testBlockChair(): void
    {
        $blockChair = new \BlockChair\BlockChair();
        $this->assertInstanceOf(\BlockChair\BlockChair::class, $blockChair);
        $this->assertInstanceOf(\BlockChair\Contracts\BaseEndpoint::class, $blockChair->bitcoin());
    }

}