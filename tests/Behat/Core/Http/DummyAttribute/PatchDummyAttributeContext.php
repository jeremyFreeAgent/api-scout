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

namespace ApiScout\Tests\Behat\Core\Http\DummyAttribute;

use ApiScout\HttpOperation;
use ApiScout\Tests\Behat\Core\Http\BaseContext;
use Behat\Gherkin\Node\PyStringNode;

final class PatchDummyAttributeContext extends BaseContext
{
    private const PATCH_DUMMY_PATH = 'dummies_attribute';

    /**
     * @When one patch a dummy attribute with:
     */
    public function when(PyStringNode $content): void
    {
        $this->request(
            HttpOperation::METHOD_PATCH,
            self::PATCH_DUMMY_PATH,
            [
                'json' => $this->json($content->getRaw()),
            ]
        );
    }
}
