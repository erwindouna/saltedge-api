<?php

namespace App\Http\Controllers;

use App\Repositories\ConfigurationRepository;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InstallController extends Controller
{
    protected $configuration;

    /**
     * InstallController constructor.
     * @param ConfigurationRepository $configurationRepository
     */
    public function __construct(ConfigurationRepository $configurationRepository)
    {
        $this->configuration = $configurationRepository;
    }

    public function index()
    {
        if (false === $this->configuration->checkInstallationStatus()) {
            return view('install/firefly');
        }

        return view('install');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function fireflyOauthRequest(Request $request)
    {
        $state = Str::random(40);
        $this->configuration->createConfiguration('ffEndpoint', $request->input('fireflyEndpoint'));
        $this->configuration->createConfiguration('ffClientId', $request->input('clientId'));
        $this->configuration->createConfiguration('ffSecret', $request->input('secret'));

        $query = http_build_query([
            'client_id' => $request->input('clientId'),
            'redirect_uri' => route('fireflyOauthResponse'),
            'response_type' => 'code',
            'scope' => '',
            'state' => $state
        ]);

        return redirect($request->input('fireflyEndpoint') . '/authorize?' . $query);
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function fireflyOauthResponse(Request $request)
    {
        if ($request->input('error') == 'access_denied') {
            return view('install/firefly');
        }

        $ffEndpoint = $this->configuration->get('ffEndpoint');
        $ffClientId = $this->configuration->get('ffClientId');
        $ffSecret = $this->configuration->get('ffSecret');

        $http = new Client;
        $response = $http->post($ffEndpoint->getAttribute('data') . '/token', [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => $ffClientId->getAttribute('data'),
                'client_secret' => $ffSecret->getAttribute('data'),
                'redirect_uri' => route('fireflyOauthResponse'),
                'code' => $request->input('code')
            ]
        ]);

        dd($response);
        //return json_decode((string)$response->getBody(), true);
    }
}
