<?php

declare(strict_types=1);

use Rector\Caching\ValueObject\Storage\FileCacheStorage;
use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withCache(cacheDirectory: __DIR__ . '/var/cache/rector', cacheClass: FileCacheStorage::class)
    ->withPaths([
        __DIR__ . '/bin',
        __DIR__ . '/config',
        __DIR__ . '/src',
    ])
    ->withRootFiles()
    ->withPreparedSets(codingStyle: true, earlyReturn: true, rectorPreset: true, symfonyCodeQuality: true, symfonyConfigs: true)
    ->withComposerBased(twig: true, doctrine: true, phpunit: true, symfony: true)
    ->withPhpSets(php84: true)
    ->withImportNames()
    ->withFluentCallNewLine()
    ->withTypeCoverageLevel(20)
    ->withDeadCodeLevel(20)
    ->withCodeQualityLevel(20)
;
