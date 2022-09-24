<?php declare(strict_types=1);

namespace BlockChair\Tests;

use BlockChair\Util\UserAgent;
use PHPUnit\Framework\TestCase;

class UserAgentTest extends TestCase
{

    public function testCreate()
    {
        $this->assertNotEmpty(UserAgent::create());

        $agents = array_map(function () {
            return UserAgent::create();
        }, range(1, 5));

        foreach ($agents as $agent) {
            $this->assertNotFalse(preg_match('/.+?[\/\s][\d.]+/', $agent));
        }
    }

}
