<?php

namespace App\Services;

use App\Kernel\Database\IDatabase;

class CategoryService
{

    public function __construct(
        private IDatabase $db
    ) {
    }

    public function insert(string $title, ?string $desc)
    {
        $this->db->insert('categories', [
            'title' => $title,
            'description' => $desc
        ]);
    }

    
}
