<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\Eloquents\PlimaInterface;
use App\Models\P5;

class PlimaRepository implements PlimaInterface
{
    public function find($id)
    {
        return P5::findOrFail($id);
    }

    public function getAll(int $perPage)
    {
        $query = P5::query();

        if ($perPage) {
            return $query->paginate($perPage);
        }

        return $query->get();
    }

    public function create(array $data)
    {
        return P5::create($data);
    }

    public function update($id, array $data)
    {
        $plima = P5::findOrFail($id);
        $plima->update($data);
        return $plima;
    }

    public function delete($id)
    {
        $classmeet = P5::findOrFail($id);
        $classmeet->delete();
    }
}
