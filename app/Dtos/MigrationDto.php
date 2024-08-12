<?php

namespace App\Dtos;

class MigrationDto
{
    public $migration_name;
    public $commit_id;

    public static function create(string $migrationName)
    {
        $dto = new self();
        $dto->migration_name = $migrationName;
        return $dto;
    }
}
