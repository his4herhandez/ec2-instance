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


    public function deleteMigration(string $commitId)
    {
        // obtenemos todas las migrations con ese id
        $migrations = $this->migrationRepository->getExistsMigrationByName($commitId);

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
}