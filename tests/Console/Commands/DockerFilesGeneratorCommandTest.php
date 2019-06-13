<?php
declare(strict_types=1);

namespace LoyaltyCorp\EasyDocker\Tests\Console\Commands;

use LoyaltyCorp\EasyDocker\Tests\AbstractTestCase;

final class DockerFilesGeneratorCommandTest extends AbstractTestCase
{
    /**
     * Command should generate cloudformation files.
     *
     * @return void
     *
     * @throws \Exception
     */
    public function testGenerateCloudFormationFiles(): void
    {
        $inputs = [
            'project',
            'true',
            'true'
        ];

        $files = [
            'docker/api/cron/crontab',
            'docker/api/development/php.ini',
            'docker/api/development/php-composer.ini',
            'docker/api/newrelic/install.sh',
            'docker/api/Dockerfile',
            'docker/api/fpm.conf',
            'docker/api/migrate.sh',
            'docker/api/php.ini',
            'docker/api/startup.sh',
            'docker/nginx/snippets/cors.conf',
            'docker/nginx/default.conf',
            'docker/nginx/Dockerfile',
            'docker/nginx/nginx.conf',
            'd.sh',
            'da.sh',
            'dc.sh',
            'dm.sh',
            'docker-compose.dev.yml',
            'docker-compose.local.yml',
            'docker-compose.yml'
        ];

        $this->executeCommand('generate', $inputs);

        foreach ($files as $file) {
            \var_dump($file);
            self::assertTrue($this->getFilesystem()->exists(static::$cwd . '/' . $file));
        }
    }
}
