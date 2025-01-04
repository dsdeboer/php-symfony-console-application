### TL;DR;

```shell
composer --working-dir=app install --prefer-dist
php_extensions="bcmath,bz2,ctype,curl,dom,exif,fileinfo,filter,gd,iconv,intl,mbregex,mbstring,openssl,pcntl,pdo,pdo_sqlite,phar,posix,readline,redis,sockets,sodium,sqlite3,tokenizer,zip,zlib"
./bin/spc download --ignore-cache-sources=php-src --for-extensions="$php_extensions" --prefer-pre-built
./bin/spc build --build-micro --build-cli "$php_extensions"
composer --working-dir=app build-phar
./bin/spc micro:combine bin/php-console-app --output bin/php-console-bin
```

### Full Install & Build Guide

Prerequisites for this repository:
- PHP 8.2 or higher
- Composer
- Box
  - navigate [here](https://github.com/box-project/box/blob/main/doc/installation.md#composer) for installation steps
- SPC 
  - navigate [here](https://static-php.dev/en/guide/manual-build.html) for installation steps, 
  - I prefer the local build like this
    ```shell
    curl -fsSL -o bin/spc https://dl.static-php.dev/static-php-cli/spc-bin/nightly/spc-macos-aarch64
    chmod +x bin/spc
    ./bin/spc doctor --auto-fix
    ```

Steps to get started:

1. Install the software included in the repository
   ```shell
    composer --working-dir=app install --prefer-dist
   ```

2. Prepare the redistributable PHP-binaries
   ```shell
    php_extensions="bcmath,bz2,ctype,curl,dom,exif,fileinfo,filter,gd,iconv,intl,mbregex,mbstring,openssl,pcntl,pdo,pdo_sqlite,phar,posix,readline,redis,sockets,sodium,sqlite3,tokenizer,zip,zlib"
    
   # Download all needed sources
    ./bin/spc download \
      --ignore-cache-sources=php-src \
      --for-extensions="$php_extensions" \
      --prefer-pre-built
    
   # Build the binary
    ./bin/spc build \
      --build-micro \
      --build-cli \
      "$php_extensions"
    ```
   
3. To build the project into an archive
   ```shell
   # Step by Step
   composer --working-dir=app dump-env prod
   box compile --working-dir=app
   
   # or with composer script
   composer --working-dir=app build-phar
   ```
   
4. Finalize by putting it all together
   ```shell
   ./bin/spc micro:combine bin/php-console-app --output bin/php-console-bin
   ```
   
5. Test your newly build binary by running 
   ```shell
   ./bin/php-console-bin app:hello-world
   
   # Expected output: 
   Warning: The console should be invoked via the CLI version of PHP, not the micro SAPI
   Hello World!
   ```
