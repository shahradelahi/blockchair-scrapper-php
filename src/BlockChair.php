<?php declare(strict_types=1);

namespace BlockChair;

use BlockChair\Contracts\BaseEndpoint;
use BlockChair\Traits\SupportedChains;
use BlockChair\Util\Toolkit;

/**
 * The base entry point for the BlockChair API.
 *
 *
 * This is part of the BlockChair library.
 *
 * @link https://github.com/shahradelahi/blockchair-scrapper-php
 * @author Shahrad Elahi <shahrad@litehex.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 *
 * @method BaseEndpoint bitcoin()
 * @method BaseEndpoint ethereum()
 * @method BaseEndpoint litecoin()
 * @method BaseEndpoint cardano()
 * @method BaseEndpoint ripple()
 * @method BaseEndpoint polkadot()
 * @method BaseEndpoint dogecoin()
 * @method BaseEndpoint bitcoinCash()
 * @method BaseEndpoint solana()
 * @method BaseEndpoint stellar()
 * @method BaseEndpoint monero()
 * @method BaseEndpoint eos()
 * @method BaseEndpoint kusama()
 * @method BaseEndpoint bitcoinSV()
 * @method BaseEndpoint ecash()
 * @method BaseEndpoint zcash()
 * @method BaseEndpoint dash()
 * @method BaseEndpoint mixin()
 * @method BaseEndpoint groestlcoin()
 */
class BlockChair
{

    use SupportedChains;

    /**
     * Magic method to call the endpoints.
     *
     * @param string $name
     * @param array $arguments
     * @return BaseEndpoint
     */
    public function __call(string $name, array $arguments): BaseEndpoint
    {
        $chain = Toolkit::camelToSnake($name);

        if (!self::isSupported($chain)) {
            throw new \InvalidArgumentException(sprintf(
                'The blockchain "%s" is not supported by BlockChair.',
                $chain
            ));
        }

        return new BaseEndpoint($chain);
    }

}