<?php

namespace App\Imports;

use App\Models\File;
use Maatwebsite\Excel\Concerns\ToModel;

class FileImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new File([
            'customer_id' => $row['Customer Id'],
            'first_name' => $row['First Name'],
            'last_name' => $row['Last Name'],
            'company' => $row['Company'],
            'city' => $row['City'],
            'country' => $row['Country'],
            'phone1' => $row['Phone 1'],
            'phone2' => $row['Phone 2'],
            'email' => $row['Email'],
            'subscription_data' => $row['Subscription Date'],
            'website' => $row['Website'],
        ]);
    }
}
