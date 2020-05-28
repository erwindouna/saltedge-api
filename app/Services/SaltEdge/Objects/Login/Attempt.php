<?php

namespace App\Services\SaltEdge\Objects\Login;

use Illuminate\Support\Carbon;

class Attempt
{
    private $apiMode;
    private $apiVersion;
    private $automaticFetch;
    private $categorize;
    private $consentGivenAt;
    private $consentTypes;
    private $createdAt;
    private $customFields;
    private $dailyRefresh;
    private $deviceType;
    private $excludeAccounts;
    private $failAt;
    private $failErrorClass;
    private $failMessage;
    private $fetchScopes;
    private $finished;
    private $finishedRecent;
    private $fromDate;
    private $id;
    private $interactive;
    private $locale;
    private $partial;
    private $remoteIp;
    private $showConsentInformation;
    private $stages;
    private $storeCredentials;
    private $successAt;
    private $toDate;
    private $updatedAt;
    private $userAgent;


    /**
     * Attempt constructor.
     * @param array $array
     * @throws \Exception
     */
    public function __construct(array $array)
    {
        $this->apiMode = $array['api_mode'];
        $this->apiVersion = $array['api_version'];
        $this->automaticFetch = $array['automatic_fetch'];
        $this->categorize = $array['categorize'];
        $this->createdAt = new Carbon($array['created_at']);
        $this->consentGivenAt = new Carbon($array['consent_given_at']);
        $this->consentTypes = $array['consent_types'];
        $this->customFields = $array['custom_fields'];
        $this->dailyRefresh = $array['daily_refresh'];
        $this->deviceType = $array['device_type'];
        $this->userAgent = $array['user_agent'] ?? '';
        $this->remoteIp = $array['remote_ip'];
        $this->excludeAccounts = $array['exclude_accounts'];
        $this->failAt = new Carbon($array['fail_at']);
        $this->failErrorClass = $array['fail_error_class'];
        $this->failMessage = $array['fail_message'];
        $this->fetchScopes = $array['fetch_scopes'];
        $this->finished = $array['finished'];
        $this->finishedRecent = $array['finished_recent'];
        $this->fromDate = new Carbon($array['from_date']);
        $this->id = $array['id'];
        $this->interactive = $array['interactive'];
        $this->locale = $array['locale'];
        $this->partial = $array['partial'];
        $this->showConsentInformation = $array['show_consent_confirmation'];
        $this->stages = $array['stages'] ?? [];
        $this->storeCredentials = $array['store_credentials'];
        $this->successAt = new Carbon($array['success_at']);
        $this->toDate = new Carbon($array['to_date']);
        $this->updatedAt = new Carbon($array['updated_at']);
    }

    /**
     * @return mixed
     */
    public function getApiMode()
    {
        return $this->apiMode;
    }

    /**
     * @param mixed $apiMode
     */
    public function setApiMode($apiMode): void
    {
        $this->apiMode = $apiMode;
    }

    /**
     * @return mixed
     */
    public function getApiVersion()
    {
        return $this->apiVersion;
    }

    /**
     * @param mixed $apiVersion
     */
    public function setApiVersion($apiVersion): void
    {
        $this->apiVersion = $apiVersion;
    }

    /**
     * @return mixed
     */
    public function getAutomaticFetch()
    {
        return $this->automaticFetch;
    }

    /**
     * @param mixed $automaticFetch
     */
    public function setAutomaticFetch($automaticFetch): void
    {
        $this->automaticFetch = $automaticFetch;
    }

    /**
     * @return mixed
     */
    public function getCategorize()
    {
        return $this->categorize;
    }

    /**
     * @param mixed $categorize
     */
    public function setCategorize($categorize): void
    {
        $this->categorize = $categorize;
    }

    /**
     * @return Carbon
     */
    public function getConsentGivenAt(): Carbon
    {
        return $this->consentGivenAt;
    }

    /**
     * @param Carbon $consentGivenAt
     */
    public function setConsentGivenAt(Carbon $consentGivenAt): void
    {
        $this->consentGivenAt = $consentGivenAt;
    }

    /**
     * @return mixed
     */
    public function getConsentTypes()
    {
        return $this->consentTypes;
    }

    /**
     * @param mixed $consentTypes
     */
    public function setConsentTypes($consentTypes): void
    {
        $this->consentTypes = $consentTypes;
    }

    /**
     * @return Carbon
     */
    public function getCreatedAt(): Carbon
    {
        return $this->createdAt;
    }

