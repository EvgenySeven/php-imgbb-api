<?php

class ImgbbApi {
    private $apiKey;

    public function __construct($apiKey) {
        $this->apiKey = $apiKey;
    }

    public function uploadImage($imageData) {
        $url = "https://api.imgbb.com/1/upload?key=" . $this->apiKey;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => array(
                "image" => $imageData
            )
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }

    public function getImage($imageId) {
        $url = "https://api.imgbb.com/1/image/" . $imageId . "?key=" . $this->apiKey;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }
}
