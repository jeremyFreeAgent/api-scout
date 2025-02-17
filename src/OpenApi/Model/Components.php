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

namespace ApiScout\OpenApi\Model;

use ArrayObject;

final class Components
{
    private ?ArrayObject $schemas;

    public function __construct(
        ?ArrayObject $schemas = null,
        private ?ArrayObject $responses = null,
        private ?ArrayObject $parameters = null,
        private ?ArrayObject $examples = null,
        private ?ArrayObject $requestBodies = null,
        private ?ArrayObject $headers = null,
        private ?ArrayObject $securitySchemes = null,
        private ?ArrayObject $links = null,
        private ?ArrayObject $callbacks = null,
        private ?ArrayObject $pathItems = null
    ) {
        $schemas?->ksort();

        $this->schemas = $schemas;
    }

    public function getSchemas(): ?ArrayObject
    {
        return $this->schemas;
    }

    public function getResponses(): ?ArrayObject
    {
        return $this->responses;
    }

    public function getParameters(): ?ArrayObject
    {
        return $this->parameters;
    }

    public function getExamples(): ?ArrayObject
    {
        return $this->examples;
    }

    public function getRequestBodies(): ?ArrayObject
    {
        return $this->requestBodies;
    }

    public function getHeaders(): ?ArrayObject
    {
        return $this->headers;
    }

    public function getSecuritySchemes(): ?ArrayObject
    {
        return $this->securitySchemes;
    }

    public function getLinks(): ?ArrayObject
    {
        return $this->links;
    }

    public function getCallbacks(): ?ArrayObject
    {
        return $this->callbacks;
    }

    public function getPathItems(): ?ArrayObject
    {
        return $this->pathItems;
    }

    public function withSchemas(ArrayObject $schemas): self
    {
        $clone = clone $this;
        $clone->schemas = $schemas;

        return $clone;
    }

    public function withResponses(ArrayObject $responses): self
    {
        $clone = clone $this;
        $clone->responses = $responses;

        return $clone;
    }

    public function withParameters(ArrayObject $parameters): self
    {
        $clone = clone $this;
        $clone->parameters = $parameters;

        return $clone;
    }

    public function withExamples(ArrayObject $examples): self
    {
        $clone = clone $this;
        $clone->examples = $examples;

        return $clone;
    }

    public function withRequestBodies(ArrayObject $requestBodies): self
    {
        $clone = clone $this;
        $clone->requestBodies = $requestBodies;

        return $clone;
    }

    public function withHeaders(ArrayObject $headers): self
    {
        $clone = clone $this;
        $clone->headers = $headers;

        return $clone;
    }

    public function withSecuritySchemes(ArrayObject $securitySchemes): self
    {
        $clone = clone $this;
        $clone->securitySchemes = $securitySchemes;

        return $clone;
    }

    public function withLinks(ArrayObject $links): self
    {
        $clone = clone $this;
        $clone->links = $links;

        return $clone;
    }

    public function withCallbacks(ArrayObject $callbacks): self
    {
        $clone = clone $this;
        $clone->callbacks = $callbacks;

        return $clone;
    }

    public function withPathItems(ArrayObject $pathItems): self
    {
        $clone = clone $this;
        $clone->pathItems = $pathItems;

        return $clone;
    }
}
