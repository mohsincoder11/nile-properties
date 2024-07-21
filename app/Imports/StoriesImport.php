<?php

namespace App\Imports;

use App\Models\Stories;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class StoriesImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Stories([
            'title' => $row['title'],
            'text' => $row['text'],
            'author' => $row['author'],
            'artist' => $row['artist'],
        ]);
    }
}
// id
// image
// title
// text
// author
// artist
// created_at
// updated_at