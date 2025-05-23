<?php

namespace App\Repositories;

use App\Models\Spending;
use Exception;

class SpendingRepository
{
    public function getValidationRules(): array
    {
        return [
            'tag_id' => 'nullable|exists:tags,id', // TODO CHECK IF TAG BELONGS TO USER
            'date' => 'required|date|date_format:Y-m-d',
            'description' => 'required|max:255',
            'currency_id' => 'nullable|exists:currencies,id',
            'amount' => 'required|regex:/^\d*(\.\d{2})?$/',
            'emotion' => 'nullable|numeric|min:1|max:5',
        ];
    }

    public function create(
        int $spaceId,
        ?int $recurringId,
        ?int $tagId,
        string $date,
        string $description,
        int $emotion,
        int $amount,
        ?int $importId = null
    ): Spending {
        return Spending::create([
            'space_id' => $spaceId,
            'import_id' => $importId,
            'recurring_id' => $recurringId,
            'tag_id' => $tagId,
            'happened_on' => $date,
            'description' => $description,
            'emotion' => $emotion,
            'amount' => $amount,
        ]);
    }

    public function update(int $spendingId, array $data): void
    {
        $spending = Spending::find($spendingId);

        if (!$spending) {
            throw new Exception('Could not find spending with ID ' . $spendingId);
        }

        $spending->fill($data)->save();
    }
}
