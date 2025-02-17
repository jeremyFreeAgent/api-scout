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

namespace ApiScout\Tests\Fixtures\TestBundle\Bridge\Symfony\EventListener;

use ApiScout\Bridge\Symfony\EventListener\SerializeResponseListener;
use ApiScout\Pagination\Factory\PaginatorRequestFactoryInterface;
use ApiScout\Resource\Factory\ResourceCollectionFactoryInterface;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ViewEvent;
use Symfony\Component\HttpKernel\HttpKernelInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

use Symfony\Component\Serializer\SerializerInterface;
use function defined;

final class SerializeResponseListenerTest extends TestCase
{
    public function testDoNotHandleResponse(): void
    {
        $resourceCollectionFactory = $this->createStub(ResourceCollectionFactoryInterface::class);
        $paginatorRequestFactory = $this->createStub(PaginatorRequestFactoryInterface::class);
        $serializer = $this->createStub(SerializerInterface::class);

        $listener = new SerializeResponseListener(
            $resourceCollectionFactory,
            $paginatorRequestFactory,
            $serializer,
            'data'
        );

        $event = new ViewEvent(
            $this->createStub(HttpKernelInterface::class),
            new Request(),
            HttpKernelInterface::MAIN_REQUEST,
            null
        );

        $listener->onKernelView($event);

        Assert::assertNull($event->getResponse());
    }
}
