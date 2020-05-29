<?php

namespace App\Services\SaltEdge\Objects;

use Carbon\Carbon;

class TransactionExtra
{
    private $accountBalanceSnapshot;
    private $accountNumber;
    private $additional;
    private $assetAmount;
    private $assetCode;
    private $categorizationConfidence;
    private $checkNumber;
    private $customerCategoryCode;
    private $customerCategoryName;
    private $id;
    private $information;
    private $mcc;
    private $originalAmount;
    private $originalCategory;
    private $originalCurrencyCode;
    private $originalSubCategory;
    private $payee;
    private $possibleDuplicate;
    private $postingDate;
    private $postingTime;
    private $recordNumber;
    private $tags;
    private $time;
    private $type;
    private $unitPrice;
    private $units;

    /**
     * TransactionExtra constructor.
     * @param array $array
     * @throws \Exception
     */
    public function __construct(array $array)
    {
        $this->id = $array['id'] ?? null;
        $this->recordNumber = $array['record_number'] ?? null;
        $this->information = $array['information'] ?? null;
        $this->time = isset($array['time']) ? new Carbon($array['time']) : null;
        $this->postingDate = isset($array['posting_date']) ? new Carbon($array['posting_date']) : null;
        $this->postingTime = isset($array['posting_time']) ? new Carbon($array['posting_time']) : null;
        $this->accountNumber = $array['account_number'] ?? null;
        $this->originalAmount = $array['original_amount'] ?? null;
        $this->originalCurrencyCode = $array['original_currency_code'] ?? null;
        $this->assetCode = $array['asset_code'] ?? null;
        $this->assetAmount = $array['asset_amount'] ?? null;
        $this->originalCategory = $array['original_category'] ?? null;
        $this->originalSubCategory = $array['original_subcategory'] ?? null;
        $this->customerCategoryCode = $array['customer_category_code'] ?? null;
        $this->customerCategoryName = $array['customer_category_name'] ?? null;
        $this->possibleDuplicate = $array['possible_duplicate'] ?? null;
        $this->tags = $array['tags'] ?? null;
        $this->mcc = $array['mcc'] ?? null;
        $this->payee = $array['payee'] ?? null;
        $this->type = $array['type'] ?? null;
        $this->checkNumber = $array['check_number'] ?? null;
        $this->units = $array['units'] ?? null;
        $this->additional = $array['additional'] ?? null;
        $this->unitPrice = $array['unit_price'] ?? null;
        $this->accountBalanceSnapshot = $array['account_balance_snapshot'] ?? null;
        $this->categorizationConfidence = $array['categorization_confidence'] ?? null;
    }

    /**
     * @return mixed|null
     */
    public function getAccountBalanceSnapshot(): ?mixed
    {
        return $this->accountBalanceSnapshot;
    }

    /**
     * @param mixed|null $accountBalanceSnapshot
     */
    public function setAccountBalanceSnapshot(?mixed $accountBalanceSnapshot): void
    {
        $this->accountBalanceSnapshot = $accountBalanceSnapshot;
    }

    /**
     * @return mixed|null
     */
    public function getAccountNumber(): ?mixed
    {
        return $this->accountNumber;
    }

    /**
     * @param mixed|null $accountNumber
     */
    public function setAccountNumber(?mixed $accountNumber): void
    {
        $this->accountNumber = $accountNumber;
    }

    /**
     * @return mixed|null
     */
    public function getAdditional(): ?mixed
    {
        return $this->additional;
    }

    /**
     * @param mixed|null $additional
     */
    public function setAdditional(?mixed $additional): void
    {
        $this->additional = $additional;
    }

    /**
     * @return mixed|null
     */
    public function getAssetAmount(): ?mixed
    {
        return $this->assetAmount;
    }

    /**
     * @param mixed|null $assetAmount
     */
    public function setAssetAmount(?mixed $assetAmount): void
    {
        $this->assetAmount = $assetAmount;
    }

    /**
     * @return mixed|null
     */
    public function getAssetCode(): ?mixed
    {
        return $this->assetCode;
    }

    /**
     * @param mixed|null $assetCode
     */
    public function setAssetCode(?mixed $assetCode): void
    {
        $this->assetCode = $assetCode;
    }

    /**
     * @return mixed|null
     */
    public function getCategorizationConfidence(): ?mixed
    {
        return $this->categorizationConfidence;
    }

    /**
     * @param mixed|null $categorizationConfidence
     */
    public function setCategorizationConfidence(?mixed $categorizationConfidence): void
    {
        $this->categorizationConfidence = $categorizationConfidence;
    }

    /**
     * @return mixed|null
     */
    public function getCheckNumber(): ?mixed
    {
        return $this->checkNumber;
    }

    /**
     * @param mixed|null $checkNumber
     */
    public function setCheckNumber(?mixed $checkNumber): void
    {
        $this->checkNumber = $checkNumber;
    }

    /**
     * @return mixed|null
     */
    public function getCustomerCategoryCode(): ?mixed
    {
        return $this->customerCategoryCode;
    }

    /**
     * @param mixed|null $customerCategoryCode
     */
    public function setCustomerCategoryCode(?mixed $customerCategoryCode): void
    {
        $this->customerCategoryCode = $customerCategoryCode;
    }

