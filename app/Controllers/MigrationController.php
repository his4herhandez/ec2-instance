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

    public function store(string $migration)
    {
        return $this->migrationService->storeMigration($migration);
    }


    public function update(int $migrationId, string $commitId)
    {
        return $this->migrationService->updateMigration($migrationId, $commitId);
    }

    public function delete(string $commitId)
    {
        return $this->migrationService->deleteMigration($commitId);
    }

    public function getExistsMigrationByName(string $migration)
    {
        return $this->migrationService->getExistsMigrationByName($migration);
    }

}