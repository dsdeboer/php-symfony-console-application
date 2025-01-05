<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\ArrayNotation\TrimArraySpacesFixer;
use PhpCsFixer\Fixer\ControlStructure\TrailingCommaInMultilineFixer;
use PhpCsFixer\Fixer\Import\NoUnusedImportsFixer;
use PhpCsFixer\Fixer\Semicolon\MultilineWhitespaceBeforeSemicolonsFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;
use Symplify\EasyCodingStandard\ValueObject\Option;

return ECSConfig::configure()
    ->withCache(directory: __DIR__ . '/var/cache/ecs')
    ->withPaths([
        __DIR__ . '/bin',
        __DIR__ . '/config',
        __DIR__ . '/src',
    ])
    ->withRootFiles()
    ->withSpacing(indentation: Option::INDENTATION_SPACES, lineEnding: PHP_EOL)
    ->withPreparedSets(
        psr12: true,
        arrays: true,
        comments: true,
        docblocks: true,
        spaces: true,
        namespaces: true,
        strict: true,
        cleanCode: true,
    )
    ->withRules([
        NoUnusedImportsFixer::class, TrimArraySpacesFixer::class,
    ])
    ->withConfiguredRule(
        MultilineWhitespaceBeforeSemicolonsFixer::class,
        [
            'strategy' => 'new_line_for_chained_calls',
        ],
    )
    ->withConfiguredRule(
        TrailingCommaInMultilineFixer::class,
        [
            'elements' => ['arguments', 'arrays', 'parameters', 'match'],
        ],
    )
;
