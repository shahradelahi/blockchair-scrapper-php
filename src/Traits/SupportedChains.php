<?php declare(strict_types=1);

namespace BlockChair\Traits;

/**
 * The blockchains supported by BlockChair.
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
trait SupportedChains
{

    protected static string $BITCOIN = 'bitcoin';

    protected static string $ETHEREUM = 'ethereum';

    protected static string $LITECOIN = 'litecoin';

    protected static string $CARDANO = 'cardano';

    protected static string $RIPPLE = 'ripple';

    protected static string $POLKADOT = 'polkadot';

    protected static string $DOGECOIN = 'dogecoin';

    protected static string $BITCOIN_CASH = 'bitcoin-cash';

    protected static string $SOLANA = 'solana';

    protected static string $STELLAR = 'stellar';

    protected static string $MONERO = 'monero';

    protected static string $EOS = 'eos';

    protected static string $KUSAMA = 'kusama';

    protected static string $BITCOIN_SV = 'bitcoin-sv';

    protected static string $ECASH = 'ecash';

    protected static string $ZCASH = 'zcash';

    protected static string $DASH = 'dash';

    protected static string $MIXIN = 'mixin';

    protected static string $GROESTLCOIN = 'groestlcoin';

    /**
     * Check the given blockchain is supported or not
     *
     * @param string $chain
     * @return bool
     */
    protected static function isSupported(string $chain): bool
    {
        return in_array($chain, self::getSupportedChains());
    }

    /**
     * Get the supported blockchains
     *
     * @return array
     */
    protected static function getSupportedChains(): array
    {
        return [
            self::$BITCOIN,
            self::$ETHEREUM,
            self::$LITECOIN,
            self::$CARDANO,
            self::$RIPPLE,
            self::$POLKADOT,
            self::$DOGECOIN,
            self::$BITCOIN_CASH,
            self::$SOLANA,
            self::$STELLAR,
            self::$MONERO,
            self::$EOS,
            self::$KUSAMA,
            self::$BITCOIN_SV,
            self::$ECASH,
            self::$ZCASH,
            self::$DASH,
            self::$MIXIN,
            self::$GROESTLCOIN,
        ];
    }

}