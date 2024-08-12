<?php

namespace App\Repositories;

use App\Dtos\MigrationDto;
use App\Models\Migration;

class MigrationRepository
{

    public function store(MigrationDto $migrationDto)
    {
        try {

            $query = Migration::create((array) $migrationDto);

            return (object)[
                "status" => 1,
                "id" => $query->id
            ];

        } catch (\Exception $e) {

            return (object) [
                "status" => 0,
                "msg" => $e->getMessage()
            ];
        }
    }


    public function update(int $migrationId, string $commitId)
    {
        try {

            Migration::where('id', $migrationId)
                ->update([
                    'commit_id' => $commitId
                ]);

            return (object) [
                "status" => 1,
                "data" => []
            ];

        } catch (\Exception $e) {

            return (object) [
                "status" => 0,
                "msg" => $e->getMessage()
            ];
        }
    }


    public function delete()
    {

    }


    public function getExistsMigrationByName(string $migration)
    {
        try {
            $query = Migration::where('migration_name', $migration)->first();

            return (object)[
                "status" => 1,
                "data" => $query
            ];
        } catch (\Exception $e) {
            return (object) [
                "status" => 0,
                "msg" => $e->getMessage()
            ];
        }
    }
}