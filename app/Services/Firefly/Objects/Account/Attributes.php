<?php

namespace App\Services\Firefly\Objects\Account;

use Carbon\Carbon;

class Attributes
{
    private $createdAt;
    private $updatedAt;
    private $active;
    private $name;
    private $type;
    private $accountRole;
    private $currencyId;
    private $currencyCode;
    private $currencySymbol;
    private $currencyDecimalPlaces;
    private $currentBalance;
    private $currentBalanceDate;
    private $notes;
    private $monthlyPaymentDate;
    private $creditCardType;
    private $accountNumber;
    private $iban;
    private $bic;
    private $virtualBalance;
    private $openingBalance;
    private $openingBalanceDate;
    private $liabilityType;
    private $liabilityAmount;
    private $liabilityStartDate;
    private $includeNetWorth;
    private $longitude;
    private $latitude;
    private $zoomLevel;

    /**
     * Attributes constructor.
     * @param array $array
     * @throws \Exception
     */
    public function __construct(array $array)
    {
        $this->createdAt = new Carbon($array['created_at']);
        $this->updatedAt = new Carbon($array['updated_at']);
        $this->active = $array['active'];
        $this->name = $array['name'];
        $this->type = $array['type'];
        $this->accountRole = $array['account_role'];
        $this->currencyId = $array['currency_id'];
        $this->currencyCode = $array['currency_code'];
        $this->currencySymbol = $array['currency_symbol'];
        $this->currencyDecimalPlaces = $array['currency_decimal_places'];
        $this->currentBalance = $array['current_balance'];
        $this->currentBalanceDate = new Carbon($array['current_balance_date']);
        $this->notes = $array['notes'];
        $this->monthlyPaymentDate = new Carbon($array['monthly_payment_date']);
        $this->creditCardType = $array['credit_card_type'];
        $this->accountNumber = $array['account_number'];
        $this->iban = $array['iban'];
        $this->bic = $array['bic'];
        $this->virtualBalance = $array['virtual_balance'];
        $this->openingBalance = $array['opening_balance'];
        $this->openingBalanceDate = new Carbon($array['opening_balance_date']);
        $this->liabilityType = $array['liability_type'];
        $this->liabilityAmount = $array['liability_amount'];
        $this->liabilityStartDate = new Carbon($array['liability_start_date']);
        $this->includeNetWorth = $array['include_net_worth'];
        $this->longitude = $array['longitude'];
        $this->latitude = $array['latitude'];
        $this->zoomLevel = $array['zoom_level'];
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
    public function getActive()
    {
        return $this->active;
    }

    /**
     * @param mixed $active
     */
    public function setActive($active): void
    {
        $this->active = $active;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getAccountRole()
    {
        return $this->accountRole;
    }

    /**
     * @param mixed $accountRole
     */
    public function setAccountRole($accountRole): void
    {
        $this->accountRole = $accountRole;
    }

    /**
     * @return mixed
     */
    public function getCurrencyId()
    {
        return $this->currencyId;
    }

    /**
     * @param mixed $currencyId
     */
    public function setCurrencyId($currencyId): void
    {
        $this->currencyId = $currencyId;
    }

    /**
     * @return mixed
     */
    public function getCurrencyCode()
    {
        return $this->currencyCode;
    }

    /**
     * @param mixed $currencyCode
     */
    public function setCurrencyCode($currencyCode): void
    {
        $this->currencyCode = $currencyCode;
    }

    /**
     * @return mixed
     */
    public function getCurrencySymbol()
    {
        return $this->currencySymbol;
    }

    /**
     * @param mixed $currencySymbol
     */
    public function setCurrencySymbol($currencySymbol): void
    {
        $this->currencySymbol = $currencySymbol;
    }

    /**
     * @return mixed
     */
    public function getCurrencyDecimalPlaces()
    {
        return $this->currencyDecimalPlaces;
    }

    /**
     * @param mixed $currencyDecimalPlaces
     */
    public function setCurrencyDecimalPlaces($currencyDecimalPlaces): void
    {
        $this->currencyDecimalPlaces = $currencyDecimalPlaces;
    }

    /**
     * @return mixed
     */
    public function getCurrentBalance()
    {
        return $this->currentBalance;
    }

    /**
     * @param mixed $currentBalance
     */
    public function setCurrentBalance($currentBalance): void
    {
        $this->currentBalance = $currentBalance;
    }

    /**
     * @return Carbon
     */
    public function getCurrentBalanceDate(): Carbon
    {
        return $this->currentBalanceDate;
    }

    /**
     * @param Carbon $currentBalanceDate
     */
    public function setCurrentBalanceDate(Carbon $currentBalanceDate): void
    {
        $this->currentBalanceDate = $currentBalanceDate;
    }

    /**
     * @return mixed
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * @param mixed $notes
     */
    public function setNotes($notes): void
    {
        $this->notes = $notes;
    }

    /**
     * @return Carbon
     */
    public function getMonthlyPaymentDate(): Carbon
    {
        return $this->monthlyPaymentDate;
    }

    /**
     * @param Carbon $monthlyPaymentDate
     */
    public function setMonthlyPaymentDate(Carbon $monthlyPaymentDate): void
    {
        $this->monthlyPaymentDate = $monthlyPaymentDate;
    }

    /**
     * @return mixed
     */
    public function getCreditCardType()
    {
        return $this->creditCardType;
    }

    /**
     * @param mixed $creditCardType
     */
    public function setCreditCardType($creditCardType): void
    {
        $this->creditCardType = $creditCardType;
    }

    /**
     * @return mixed
     */
    public function getAccountNumber()
    {
        return $this->accountNumber;
    }

    /**
     * @param mixed $accountNumber
     */
    public function setAccountNumber($accountNumber): void
    {
        $this->accountNumber = $accountNumber;
    }

    /**
     * @return mixed
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * @param mixed $iban
     */
    public function setIban($iban): void
    {
        $this->iban = $iban;
    }

    /**
     * @return mixed
     */
    public function getBic()
    {
        return $this->bic;
    }

    /**
     * @param mixed $bic
     */
    public function setBic($bic): void
    {
        $this->bic = $bic;
    }

    /**
     * @return mixed
     */
    public function getVirtualBalance()
    {
        return $this->virtualBalance;
    }

    /**
     * @param mixed $virtualBalance
     */
    public function setVirtualBalance($virtualBalance): void
    {
        $this->virtualBalance = $virtualBalance;
    }

    /**
     * @return mixed
     */
    public function getOpeningBalance()
    {
        return $this->openingBalance;
    }

    /**
     * @param mixed $openingBalance
     */
    public function setOpeningBalance($openingBalance): void
    {
        $this->openingBalance = $openingBalance;
    }

    /**
     * @return Carbon
     */
    public function getOpeningBalanceDate(): Carbon
    {
        return $this->openingBalanceDate;
    }

    /**
     * @param Carbon $openingBalanceDate
     */
    public function setOpeningBalanceDate(Carbon $openingBalanceDate): void
    {
        $this->openingBalanceDate = $openingBalanceDate;
    }

    /**
     * @return mixed
     */
    public function getLiabilityType()
    {
        return $this->liabilityType;
    }

    /**
     * @param mixed $liabilityType
     */
    public function setLiabilityType($liabilityType): void
    {
        $this->liabilityType = $liabilityType;
    }

    /**
     * @return mixed
     */
    public function getLiabilityAmount()
    {
        return $this->liabilityAmount;
    }

    /**
     * @param mixed $liabilityAmount
     */
    public function setLiabilityAmount($liabilityAmount): void
    {
        $this->liabilityAmount = $liabilityAmount;
    }

    /**
     * @return Carbon
     */
    public function getLiabilityStartDate(): Carbon
    {
        return $this->liabilityStartDate;
    }

    /**
     * @param Carbon $liabilityStartDate
     */
    public function setLiabilityStartDate(Carbon $liabilityStartDate): void
    {
        $this->liabilityStartDate = $liabilityStartDate;
    }

    /**
     * @return mixed
     */
    public function getIncludeNetWorth()
    {
        return $this->includeNetWorth;
    }

    /**
     * @param mixed $includeNetWorth
     */
    public function setIncludeNetWorth($includeNetWorth): void
    {
        $this->includeNetWorth = $includeNetWorth;
    }

    /**
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * @param mixed $longitude
     */
    public function setLongitude($longitude): void
    {
        $this->longitude = $longitude;
    }

    /**
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * @param mixed $latitude
     */
    public function setLatitude($latitude): void
    {
        $this->latitude = $latitude;
    }

    /**
     * @return mixed
     */
    public function getZoomLevel()
    {
        return $this->zoomLevel;
    }

    /**
     * @param mixed $zoomLevel
     */
    public function setZoomLevel($zoomLevel): void
    {
        $this->zoomLevel = $zoomLevel;
    }
}