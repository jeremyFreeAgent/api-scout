<?php

/*
 * This file is part of the ApiScout project.
 *
 * Copyright (c) 2023 ApiScout
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace ApiScout\OpenApi\JsonSchema\Factory;

use ApiScout\Attribute\ApiProperty;
use ApiScout\OpenApi\Model\Operation;

interface FilterFactoryInterface
{
    /**
     * @param array<string, ApiProperty> $uriParams
     */
    public function buildUriParams(
        string $type,
        array $uriParams,
        Operation $openapiOperation
    ): Operation;
}
