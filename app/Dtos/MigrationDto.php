<?php

namespace App\Dtos;

class MigrationDto
{
    public $migration_name;
    public $commit_id;

    public static function create(string $migrationName, string $commitId)
    {
        $dto = new self();
        $dto->migration_name = $migrationName;
        $dto->commit_id = $commitId;
        return $dto;
    }
}
