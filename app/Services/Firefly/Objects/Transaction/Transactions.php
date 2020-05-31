<?php

namespace App\Services\Firefly\Objects\Transaction;

use Illuminate\Support\Carbon;

class Transactions
{
    private $user;
    private $transactionJournalId;
    private $type;
    private $date;
    private $order;
    private $currencyId;
    private $currencyCode;
    private $currencyMame;
    private $currencySymbol;
    private $currencyDecimalPlaces;
    private $foreignCurrencyId;
    private $foreignCurrencyCode;
    private $foreignCurrencySymbol;
    private $foreignCurrencyDecimalPlaces;
    private $amount;
    private $foreignAmount;
    private $description;
    private $sourceId;
    private $sourceName;
    private $sourceIban;
    private $sourceType;
    private $destinationId;
    private $destinationName;
    private $destinationIban;
    private $destinationType;
    private $budgetId;
    private $budgetName;
    private $categoryId;
    private $categoryName;
    private $billId;
    private $billName;
    private $reconciled;
    private $notes;
    private $tags;
    private $internalReference;
    private $externalId;
    private $originalSource;
    private $recurrenceId;
    private $bunqPaymentId;
    private $importHashV2;
    private $sepaCc;
    private $sepaCtOp;
    private $sepaCtId;
    private $sepaDb;
    private $sepaCountry;
    private $sepaEp;
    private $sepaCi;
    private $sepaBatchId;
    private $interestDate;
    private $bookDate;
    private $processDate;
    private $dueDate;
    private $paymentDate;
    private $invoiceDate;

