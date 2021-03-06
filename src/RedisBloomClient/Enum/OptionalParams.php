<?php
/**
 * @project   phpredis-bloom
 * @author    Rafael Campoy <rafa.campoy@gmail.com>
 * @copyright 2019 Rafael Campoy <rafa.campoy@gmail.com>
 * @license   MIT
 * @link      https://github.com/averias/phpredis-bloom
 *
 * Copyright and license information, is included in
 * the LICENSE file that is distributed with this source code.
 */

namespace Averias\RedisBloom\Enum;

use MyCLabs\Enum\Enum;

class OptionalParams extends Enum
{
    /** Optional Params Names */
    const CAPACITY = 'CAPACITY';
    const ERROR = 'ERROR';
    const NO_CREATE = 'NOCREATE';
    const NON_SCALING = 'NONSCALING';
    const ITEMS = 'ITEMS';
    const BUCKET_SIZE = 'BUCKETSIZE';
    const MAX_ITERATIONS = 'MAXITERATIONS';
    const EXPANSION = 'EXPANSION';
    const WEIGHTS = 'WEIGHTS';

    /** Optional Params Groups */
    const OPTIONAL_PARAMS_BF_INSERT = [
        self::CAPACITY => null,
        self::ERROR => null,
        self::EXPANSION => null,
        self::NO_CREATE => null,
        self::NON_SCALING => null
    ];

    const OPTIONAL_PARAMS_BF_RESERVE = [
        self::EXPANSION => null,
        self::NON_SCALING => null
    ];

    const OPTIONAL_PARAMS_CF_RESERVE = [
        self::BUCKET_SIZE => null,
        self::MAX_ITERATIONS => null,
        self::EXPANSION => null
    ];

    const OPTIONAL_PARAMS_CF_INSERT = [
        self::CAPACITY => null,
        self::NO_CREATE => null
    ];
}
