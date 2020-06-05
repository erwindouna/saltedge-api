<?php

namespace App\Http\Controllers;

use App\Repositories\ConfigurationRepository;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    protected $configuration;

    /**
     * HomeController constructor.
     * @param ConfigurationRepository $configurationRepository
     */
    public function __construct(ConfigurationRepository $configurationRepository)
    {
        $this->configuration = $configurationRepository;
        if (false === $configurationRepository->checkInstallationStatus()) {
            Redirect::to('install')->send();
        }
    }

    public function index()
    {
        return view('home');
    }
}
