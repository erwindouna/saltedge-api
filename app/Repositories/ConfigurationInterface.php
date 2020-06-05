<?php

namespace App\Repositories;

use App\Models\ConfigurationModel;
use Illuminate\Support\Collection;


interface ConfigurationInterface
{
    /**
     * @return bool
     */
    public function checkInstallationStatus(): bool;

    /**
     * @param string $name
     * @param string $data
     * @return ConfigurationModel|null
     */
    public function createConfiguration(string $name, string $data): ?ConfigurationModel;

    /**
     * @return Collection|null
     */
    public function getAllConfigurations(): ?Collection;

    /**
     * @param string $name
     * @return ConfigurationModel|null
     */
    public function get(string $name): ?ConfigurationModel;
}