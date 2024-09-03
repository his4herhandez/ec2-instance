<?php

namespace App\Controllers;
use App\Services\MigrationService;


class MigrationController
{
    protected $migrationService;

    public function __construct()
    {
        $this->migrationService = new MigrationService();
    }

    public function store(string $migration, string $commitId)
    {
        return $this->migrationService->storeMigration($migration, $commitId);
    }


    public function update(int $migrationId, string $commitId)
    {
        return $this->migrationService->updateMigration($migrationId, $commitId);
    }

    public function delete(int $migrationId)
    {
        return $this->migrationService->deleteMigration($migrationId);
    }

    public function getExistsMigrationByName(string $migration)
    {
        return $this->migrationService->getExistsMigrationByName($migration);
    }

    public function getExistsMigrationByCommitId(string $commitId)
    {
        return $this->migrationService->getExistsMigrationByCommitId($commitId);
    }

}