<?php

namespace App\Services\SaltEdge\Objects;

use App\Services\SaltEdge\Objects\Login\Attempt;
use App\Services\SaltEdge\Objects\Login\Holder;
use Illuminate\Support\Carbon;

class Login
{
    private $customerId;
    private $consentGivenAt;
    private $consentTypes;
    private $countryCode;
    private $createdAt;
    private $updatedAt;
    private $dailyRefresh;
    private $holderInfo;
    private $id;
    private $lastAttempt;
    private $lastSuccessAt;
    private $nextRefreshPossibleAt;
    private $providerCode;
    private $providerId;
    private $providerName;
    private $showConsentConfirmation;
    private $status;
    private $storeCredentials;

    /**
     * Login constructor.
     * @param array $array
     * @throws \Exception
     */
    public function __construct(array $array)
    {
        $this->consentGivenAt = new Carbon($array['consent_given_at']);
        $this->consentTypes = $array['consent_types'];
        $this->countryCode = $array['country_code'];
        $this->createdAt = new Carbon($array['created_at']);
        $this->updatedAt = new Carbon($array['updated_at']);
        $this->customerId = $array['customer_id'];
        $this->dailyRefresh = $array['daily_refresh'];
        $this->holderInfo = new Holder($array['holder_info']);
        $this->id = (int)$array['id'];
        $this->lastAttempt = new Attempt($array['last_attempt']);
        $this->lastSuccessAt = new Carbon($array['last_success_at']);
        $this->nextRefreshPossibleAt = new Carbon($array['next_refresh_possible_at']);
        $this->providerCode = $array['provider_code'];
        $this->providerId = $array['provider_id'];
        $this->providerName = $array['provider_name'];
        $this->showConsentConfirmation = $array['show_consent_confirmation'];
        $this->status = $array['status'];
        $this->storeCredentials = $array['store_credentials'];
    }

    /**
     * @return mixed
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param mixed $customerId
     */
    public function setCustomerId($customerId): void
    {
        $this->customerId = $customerId;
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
     * @return mixed
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param mixed $countryCode
     */
    public function setCountryCode($countryCode): void
    {
        $this->countryCode = $countryCode;
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
     * @return Holder
     */
    public function getHolderInfo(): Holder
    {
        return $this->holderInfo;
    }

    /**
     * @param Holder $holderInfo
     */
    public function setHolderInfo(Holder $holderInfo): void
    {
        $this->holderInfo = $holderInfo;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return Attempt
     */
    public function getLastAttempt(): Attempt
    {
        return $this->lastAttempt;
    }

    /**
     * @param Attempt $lastAttempt
     */
    public function setLastAttempt(Attempt $lastAttempt): void
    {
        $this->lastAttempt = $lastAttempt;
    }

    /**
     * @return Carbon
     */
    public function getLastSuccessAt(): Carbon
    {
        return $this->lastSuccessAt;
    }

    /**
     * @param Carbon $lastSuccessAt
     */
    public function setLastSuccessAt(Carbon $lastSuccessAt): void
    {
        $this->lastSuccessAt = $lastSuccessAt;
    }

    /**
     * @return Carbon
     */
    public function getNextRefreshPossibleAt(): Carbon
    {
        return $this->nextRefreshPossibleAt;
    }

    /**
     * @param Carbon $nextRefreshPossibleAt
     */
    public function setNextRefreshPossibleAt(Carbon $nextRefreshPossibleAt): void
    {
        $this->nextRefreshPossibleAt = $nextRefreshPossibleAt;
    }

    /**
     * @return mixed
     */
    public function getProviderCode()
    {
        return $this->providerCode;
    }

    /**
     * @param mixed $providerCode
     */
    public function setProviderCode($providerCode): void
    {
        $this->providerCode = $providerCode;
    }

    /**
     * @return mixed
     */
    public function getProviderId()
    {
        return $this->providerId;
    }

    /**
     * @param mixed $providerId
     */
    public function setProviderId($providerId): void
    {
        $this->providerId = $providerId;
    }

    /**
     * @return mixed
     */
    public function getProviderName()
    {
        return $this->providerName;
    }

    /**
     * @param mixed $providerName
     */
    public function setProviderName($providerName): void
    {
        $this->providerName = $providerName;
    }

    /**
     * @return mixed
     */
    public function getShowConsentConfirmation()
    {
        return $this->showConsentConfirmation;
    }

    /**
     * @param mixed $showConsentConfirmation
     */
    public function setShowConsentConfirmation($showConsentConfirmation): void
    {
        $this->showConsentConfirmation = $showConsentConfirmation;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
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
}