    /**
     * @return mixed|null
     */
    public function getCustomerCategoryName(): ?mixed
    {
        return $this->customerCategoryName;
    }

    /**
     * @param mixed|null $customerCategoryName
     */
    public function setCustomerCategoryName(?mixed $customerCategoryName): void
    {
        $this->customerCategoryName = $customerCategoryName;
    }

    /**
     * @return mixed|null
     */
    public function getId(): ?mixed
    {
        return $this->id;
    }

    /**
     * @param mixed|null $id
     */
    public function setId(?mixed $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed|null
     */
    public function getInformation(): ?mixed
    {
        return $this->information;
    }

    /**
     * @param mixed|null $information
     */
    public function setInformation(?mixed $information): void
    {
        $this->information = $information;
    }

    /**
     * @return mixed|null
     */
    public function getMcc(): ?mixed
    {
        return $this->mcc;
    }

    /**
     * @param mixed|null $mcc
     */
    public function setMcc(?mixed $mcc): void
    {
        $this->mcc = $mcc;
    }

    /**
     * @return mixed|null
     */
    public function getOriginalAmount(): ?mixed
    {
        return $this->originalAmount;
    }

    /**
     * @param mixed|null $originalAmount
     */
    public function setOriginalAmount(?mixed $originalAmount): void
    {
        $this->originalAmount = $originalAmount;
    }

    /**
     * @return mixed|null
     */
    public function getOriginalCategory(): ?mixed
    {
        return $this->originalCategory;
    }

    /**
     * @param mixed|null $originalCategory
     */
    public function setOriginalCategory(?mixed $originalCategory): void
    {
        $this->originalCategory = $originalCategory;
    }

    /**
     * @return mixed|null
     */
    public function getOriginalCurrencyCode(): ?mixed
    {
        return $this->originalCurrencyCode;
    }

    /**
     * @param mixed|null $originalCurrencyCode
     */
    public function setOriginalCurrencyCode(?mixed $originalCurrencyCode): void
    {
        $this->originalCurrencyCode = $originalCurrencyCode;
    }

    /**
     * @return mixed|null
     */
    public function getOriginalSubCategory(): ?mixed
    {
        return $this->originalSubCategory;
    }

    /**
     * @param mixed|null $originalSubCategory
     */
    public function setOriginalSubCategory(?mixed $originalSubCategory): void
    {
        $this->originalSubCategory = $originalSubCategory;
    }

    /**
     * @return mixed|null
     */
    public function getPayee(): ?mixed
    {
        return $this->payee;
    }

    /**
     * @param mixed|null $payee
     */
    public function setPayee(?mixed $payee): void
    {
        $this->payee = $payee;
    }

    /**
     * @return mixed|null
     */
    public function getPossibleDuplicate(): ?mixed
    {
        return $this->possibleDuplicate;
    }

    /**
     * @param mixed|null $possibleDuplicate
     */
    public function setPossibleDuplicate(?mixed $possibleDuplicate): void
    {
        $this->possibleDuplicate = $possibleDuplicate;
    }

    /**
     * @return Carbon|null
     */
    public function getPostingDate(): ?Carbon
    {
        return $this->postingDate;
    }

    /**
     * @param Carbon|null $postingDate
     */
    public function setPostingDate(?Carbon $postingDate): void
    {
        $this->postingDate = $postingDate;
    }

    /**
     * @return Carbon|null
     */
    public function getPostingTime(): ?Carbon
    {
        return $this->postingTime;
    }

    /**
     * @param Carbon|null $postingTime
     */
    public function setPostingTime(?Carbon $postingTime): void
    {
        $this->postingTime = $postingTime;
    }

    /**
     * @return mixed|null
     */
    public function getRecordNumber(): ?mixed
    {
        return $this->recordNumber;
    }

    /**
     * @param mixed|null $recordNumber
     */
    public function setRecordNumber(?mixed $recordNumber): void
    {
        $this->recordNumber = $recordNumber;
    }

    /**
     * @return mixed|null
     */
    public function getTags(): ?mixed
    {
        return $this->tags;
    }

    /**
     * @param mixed|null $tags
     */
    public function setTags(?mixed $tags): void
    {
        $this->tags = $tags;
    }

    /**
     * @return Carbon|null
     */
    public function getTime(): ?Carbon
    {
        return $this->time;
    }

    /**
     * @param Carbon|null $time
     */
    public function setTime(?Carbon $time): void
    {
        $this->time = $time;
    }

    /**
     * @return mixed|null
     */
    public function getType(): ?mixed
    {
        return $this->type;
    }

    /**
     * @param mixed|null $type
     */
    public function setType(?mixed $type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed|null
     */
    public function getUnitPrice(): ?mixed
    {
        return $this->unitPrice;
    }

    /**
     * @param mixed|null $unitPrice
     */
    public function setUnitPrice(?mixed $unitPrice): void
    {
        $this->unitPrice = $unitPrice;
    }

    /**
     * @return mixed|null
     */
    public function getUnits(): ?mixed
    {
        return $this->units;
    }

    /**
     * @param mixed|null $units
     */
    public function setUnits(?mixed $units): void
    {
        $this->units = $units;
    }
}