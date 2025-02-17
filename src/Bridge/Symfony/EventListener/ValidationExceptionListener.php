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

namespace ApiScout\Bridge\Symfony\EventListener;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\Validator\ConstraintViolation;
use Symfony\Component\Validator\Exception\ValidationFailedException;

use function array_key_exists;

final class ValidationExceptionListener
{
    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();

        if (!$exception->getPrevious() instanceof ValidationFailedException) {
            return;
        }

        /**
         * @var ValidationFailedException $validationException
         */
        $validationException = $exception->getPrevious();

        $violations = $this->formatViolationList($validationException);

        $event->setResponse(new JsonResponse($violations, Response::HTTP_BAD_REQUEST));
    }

    /**
     * @return array<array>|array{violations: string, array{path: string, message: string}}
     */
    private function formatViolationList(ValidationFailedException $validationException): array
    {
        /**
         * @var array<ConstraintViolation> $violationListException
         */
        $violationListException = $validationException->getViolations();
        $violations = [];
        $i = 0;

        foreach ($violationListException as $violation) {
            $violations['violations'][$i] = [
                'path' => $violation->getPropertyPath(),
                'message' => $violation->getMessage(),
            ];

            if (array_key_exists('hint', $violation->getParameters())) {
                $violations['violations'][$i] += ['hint' => $violation->getParameters()['hint']];
            }

            ++$i;
        }

        return $violations;
    }
}
