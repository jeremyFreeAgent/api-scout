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

final class Parameter
{
    public function __construct(
        private string $name,
        private string $in,
        private string $description = '',
        private bool $required = false,
        private bool $deprecated = false,
        private bool $allowEmptyValue = false,
        private array $schema = [],
        private ?string $style = null,
        private bool $explode = false,
        private bool $allowReserved = false,
        private mixed $example = null,
        private ?ArrayObject $examples = null,
        private ?ArrayObject $content = null
    ) {
        if ($style === null) {
            if ($in === 'query' || $in === 'cookie') {
                $this->style = 'form';
            } elseif ($in === 'path' || $in === 'header') {
                $this->style = 'simple';
            }
        }
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getIn(): string
    {
        return $this->in;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getRequired(): bool
    {
        return $this->required;
    }

    public function getDeprecated(): bool
    {
        return $this->deprecated;
    }

    public function canAllowEmptyValue(): bool
    {
        return $this->allowEmptyValue;
    }

    public function getAllowEmptyValue(): bool
    {
        return $this->allowEmptyValue;
    }

    public function getSchema(): array
    {
        return $this->schema;
    }

    public function getStyle(): ?string
    {
        return $this->style;
    }

    public function canExplode(): bool
    {
        return $this->explode;
    }

    public function getExplode(): bool
    {
        return $this->explode;
    }

    public function canAllowReserved(): bool
    {
        return $this->allowReserved;
    }

    public function getAllowReserved(): bool
    {
        return $this->allowReserved;
    }

    public function getExample(): mixed
    {
        return $this->example;
    }

    public function getExamples(): ?ArrayObject
    {
        return $this->examples;
    }

    public function getContent(): ?ArrayObject
    {
        return $this->content;
    }

    public function withName(string $name): self
    {
        $clone = clone $this;
        $clone->name = $name;

        return $clone;
    }

    public function withIn(string $in): self
    {
        $clone = clone $this;
        $clone->in = $in;

        return $clone;
    }

    public function withDescription(string $description): self
    {
        $clone = clone $this;
        $clone->description = $description;

        return $clone;
    }

    public function withRequired(bool $required): self
    {
        $clone = clone $this;
        $clone->required = $required;

        return $clone;
    }

    public function withDeprecated(bool $deprecated): self
    {
        $clone = clone $this;
        $clone->deprecated = $deprecated;

        return $clone;
    }

    public function withAllowEmptyValue(bool $allowEmptyValue): self
    {
        $clone = clone $this;
        $clone->allowEmptyValue = $allowEmptyValue;

        return $clone;
    }

    public function withSchema(array $schema): self
    {
        $clone = clone $this;
        $clone->schema = $schema;

        return $clone;
    }

    public function withStyle(string $style): self
    {
        $clone = clone $this;
        $clone->style = $style;

        return $clone;
    }

    public function withExplode(bool $explode): self
    {
        $clone = clone $this;
        $clone->explode = $explode;

        return $clone;
    }

    public function withAllowReserved(bool $allowReserved): self
    {
        $clone = clone $this;
        $clone->allowReserved = $allowReserved;

        return $clone;
    }

    public function withExample(ArrayObject $example): self
    {
        $clone = clone $this;
        $clone->example = $example;

        return $clone;
    }

    public function withExamples(ArrayObject $examples): self
    {
        $clone = clone $this;
        $clone->examples = $examples;

        return $clone;
    }

    public function withContent(ArrayObject $content): self
    {
        $clone = clone $this;
        $clone->content = $content;

        return $clone;
    }
}
