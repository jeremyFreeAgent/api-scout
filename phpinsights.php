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

return [
    'threads' => ($_ENV['GITLAB_CI'] ?? '') === 'true' ? 2 : null,
    'preset' => 'symfony',
    'ide' => 'phpstorm',
    'requirements' => [
        'min-quality' => 100,
        'min-complexity' => 90,
        'min-architecture' => 100,
        'min-style' => 100,
        'disable-security-check' => true,
    ],
    'remove' => [
        \PHP_CodeSniffer\Standards\Generic\Sniffs\Formatting\SpaceAfterNotSniff::class,
        \PHP_CodeSniffer\Standards\Generic\Sniffs\CodeAnalysis\EmptyPHPStatementSniff::class,
        \SlevomatCodingStandard\Sniffs\Classes\SuperfluousInterfaceNamingSniff::class,
        \SlevomatCodingStandard\Sniffs\Classes\SuperfluousAbstractClassNamingSniff::class,
        \NunoMaduro\PhpInsights\Domain\Sniffs\ForbiddenSetterSniff::class,
        \SlevomatCodingStandard\Sniffs\ControlStructures\AssignmentInConditionSniff::class,
        \SlevomatCodingStandard\Sniffs\Classes\SuperfluousTraitNamingSniff::class,
        \NunoMaduro\PhpInsights\Domain\Insights\ForbiddenTraits::class,
        \SlevomatCodingStandard\Sniffs\TypeHints\DisallowMixedTypeHintSniff::class,
        \SlevomatCodingStandard\Sniffs\Classes\SuperfluousExceptionNamingSniff::class,
        \PHP_CodeSniffer\Standards\Generic\Sniffs\Files\LineLengthSniff::class,
        \SlevomatCodingStandard\Sniffs\Classes\ForbiddenPublicPropertySniff::class,
        \PHP_CodeSniffer\Standards\Generic\Sniffs\CodeAnalysis\ForLoopWithTestFunctionCallSniff::class,
        \SlevomatCodingStandard\Sniffs\ControlStructures\DisallowShortTernaryOperatorSniff::class,
        \PhpCsFixer\Fixer\Basic\BracesFixer::class,
        \PHP_CodeSniffer\Standards\Generic\Sniffs\Commenting\TodoSniff::class,
    ],
    'config' => [
        \PhpCsFixer\Fixer\Import\OrderedImportsFixer::class => [
            'imports_order' => ['class', 'function', 'const'],
            'sort_algorithm' => 'alpha',
        ],
        \SlevomatCodingStandard\Sniffs\Namespaces\UseSpacingSniff::class => [
            'linesCountBeforeFirstUse' => 1,
            'linesCountBetweenUseTypes' => 1,
            'linesCountAfterLastUse' => 1,
        ],
        \NunoMaduro\PhpInsights\Domain\Insights\CyclomaticComplexityIsHigh::class => [
            'exclude' => [
                'src/Resource/DirectoryClassesExtractor.php',
				'src/Bridge/Symfony/EventListener/AddFormatListener.php'
            ],
            'maxComplexity' => 7,
        ],
        \SlevomatCodingStandard\Sniffs\Functions\UnusedParameterSniff::class => [
            'exclude' => [
                'src/Bridge/Symfony/Routing/ApiLoader.php',
            ],
        ],
        \SlevomatCodingStandard\Sniffs\TypeHints\ParameterTypeHintSniff::class => [
            'exclude' => [
            ],
        ],
        \SlevomatCodingStandard\Sniffs\Functions\FunctionLengthSniff::class => [
            'exclude' => [
				'src/OpenApi/JsonSchema/PropertyTypeBuilderTrait.php',
				'src/Resource/DirectoryClassesExtractor.php',
				'src/Bridge/Symfony/EventListener/AddFormatListener.php',
            ],
            'maxLinesLength' => 30,
        ],
        \NunoMaduro\PhpInsights\Domain\Insights\ForbiddenNormalClasses::class => [
            'exclude' => [
                'src/Pagination/Paginator.php',
            ],
        ],
    ],
];
