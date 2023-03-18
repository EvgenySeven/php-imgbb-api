<?php

class ImgbbApi {
    
    private $apiKey;

    /**
      * Creates an instance of the ImgbAPI class.
      *
      * @param string $apiKey API key Imgbb.
      *
      */
    public function __construct($apiKey) {
        $this->apiKey = $apiKey;
    }
    
     /**
       * Uploads a file to the Imgbb server and returns the URL of the uploaded file.
       *
       * @param string $imagePath A binary file, base64 data, or a URL for an image. (up to 32 MB)
       * @param string $Expiration Enable this if you want to force uploads to be auto deleted after certain time (in seconds 60-15552000)
       *
       * @return string Uploaded file URL address.
       *
       * @throws Exception if loading failed.
       */
    public function uploadImage($imagePath, $Expiration = 0) {

        //Sending a POST request to the Imgbb server.
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.imgbb.com/1/upload?expiration=" . $Expiration . "&key=" . $this->apiKey,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => array(
                "image" => base64_encode(file_get_contents($imagePath));
            )
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        
        //Getting the result of a file upload.
        if(!$response) {
            throw new Exception('Upload failed');
        }
        
        //Parsing a JSON response.
        $json = json_decode($response, true);
        if(!$json) {
            throw new Exception('Error while parsing server response.');
        }
        if($json['status'] != 200) {
            throw new Exception('File loading error. ('.$json['error']['message'].')');
        }

        //Return the URL of the uploaded file.
        return $json['data']['url'];
    }
}
