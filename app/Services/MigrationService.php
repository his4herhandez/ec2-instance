<?php

namespace App\Services;

use App\Dtos\MigrationDto;
use App\Repositories\MigrationRepository;

class MigrationService
{
    private $migrationRepository;

    public function __construct()
    {
        $this->migrationRepository = new MigrationRepository();
    }


    public function storeMigration(string $migrationName, string $commitId)
    {
        $migrationDto = MigrationDto::create($migrationName, $commitId);
        $response = $this->migrationRepository->store($migrationDto);
        return $response;
    }


    public function updateMigration(int $migrationId, string $commitId)
    {
        return $this->migrationRepository->update($migrationId, $commitId);
    }


    public function deleteMigration(int $migrationId)
    {
        // obtenemos todas las migrations con ese id
        $migrations = $this->migrationRepository->delete($migrationId);

        if (!$migrations->status){
            return $migrations;
        }

        // tratamos de eliminar

        // returnamos
    }


    public function getExistsMigrationByName(string $migration)
    {
        return $this->migrationRepository->getExistsMigrationByName($migration);
    }


    public function getExistsMigrationByCommitId(string $commitId)
    {
        return $this->migrationRepository->getExistsMigrationByCommitId($commitId);
    }
}