    public function __construct(array $array)
    {
        $array = $array[0];
        $this->user = $array['user'];
        $this->transactionJournalId = $array['transaction_journal_id'];
        $this->type = $array['type'];
        $this->date = new Carbon($array['date']);
        $this->order = $array['order'];
        $this->currencyId = $array['currency_id'];
        $this->currencyCode = $array['currency_code'];
        $this->currencyMame = $array['currency_name'];
        $this->currencySymbol = $array['currency_symbol'];
        $this->currencyDecimalPlaces = $array['currency_decimal_places'];
        $this->foreignCurrencyId = $array['foreign_currency_id'];
        $this->foreignCurrencyCode = $array['foreign_currency_code'];
        $this->foreignCurrencySymbol = $array['foreign_currency_symbol'];
        $this->foreignCurrencyDecimalPlaces = $array['foreign_currency_decimal_places'];
        $this->amount = $array['amount'];
        $this->foreignAmount = $array['foreign_amount'];
        $this->description = $array['description'];
        $this->sourceId = $array['source_id'];
        $this->sourceName = $array['source_name'];
        $this->sourceIban = $array['source_iban'];
        $this->sourceType = $array['source_type'];
        $this->destinationId = $array['destination_id'];
        $this->destinationName = $array['destination_name'];
        $this->destinationIban = $array['destination_iban'];
        $this->destinationType = $array['destination_type'];
        $this->budgetId = $array['budget_id'];
        $this->budgetName = $array['budget_name'];
        $this->categoryId = $array['category_id'];
        $this->categoryName = $array['category_name'];
        $this->billId = $array['bill_id'];
        $this->billName = $array['bill_name'];
        $this->reconciled = $array['reconciled'];
        $this->notes = $array['notes'];
        $this->tags = $array['tags'];
        $this->internalReference = $array['internal_reference'];
        $this->externalId = $array['external_id'];
        $this->originalSource = $array['original_source'];
        $this->recurrenceId = $array['recurrence_id'];
        $this->bunqPaymentId = $array['bunq_payment_id'];
        $this->importHashV2 = $array['import_hash_v2'];
        $this->sepaCc = $array['sepa_cc'];
        $this->sepaCtOp = $array['sepa_ct_op'];
        $this->sepaCtId = $array['sepa_ct_id'];
        $this->sepaDb = $array['sepa_db'];
        $this->sepaCountry = $array['sepa_country'];
        $this->sepaEp = $array['sepa_ep'];
        $this->sepaCi = $array['sepa_ci'];
        $this->sepaBatchId = $array['sepa_batch_id'];
        $this->interestDate = $array['interest_date'];
        $this->bookDate = $array['book_date'];
        $this->processDate = $array['process_date'];
        $this->dueDate = $array['due_date'];
        $this->paymentDate = $array['payment_date'];
        $this->invoiceDate = $array['invoice_date'];
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getTransactionJournalId()
    {
        return $this->transactionJournalId;
    }

    /**
     * @param mixed $transactionJournalId
     */
    public function setTransactionJournalId($transactionJournalId): void
    {
        $this->transactionJournalId = $transactionJournalId;
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
     * @return Carbon
     */
    public function getDate(): Carbon
    {
        return $this->date;
    }

    /**
     * @param Carbon $date
     */
    public function setDate(Carbon $date): void
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param mixed $order
     */
    public function setOrder($order): void
    {
        $this->order = $order;
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
    public function getCurrencyMame()
    {
        return $this->currencyMame;
    }

    /**
     * @param mixed $currencyMame
     */
    public function setCurrencyMame($currencyMame): void
    {
        $this->currencyMame = $currencyMame;
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
    public function getForeignCurrencyId()
    {
        return $this->foreignCurrencyId;
    }

    /**
     * @param mixed $foreignCurrencyId
     */
    public function setForeignCurrencyId($foreignCurrencyId): void
    {
        $this->foreignCurrencyId = $foreignCurrencyId;
    }

    /**
     * @return mixed
     */
    public function getForeignCurrencyCode()
    {
        return $this->foreignCurrencyCode;
    }

    /**
     * @param mixed $foreignCurrencyCode
     */
    public function setForeignCurrencyCode($foreignCurrencyCode): void
    {
        $this->foreignCurrencyCode = $foreignCurrencyCode;
    }

    /**
     * @return mixed
     */
    public function getForeignCurrencySymbol()
    {
        return $this->foreignCurrencySymbol;
    }

    /**
     * @param mixed $foreignCurrencySymbol
     */
    public function setForeignCurrencySymbol($foreignCurrencySymbol): void
    {
        $this->foreignCurrencySymbol = $foreignCurrencySymbol;
    }

    /**
     * @return mixed
     */
    public function getForeignCurrencyDecimalPlaces()
    {
        return $this->foreignCurrencyDecimalPlaces;
    }

    /**
     * @param mixed $foreignCurrencyDecimalPlaces
     */
    public function setForeignCurrencyDecimalPlaces($foreignCurrencyDecimalPlaces): void
    {
        $this->foreignCurrencyDecimalPlaces = $foreignCurrencyDecimalPlaces;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount): void
    {
        $this->amount = $amount;
    }

    /**
     * @return mixed
     */
    public function getForeignAmount()
    {
        return $this->foreignAmount;
    }

    /**
     * @param mixed $foreignAmount
     */
    public function setForeignAmount($foreignAmount): void
    {
        $this->foreignAmount = $foreignAmount;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getSourceId()
    {
        return $this->sourceId;
    }

    /**
     * @param mixed $sourceId
     */
    public function setSourceId($sourceId): void
    {
        $this->sourceId = $sourceId;
    }

    /**
     * @return mixed
     */
    public function getSourceName()
    {
        return $this->sourceName;
    }

    /**
     * @param mixed $sourceName
     */
    public function setSourceName($sourceName): void
    {
        $this->sourceName = $sourceName;
    }

    /**
     * @return mixed
     */
    public function getSourceIban()
    {
        return $this->sourceIban;
    }

    /**
     * @param mixed $sourceIban
     */
    public function setSourceIban($sourceIban): void
    {
        $this->sourceIban = $sourceIban;
    }

    /**
     * @return mixed
     */
    public function getSourceType()
    {
        return $this->sourceType;
    }

    /**
     * @param mixed $sourceType
     */
    public function setSourceType($sourceType): void
    {
        $this->sourceType = $sourceType;
    }

    /**
     * @return mixed
     */
    public function getDestinationId()
    {
        return $this->destinationId;
    }

    /**
     * @param mixed $destinationId
     */
    public function setDestinationId($destinationId): void
    {
        $this->destinationId = $destinationId;
    }

    /**
     * @return mixed
     */
    public function getDestinationName()
    {
        return $this->destinationName;
    }

    /**
     * @param mixed $destinationName
     */
    public function setDestinationName($destinationName): void
    {
        $this->destinationName = $destinationName;
    }

    /**
     * @return mixed
     */
    public function getDestinationIban()
    {
        return $this->destinationIban;
    }

    /**
     * @param mixed $destinationIban
     */
    public function setDestinationIban($destinationIban): void
    {
        $this->destinationIban = $destinationIban;
    }

    /**
     * @return mixed
     */
    public function getDestinationType()
    {
        return $this->destinationType;
    }

    /**
     * @param mixed $destinationType
     */
    public function setDestinationType($destinationType): void
    {
        $this->destinationType = $destinationType;
    }

    /**
     * @return mixed
     */
    public function getBudgetId()
    {
        return $this->budgetId;
    }

    /**
     * @param mixed $budgetId
     */
    public function setBudgetId($budgetId): void
    {
        $this->budgetId = $budgetId;
    }

    /**
     * @return mixed
     */
    public function getBudgetName()
    {
        return $this->budgetName;
    }

    /**
     * @param mixed $budgetName
     */
    public function setBudgetName($budgetName): void
    {
        $this->budgetName = $budgetName;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param mixed $categoryId
     */
    public function setCategoryId($categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @return mixed
     */
    public function getCategoryName()
    {
        return $this->categoryName;
    }

    /**
     * @param mixed $categoryName
     */
    public function setCategoryName($categoryName): void
    {
        $this->categoryName = $categoryName;
    }

    /**
     * @return mixed
     */
    public function getBillId()
    {
        return $this->billId;
    }

    /**
     * @param mixed $billId
     */
    public function setBillId($billId): void
    {
        $this->billId = $billId;
    }

    /**
     * @return mixed
     */
    public function getBillName()
    {
        return $this->billName;
    }

    /**
     * @param mixed $billName
     */
    public function setBillName($billName): void
    {
        $this->billName = $billName;
    }

    /**
     * @return mixed
     */
    public function getReconciled()
    {
        return $this->reconciled;
    }

    /**
     * @param mixed $reconciled
     */
    public function setReconciled($reconciled): void
    {
        $this->reconciled = $reconciled;
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
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param mixed $tags
     */
    public function setTags($tags): void
    {
        $this->tags = $tags;
    }

    /**
     * @return mixed
     */
    public function getInternalReference()
    {
        return $this->internalReference;
    }

    /**
     * @param mixed $internalReference
     */
    public function setInternalReference($internalReference): void
    {
        $this->internalReference = $internalReference;
    }

    /**
     * @return mixed
     */
    public function getExternalId()
    {
        return $this->externalId;
    }

    /**
     * @param mixed $externalId
     */
    public function setExternalId($externalId): void
    {
        $this->externalId = $externalId;
    }

    /**
     * @return mixed
     */
    public function getOriginalSource()
    {
        return $this->originalSource;
    }

    /**
     * @param mixed $originalSource
     */
    public function setOriginalSource($originalSource): void
    {
        $this->originalSource = $originalSource;
    }

    /**
     * @return mixed
     */
    public function getRecurrenceId()
    {
        return $this->recurrenceId;
    }

    /**
     * @param mixed $recurrenceId
     */
    public function setRecurrenceId($recurrenceId): void
    {
        $this->recurrenceId = $recurrenceId;
    }

    /**
     * @return mixed
     */
    public function getBunqPaymentId()
    {
        return $this->bunqPaymentId;
    }

    /**
     * @param mixed $bunqPaymentId
     */
    public function setBunqPaymentId($bunqPaymentId): void
    {
        $this->bunqPaymentId = $bunqPaymentId;
    }

    /**
     * @return mixed
     */
    public function getImportHashV2()
    {
        return $this->importHashV2;
    }

    /**
     * @param mixed $importHashV2
     */
    public function setImportHashV2($importHashV2): void
    {
        $this->importHashV2 = $importHashV2;
    }

    /**
     * @return mixed
     */
    public function getSepaCc()
    {
        return $this->sepaCc;
    }

    /**
     * @param mixed $sepaCc
     */
    public function setSepaCc($sepaCc): void
    {
        $this->sepaCc = $sepaCc;
    }

    /**
     * @return mixed
     */
    public function getSepaCtOp()
    {
        return $this->sepaCtOp;
    }

    /**
     * @param mixed $sepaCtOp
     */
    public function setSepaCtOp($sepaCtOp): void
    {
        $this->sepaCtOp = $sepaCtOp;
    }

    /**
     * @return mixed
     */
    public function getSepaCtId()
    {
        return $this->sepaCtId;
    }

    /**
     * @param mixed $sepaCtId
     */
    public function setSepaCtId($sepaCtId): void
    {
        $this->sepaCtId = $sepaCtId;
    }

    /**
     * @return mixed
     */
    public function getSepaDb()
    {
        return $this->sepaDb;
    }

    /**
     * @param mixed $sepaDb
     */
    public function setSepaDb($sepaDb): void
    {
        $this->sepaDb = $sepaDb;
    }

    /**
     * @return mixed
     */
    public function getSepaCountry()
    {
        return $this->sepaCountry;
    }

    /**
     * @param mixed $sepaCountry
     */
    public function setSepaCountry($sepaCountry): void
    {
        $this->sepaCountry = $sepaCountry;
    }

    /**
     * @return mixed
     */
    public function getSepaEp()
    {
        return $this->sepaEp;
    }

    /**
     * @param mixed $sepaEp
     */
    public function setSepaEp($sepaEp): void
    {
        $this->sepaEp = $sepaEp;
    }

    /**
     * @return mixed
     */
    public function getSepaCi()
    {
        return $this->sepaCi;
    }

    /**
     * @param mixed $sepaCi
     */
    public function setSepaCi($sepaCi): void
    {
        $this->sepaCi = $sepaCi;
    }

    /**
     * @return mixed
     */
    public function getSepaBatchId()
    {
        return $this->sepaBatchId;
    }

    /**
     * @param mixed $sepaBatchId
     */
    public function setSepaBatchId($sepaBatchId): void
    {
        $this->sepaBatchId = $sepaBatchId;
    }

    /**
     * @return mixed
     */
    public function getInterestDate()
    {
        return $this->interestDate;
    }

    /**
     * @param mixed $interestDate
     */
    public function setInterestDate($interestDate): void
    {
        $this->interestDate = $interestDate;
    }

    /**
     * @return mixed
     */
    public function getBookDate()
    {
        return $this->bookDate;
    }

    /**
     * @param mixed $bookDate
     */
    public function setBookDate($bookDate): void
    {
        $this->bookDate = $bookDate;
    }

    /**
     * @return mixed
     */
    public function getProcessDate()
    {
        return $this->processDate;
    }

    /**
     * @param mixed $processDate
     */
    public function setProcessDate($processDate): void
    {
        $this->processDate = $processDate;
    }

    /**
     * @return mixed
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * @param mixed $dueDate
     */
    public function setDueDate($dueDate): void
    {
        $this->dueDate = $dueDate;
    }

    /**
     * @return mixed
     */
    public function getPaymentDate()
    {
        return $this->paymentDate;
    }

    /**
     * @param mixed $paymentDate
     */
    public function setPaymentDate($paymentDate): void
    {
        $this->paymentDate = $paymentDate;
    }

    /**
     * @return mixed
     */
    public function getInvoiceDate()
    {
        return $this->invoiceDate;
    }

    /**
     * @param mixed $invoiceDate
     */
    public function setInvoiceDate($invoiceDate): void
    {
        $this->invoiceDate = $invoiceDate;
    }
}