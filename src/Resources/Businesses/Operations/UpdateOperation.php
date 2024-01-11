<?php

declare(strict_types=1);

namespace Paddle\SDK\Resources\Businesses\Operations;

use Paddle\SDK\Entities\Shared\Contacts;
use Paddle\SDK\Entities\Shared\CustomData;
use Paddle\SDK\Entities\Shared\Status;
use Paddle\SDK\FiltersUndefined;
use Paddle\SDK\Undefined;

class UpdateOperation implements \JsonSerializable
{
    use FiltersUndefined;

    /**
     * @param array<Contacts> $contacts
     */
    public function __construct(
        public readonly string|Undefined $name = new Undefined(),
        public readonly string|null|Undefined $companyNumber = new Undefined(),
        public readonly string|null|Undefined $taxIdentifier = new Undefined(),
        public readonly array|Undefined $contacts = new Undefined(),
        public readonly CustomData|null|Undefined $customData = new Undefined(),
        public readonly Status|Undefined $status = new Undefined(),
    ) {
    }

    public function jsonSerialize(): array
    {
        return $this->filterUndefined([
            'name' => $this->name,
            'company_number' => $this->companyNumber,
            'tax_identifier' => $this->taxIdentifier,
            'contacts' => $this->contacts,
            'custom_data' => $this->customData,
            'status' => $this->status,
        ]);
    }
}