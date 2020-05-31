<?php

namespace App\Services\Firefly\Objects\Transaction;

class Transactions
{
    public function __construct(array $array)
    {
        /**
         * "user": 1,
         * "transaction_journal_id": 26,
         * "type": "withdrawal",
         * "date": "2020-05-31T00:00:00+02:00",
         * "order": 0,
         * "currency_id": 1,
         * "currency_code": "EUR",
         * "currency_name": "Euro",
         * "currency_symbol": "€",
         * "currency_decimal_places": 2,
         * "foreign_currency_id": null,
         * "foreign_currency_code": null,
         * "foreign_currency_symbol": null,
         * "foreign_currency_decimal_places": null,
         * "amount": "5.000000000000",
         * "foreign_amount": null,
         * "description": "test",
         * "source_id": 10534,
         * "source_name": "Rekeningcourant",
         * "source_iban": "NL83 ABNA 0618 4193 65",
         * "source_type": "Asset account",
         * "destination_id": 10536,
         * "destination_name": "Cash account",
         * "destination_iban": null,
         * "destination_type": "Cash account",
         * "budget_id": null,
         * "budget_name": null,
         * "category_id": null,
         * "category_name": null,
         * "bill_id": null,
         * "bill_name": null,
         * "reconciled": false,
         * "notes": null,
         * "tags": [],
         * "internal_reference": null,
         * "external_id": null,
         * "original_source": "ff3-v5.2.5|api-v1.1.0",
         * "recurrence_id": null,
         * "bunq_payment_id": null,
         * "import_hash_v2": "818b3f01b835e1e084a4a4c8133acb3975af50629ae73d7b72beb5d0e24597e5",
         * "sepa_cc": null,
         * "sepa_ct_op": null,
         * "sepa_ct_id": null,
         * "sepa_db": null,
         * "sepa_country": null,
         * "sepa_ep": null,
         * "sepa_ci": null,
         * "sepa_batch_id": null,
         * "interest_date": null,
         * "book_date": null,
         * "process_date": null,
         * "due_date": null,
         * "payment_date": null,
         * "invoice_date": null
         */
    }
}