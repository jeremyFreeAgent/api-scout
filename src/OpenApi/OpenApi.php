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

namespace ApiScout\OpenApi;

use ApiScout\OpenApi\Model\Components;
use ApiScout\OpenApi\Model\Info;
use ApiScout\OpenApi\Model\Paths;
use ArrayObject;

final class OpenApi
{
    public const VERSION = '3.1.0';

    private string $openapi = self::VERSION;

    public function __construct(
        private Info $info,
        private array $servers,
        private Paths $paths,
        private ?Components $components = null,
        private array $security = [],
        private array $tags = [],
        private ?array $externalDocs = null,
        private ?string $jsonSchemaDialect = null,
        private readonly ?ArrayObject $webhooks = null
    ) {
    }

    public function getOpenapi(): string
    {
        return $this->openapi;
    }

    public function getInfo(): Info
    {
        return $this->info;
    }

    public function getServers(): array
    {
        return $this->servers;
    }

    public function getPaths(): Paths
    {
        return $this->paths;
    }

    public function getComponents(): ?Components
    {
        return $this->components;
    }

    public function getSecurity(): array
    {
        return $this->security;
    }

    public function getTags(): array
    {
        return $this->tags;
    }

    public function getExternalDocs(): ?array
    {
        return $this->externalDocs;
    }

    public function getJsonSchemaDialect(): ?string
    {
        return $this->jsonSchemaDialect;
    }

    public function getWebhooks(): ?ArrayObject
    {
        return $this->webhooks;
    }

    public function withOpenapi(string $openapi): self
    {
        $clone = clone $this;
        $clone->openapi = $openapi;

        return $clone;
    }

    public function withInfo(Info $info): self
    {
        $clone = clone $this;
        $clone->info = $info;

        return $clone;
    }

    public function withServers(array $servers): self
    {
        $clone = clone $this;
        $clone->servers = $servers;

        return $clone;
    }

    public function withPaths(Paths $paths): self
    {
        $clone = clone $this;
        $clone->paths = $paths;

        return $clone;
    }

    public function withComponents(Components $components): self
    {
        $clone = clone $this;
        $clone->components = $components;

        return $clone;
    }

    public function withSecurity(array $security): self
    {
        $clone = clone $this;
        $clone->security = $security;

        return $clone;
    }

    public function withTags(array $tags): self
    {
        $clone = clone $this;
        $clone->tags = $tags;

        return $clone;
    }

    public function withExternalDocs(array $externalDocs): self
    {
        $clone = clone $this;
        $clone->externalDocs = $externalDocs;

        return $clone;
    }

    public function withJsonSchemaDialect(?string $jsonSchemaDialect): self
    {
        $clone = clone $this;
        $clone->jsonSchemaDialect = $jsonSchemaDialect;

        return $clone;
    }
}
