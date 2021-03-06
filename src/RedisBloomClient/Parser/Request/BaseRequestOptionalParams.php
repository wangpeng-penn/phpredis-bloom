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
use Averias\RedisBloom\Validator\InputValidatorTrait;

class BaseRequestOptionalParams
{
    use InputValidatorTrait;

    /**
     * @param array $defaultOptionalParams
     * @param array $requestedOptionalParams
     * @return array
     */
    protected function getMergedOptionalParams(array $defaultOptionalParams, array $requestedOptionalParams): array
    {
        return array_merge($defaultOptionalParams, $requestedOptionalParams);
    }

    /**
     * @param array $result
     * @param array $options
     * @return array
     * @throws ResponseException
     */
    protected function appendCapacity(array $result, array $options): array
    {
        $capacity = $options[OptionalParams::CAPACITY];
        if (!is_null($capacity)) {
            $this->validateInteger($capacity, OptionalParams::CAPACITY);
            $result[] = OptionalParams::CAPACITY;
            $result[] = $capacity;
        }

        return $result;
    }

    /**
     * @param array $result
     * @param array $options
     * @return array
     * @throws ResponseException
     */
    protected function appendErrorRate(array $result, array $options): array
    {
        $error = $options[OptionalParams::ERROR];

        if (!is_null($error)) {
            $this->validateFloat($error, OptionalParams::ERROR);
            $this->validateRange($error, OptionalParams::ERROR);
            $result[] = OptionalParams::ERROR;
            $result[] = $error;
        }

        return $result;
    }

    /**
     * @param array $result
     * @param array $options
     * @return array
     */
    protected function appendNoCreate(array $result, array $options): array
    {
        $noCreate = $options[OptionalParams::NO_CREATE];
        if (!is_null($noCreate) && true === $noCreate) {
            $result[] = OptionalParams::NO_CREATE;
        }

        return $result;
    }

    /**
     * @param array $result
     * @param array $options
     * @return array
     * @throws ResponseException
     */
    protected function appendExpansion(array $result, array $options): array
    {
        $expansion = $options[OptionalParams::EXPANSION];

        if (!is_null($expansion)) {
            $this->validateInteger($expansion, OptionalParams::EXPANSION);
            $result[] = OptionalParams::EXPANSION;
            $result[] = $expansion;
        }

        return $result;
    }

    protected function appendNonScaling(array $result, array $options): array
    {
        $nonScaling = $options[OptionalParams::NON_SCALING];
        if (!is_null($nonScaling) && true === $nonScaling) {
            $result[] = OptionalParams::NON_SCALING;
        }

        return $result;
    }
}
