<?php

namespace App\Clients;

use App\Exceptions\InvalidRequestException;
use App\Interfaces\ApiInterface;

abstract class ApiClient implements ApiInterface
{

    /**
     * Performs a GET request using cURL and returns the response as an associative array.
     *
     * @param string $url The URL to send the request to.
     * @return array An associative array containing the response data.
     * @throws InvalidRequestException If the cURL request fails.
     */
    public function get(string $url): array
    {
        // Initiate curl
        $curl = curl_init();

        // Set options
        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_URL => $url
        ]);

        // Execute the cURL request and get the response
        $response = curl_exec($curl);
        
        // Check for errors
        if ($response === false) {
            $error = curl_error($curl);
            curl_close($curl);
            throw new InvalidRequestException("cURL request failed: $error");
        }

        // Close the cURL session
        curl_close($curl);

        // Convert the response from JSON to an associative PHP array
        $data = json_decode($response, true);

        return $data;
    }
}