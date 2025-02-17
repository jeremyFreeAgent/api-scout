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

namespace ApiScout\Attribute;

use ApiScout\HttpOperation;
use ApiScout\OpenApi\Http\AbstractResponse;
use Attribute;

#[Attribute(Attribute::IS_REPEATABLE | Attribute::TARGET_CLASS | Attribute::TARGET_METHOD)]
final class Patch extends HttpOperation
{
    public function __construct(
        string $path,
        ?string $name = null,
        ?string $input = null,
        ?string $output = null,
        int $statusCode = AbstractResponse::HTTP_OK,
        string $resource = 'Default',
        array $filters = [],
        bool $openApi = true,
        array $formats = [],
        array $inputFormats = [
            'json' => ['application/json'],
            'html' => ['text/html'],
        ],
        array $outputFormats = [
            'json' => ['application/json'],
            'html' => ['text/html'],
        ],
        bool $paginationEnabled = false,
        ?int $paginationItemsPerPage = null,
        ?int $paginationMaximumItemsPerPage = null,
        array $uriVariables = [],
        array $normalizationContext = [],
        array $denormalizationContext = [],
        ?string $deprecationReason = null,
        array $requirements = [],
        array $options = [],
        array $defaults = [],
        ?string $host = null,
        array|string $schemes = [],
        ?string $condition = null,
        ?int $priority = null,
        ?string $locale = null,
        ?string $format = null,
        ?bool $stateless = null,
    ) {
        parent::__construct(
            path: $path,
            name: $name,
            method: HttpOperation::METHOD_PATCH,
            input: $input,
            output: $output,
            statusCode: $statusCode,
            resource: $resource,
            filters: $filters,
            openApi: $openApi,
            formats: $formats,
            inputFormats: $inputFormats,
            outputFormats: $outputFormats,
            paginationEnabled: $paginationEnabled,
            paginationItemsPerPage: $paginationItemsPerPage,
            paginationMaximumItemsPerPage: $paginationMaximumItemsPerPage,
            uriVariables: $uriVariables,
            normalizationContext: $normalizationContext,
            denormalizationContext: $denormalizationContext,
            deprecationReason: $deprecationReason,
            requirements: $requirements,
            options: $options,
            defaults: $defaults,
            host: $host,
            schemes: $schemes,
            condition: $condition,
            priority: $priority,
            locale: $locale,
            format: $format,
            stateless: $stateless
        );
    }
}