    /**
     * @param Carbon $createdAt
     */
    public function setCreatedAt(Carbon $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    /**
     * @return mixed
     */
    public function getCustomFields()
    {
        return $this->customFields;
    }

    /**
     * @param mixed $customFields
     */
    public function setCustomFields($customFields): void
    {
        $this->customFields = $customFields;
    }

    /**
     * @return mixed
     */
    public function getDailyRefresh()
    {
        return $this->dailyRefresh;
    }

    /**
     * @param mixed $dailyRefresh
     */
    public function setDailyRefresh($dailyRefresh): void
    {
        $this->dailyRefresh = $dailyRefresh;
    }

    /**
     * @return mixed
     */
    public function getDeviceType()
    {
        return $this->deviceType;
    }

    /**
     * @param mixed $deviceType
     */
    public function setDeviceType($deviceType): void
    {
        $this->deviceType = $deviceType;
    }

    /**
     * @return mixed
     */
    public function getExcludeAccounts()
    {
        return $this->excludeAccounts;
    }

    /**
     * @param mixed $excludeAccounts
     */
    public function setExcludeAccounts($excludeAccounts): void
    {
        $this->excludeAccounts = $excludeAccounts;
    }

    /**
     * @return Carbon
     */
    public function getFailAt(): Carbon
    {
        return $this->failAt;
    }

    /**
     * @param Carbon $failAt
     */
    public function setFailAt(Carbon $failAt): void
    {
        $this->failAt = $failAt;
    }

    /**
     * @return mixed
     */
    public function getFailErrorClass()
    {
        return $this->failErrorClass;
    }

    /**
     * @param mixed $failErrorClass
     */
    public function setFailErrorClass($failErrorClass): void
    {
        $this->failErrorClass = $failErrorClass;
    }

    /**
     * @return mixed
     */
    public function getFailMessage()
    {
        return $this->failMessage;
    }

    /**
     * @param mixed $failMessage
     */
    public function setFailMessage($failMessage): void
    {
        $this->failMessage = $failMessage;
    }

    /**
     * @return mixed
     */
    public function getFetchScopes()
    {
        return $this->fetchScopes;
    }

    /**
     * @param mixed $fetchScopes
     */
    public function setFetchScopes($fetchScopes): void
    {
        $this->fetchScopes = $fetchScopes;
    }

    /**
     * @return mixed
     */
    public function getFinished()
    {
        return $this->finished;
    }

    /**
     * @param mixed $finished
     */
    public function setFinished($finished): void
    {
        $this->finished = $finished;
    }

    /**
     * @return mixed
     */
    public function getFinishedRecent()
    {
        return $this->finishedRecent;
    }

    /**
     * @param mixed $finishedRecent
     */
    public function setFinishedRecent($finishedRecent): void
    {
        $this->finishedRecent = $finishedRecent;
    }

    /**
     * @return Carbon
     */
    public function getFromDate(): Carbon
    {
        return $this->fromDate;
    }

    /**
     * @param Carbon $fromDate
     */
    public function setFromDate(Carbon $fromDate): void
    {
        $this->fromDate = $fromDate;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getInteractive()
    {
        return $this->interactive;
    }

    /**
     * @param mixed $interactive
     */
    public function setInteractive($interactive): void
    {
        $this->interactive = $interactive;
    }

    /**
     * @return mixed
     */
    public function getLocale()
    {
        return $this->locale;
    }

    /**
     * @param mixed $locale
     */
    public function setLocale($locale): void
    {
        $this->locale = $locale;
    }

    /**
     * @return mixed
     */
    public function getPartial()
    {
        return $this->partial;
    }

    /**
     * @param mixed $partial
     */
    public function setPartial($partial): void
    {
        $this->partial = $partial;
    }

    /**
     * @return mixed
     */
    public function getRemoteIp()
    {
        return $this->remoteIp;
    }

    /**
     * @param mixed $remoteIp
     */
    public function setRemoteIp($remoteIp): void
    {
        $this->remoteIp = $remoteIp;
    }

    /**
     * @return mixed
     */
    public function getShowConsentInformation()
    {
        return $this->showConsentInformation;
    }

    /**
     * @param mixed $showConsentInformation
     */
    public function setShowConsentInformation($showConsentInformation): void
    {
        $this->showConsentInformation = $showConsentInformation;
    }

    /**
     * @return array|mixed
     */
    public function getStages()
    {
        return $this->stages;
    }

    /**
     * @param array|mixed $stages
     */
    public function setStages($stages): void
    {
        $this->stages = $stages;
    }

    /**
     * @return mixed
     */
    public function getStoreCredentials()
    {
        return $this->storeCredentials;
    }

    /**
     * @param mixed $storeCredentials
     */
    public function setStoreCredentials($storeCredentials): void
    {
        $this->storeCredentials = $storeCredentials;
    }

    /**
     * @return Carbon
     */
    public function getSuccessAt(): Carbon
    {
        return $this->successAt;
    }

    /**
     * @param Carbon $successAt
     */
    public function setSuccessAt(Carbon $successAt): void
    {
        $this->successAt = $successAt;
    }

    /**
     * @return Carbon
     */
    public function getToDate(): Carbon
    {
        return $this->toDate;
    }

    /**
     * @param Carbon $toDate
     */
    public function setToDate(Carbon $toDate): void
    {
        $this->toDate = $toDate;
    }

    /**
     * @return Carbon
     */
    public function getUpdatedAt(): Carbon
    {
        return $this->updatedAt;
    }

    /**
     * @param Carbon $updatedAt
     */
    public function setUpdatedAt(Carbon $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return mixed|string
     */
    public function getUserAgent()
    {
        return $this->userAgent;
    }

    /**
     * @param mixed|string $userAgent
     */
    public function setUserAgent($userAgent): void
    {
        $this->userAgent = $userAgent;
    }
}