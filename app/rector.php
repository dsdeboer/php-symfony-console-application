<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/bin',
        __DIR__ . '/config',
        __DIR__ . '/src',
    ])
    ->withRootFiles()
    ->withPhpSets(php84: true)
    ->withPreparedSets(codingStyle: true, typeDeclarations: true, earlyReturn: true, rectorPreset: true, symfonyCodeQuality: true, symfonyConfigs: true)
    ->withImportNames()
    ->withFluentCallNewLine()
    ->withDeadCodeLevel(0)
    ->withCodeQualityLevel(0);
