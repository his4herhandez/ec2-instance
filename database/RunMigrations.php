<?php

use App\Controllers\MigrationController;

require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../config/eloquent.php"; // Asegúrate de incluir la configuración de Eloquent

$migrationController = new MigrationController();

$migrationMethod = false;
$commitId = false;
$migrationsPath = __DIR__ . "/migrations";
$migrationFiles = scandir($migrationsPath);

if ($argc > 2) {
    $migrationMethod = $argv[1];
    $commitId = $argv[2];
}

runMigrations($migrationsPath, $migrationController, $migrationFiles, $migrationMethod);

function runMigrations($migrationsPath, $migrationController, $migrationFiles, $migrationMethod)
{
    global $commitId;

    foreach ($migrationFiles as $file) {

        if ($file != "." && $file != "..") {

            $path = "$migrationsPath/$file";

            if (!is_file($path)) {
                continue;
            }

            $migrationExists = getExistsMigrationByName($file, $migrationController);

            if ($migrationExists) {

                echo "$migrationExists\n";
                continue;
            }

            require_once $path;
            $class = getClassNameFromFile($path);

            if ($class && class_exists($class)) {

                $instance = new $class();

                $instance->$migrationMethod();
                try {

                    if ($migrationMethod === 'up') {

                        $migrationController->store($file, $commitId); // insertamos

                    } else {

                        $migrationController->delete($commitId);
                    }

                    echo "\033[32mMigration $migrationMethod $file successfully\033[0m\n";
                } catch (\Exception $e) {

                    echo "\033[31mError executing migration $file: " . $e->getMessage() . "\033[0m\n";
                }
            } else {
                echo "\033[33mClass $class is not defined in the file $path\033[0m\n";
            }
        }
    }
}

function getClassNameFromFile(string $filePath): string|false
{
    $content = file_get_contents($filePath);

    $pattern = '/class\s+(\w+)/';
    if (preg_match($pattern, $content, $matches)) {
        return $matches[1];
    } else {
        return false;
    }
}

function getExistsMigrationByName($file, $migrationController)
{
    $migrationExists = $migrationController->getExistsMigrationByName($file);

    if (!$migrationExists->status) {
        return $migrationExists->msg;
    } elseif (count($migrationExists->data) > 0) {
        return "\033[31mMigration $file has already been executed\033[0m\n";
    }

    return false;
}
