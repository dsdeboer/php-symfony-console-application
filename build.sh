#!/usr/bin/env bash

set -e

rm -rf app/var/cache/prod
sleep 1
composer --working-dir=app dump-env prod
composer --working-dir=app install --no-dev --optimize-autoloader --no-interaction --no-progress
box compile --working-dir=app
rm app/.env.local.php
composer --working-dir=app install --no-progress -q
bin/spc micro:combine bin/php-console-app --output bin/php-console-bin
