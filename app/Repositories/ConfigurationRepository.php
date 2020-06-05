<?php

namespace App\Repositories;

use App\Models\ConfigurationModel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class ConfigurationRepository implements ConfigurationInterface
{

    /**
     * @return bool
     */
    public function checkInstallationStatus(): bool
    {
        Log::debug('Checking installation status.');
        if (null === ConfigurationModel::where('name', 'firefly_access_token')->first()) {
            Log::error('API not properly installed!');
            return false;
        }
        Log::debug('API properly installed.');
        return true;
    }

    /**
     * @param string $name
     * @return ConfigurationModel|null
     */
    public function get(string $name): ?ConfigurationModel
    {
        return ConfigurationModel::where('name', $name)->first();
    }

    /**
     * @return Collection|null
     */
    public function getAllConfigurations(): ?Collection
    {
        return ConfigurationModel::all();
    }

    /**
     * @param string $name
     * @param string $data
     * @return ConfigurationModel|null
     */
    public function createConfiguration(string $name, string $data): ?ConfigurationModel
    {
        // Update if it exists
        $checkConfiguration = ConfigurationModel::where('name', $name)->first();
        if (null !== $checkConfiguration) {
            $checkConfiguration->name = $name;
            $checkConfiguration->data = $data;
            $checkConfiguration->save();

            return $checkConfiguration;
        }

        $model = ConfigurationModel::create([
            'name' => $name,
            'data' => $data
        ]);

        dd($model->first());
        return $model->id();
    }
}