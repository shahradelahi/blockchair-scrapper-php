<?php declare(strict_types=1);

namespace BlockChair\Util;

/**
 * The toolkit class.
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
class Toolkit
{

    /**
     * Convert camelCase to snake_case.
     *
     * @param string $input
     * @return string
     */
    public static function camelToSnake(string $input): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $input));
    }

    /**
     * Convert kebab-case to camelCase.
     *
     * @param string $input
     * @return string
     */
    public static function kebabToCamel(string $input): string
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $input)));
    }

    /**
     * Convert camelCase to kebab-case.
     *
     * @param string $input
     * @return string
     */
    public static function camelToKebab(string $input): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '-$0', $input));
    }

}