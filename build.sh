#!/usr/bin/env bash

set -e

rm -rf app/var/cache/*
composer --working-dir=app install --no-dev --optimize-autoloader --no-interaction --no-progress -q
composer --working-dir=app dump-env prod
box compile --working-dir=app
composer --working-dir=app install --no-progress -q
bin/spc micro:combine bin/php-console-app --output bin/php-console-bin
