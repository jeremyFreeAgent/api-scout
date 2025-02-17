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

namespace ApiScout\Tests\Behat\ContextPathExtension\Core\Domain\Contracts\Repositories;

interface FileRepositoryInterface
{
    /**
     * Get the files.
     *
     * @param array<string> $paths
     *
     * @return array<string, \Symfony\Component\Finder\SplFileInfo>
     */
    public function getFilesWithin(array $paths): array;
}
