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

namespace Averias\RedisBloom\Parser\Request;

use Averias\RedisBloom\Enum\OptionalParams;
use Averias\RedisBloom\Exception\ResponseException;
use Averias\RedisBloom\Parser\ParserInterface;

class BloomFilterInsertOptionalParams extends BaseRequestOptionalParams implements ParserInterface
{
    /**
     * @param $optionalParams
     * @return array
     * @throws ResponseException
     */
    public function parse($optionalParams)
    {
        $result = [];
        if (empty($optionalParams)) {
            return $result;
        }

        $options = $this->getMergedOptionalParams(OptionalParams::OPTIONAL_PARAMS_BF_INSERT, $optionalParams);

        $result = $this->appendCapacity($result, $options);
        $result = $this->appendErrorRate($result, $options);
        $result = $this->appendExpansion($result, $options);
        $result = $this->appendNoCreate($result, $options);

        return $this->appendNonScaling($result, $options);
    }
}
