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

namespace ApiScout\Tests\Behat\Core\Http\Dummy;

use ApiScout\Core\Domain\HttpOperation;
use ApiScout\Tests\Behat\Core\Http\BaseContext;
use Behat\Gherkin\Node\PyStringNode;
use PHPUnit\Framework\Assert;

final class PatchDummyContext extends BaseContext
{
    private const PATCH_DUMMY_PATH = 'dummies';

    /**
     * @When one patch a dummy with:
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

    /**
     * @Then patch dummy response should have:
     */
    public function then(PyStringNode $content): void
    {
        $content = $this->json($content->getRaw());

        Assert::assertSame(
            $content,
            $this->getResponse()->toArray()
        );
    }
}
