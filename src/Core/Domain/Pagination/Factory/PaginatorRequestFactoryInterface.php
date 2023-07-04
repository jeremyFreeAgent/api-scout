<?php

declare(strict_types=1);

/*
 * This file is part of the ApiScout project.
 *
 * Copyright (c) 2023 ApiScout
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace ApiScout\Core\Domain\Pagination\Factory;

use ApiScout\Core\Domain\Operation;

interface PaginatorRequestFactoryInterface
{
    public function getCurrentPage(): int;

    public function getItemsPerPage(): int;

    public function isPaginationEnabled(): bool;

    public function getOperationFromRequest(): Operation;
}
