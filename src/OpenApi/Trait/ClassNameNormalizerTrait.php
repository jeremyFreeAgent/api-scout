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

namespace ApiScout\OpenApi\Trait;

trait ClassNameNormalizerTrait
{
    protected function normalizeClassName(string $classname): string
    {
        $classNameTab = explode('\\', $classname);

        return end($classNameTab);
    }
}
