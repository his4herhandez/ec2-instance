<?php

use App\Controllers\MigrationController;

require_once __DIR__ . "/../vendor/autoload.php";
require_once __DIR__ . "/../config/eloquent.php"; // Asegúrate de incluir la configuración de Eloquent

$migrationController = new MigrationController();

$migrationMethod = false;
$commitId = false;
CONST MIGRATIONS_PATH = __DIR__ . "/migrations";
$migrationFiles = array_diff(scandir(MIGRATIONS_PATH), array('..', '.'));

if ($argc > 2) {
    $migrationMethod = $argv[1];
    $commitId = $argv[2];
}

runMigrations($migrationFiles, $commitId,$migrationMethod);

function runMigrations(array $migrationFiles, string $commitId, string $migrationMethod): void
{
    if ($migrationMethod == "down") {
        runDownMigrations($migrationFiles, $commitId);
    } else {
        runUpMigrations($migrationFiles, $commitId);
    }
}

function runDownMigrations(array $migrationFiles, string $commitId)
{
    global $migrationController;
    $migrationExists = getExistsMigrationByCommitId($commitId);

    // Verificar si se encontraron migraciones
    if (!isset($migrationExists->data) || empty($migrationExists->data)) {
        echo "\033[36mNo migrations found for commit ID $commitId\n \033[0m\n";
        return;
    }

    foreach ($migrationExists->data as $migration) {

        $migrationId = $migration->id;
        $migrationName = $migration->migration_name;
        $path = MIGRATIONS_PATH . "/$migrationName";

        if (executeMigration($path, 'down')) {
            // Eliminar la migración del repositorio
            $migrationController->delete($migrationId);
            echo "\033[32mMigration down for commit ID $commitId completed successfully\033[0m\n";
        }
    }
}

function runUpMigrations($migrationFiles, $commitId)
{
    global $migrationController;

    foreach ($migrationFiles as $file) {

        if ($file != "." && $file != "..") {

            $path = MIGRATIONS_PATH . "/$file";

            if (!is_file($path)) {
                continue;
            }

            $migrationExists = getExistsMigrationByName($file);

            if ($migrationExists) {
                echo "$migrationExists";
                continue;
            }

            if (executeMigration($path, 'up')) {
                // Insertamos la migración en el repositorio
                $migrationController->store($file, $commitId);
                echo "\033[32mMigration up $file successfully\033[0m\n";
            }
        }
    }
}

function executeMigration($path, $method)
{
    if (file_exists($path)) {

        require_once $path;
        $class = getClassNameFromFile($path);

        if ($class && class_exists($class)) {

            try {

                $instance = new $class();
                $instance->$method();
                return true;

            } catch (\Exception $e) {
                echo "\033[31mError executing migration $path: " . $e->getMessage() . "\033[0m\n";
            }
        } else {
            echo "\033[33mClass $class not found in $path.\033[0m\n";
        }

    } else {
        echo "\033[33mMigration file $path does not exist.\033[0m\n";
    }
    return false;
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

function getExistsMigrationByName(string $file)
{
    global $migrationController;
    $migrationExists = $migrationController->getExistsMigrationByName($file);

    if (!$migrationExists->status) {
        return $migrationExists->msg;
    } elseif (!empty($migrationExists->data)) {
        return "\033[31mMigration $file has already been executed\033[0m\n";
    }

    return false;
}

function getExistsMigrationByCommitId(string $commitId)
{
    global $migrationController;
    $migrationExists = $migrationController->getExistsMigrationByCommitId($commitId);

    if (!$migrationExists->status) {
        return $migrationExists->msg;
    } elseif (!empty($migrationExists->data)) {
        return $migrationExists;
    }

    return "\033[31mNo migrations associated with $commitId were found\033[0m\n";
}
