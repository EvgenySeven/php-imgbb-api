# php-imgbb-api

Integration class with api.imgbb.com project API in PHP language

## Example of usage

The usage example of the class demonstrates how to upload a file to the Imgbb server using the created class instance. After uploading the file, the method returns the URL of the uploaded file. If the upload fails, the method returns an error and stops execution.

### Uploading images

Use the following methods to upload your image to ImgBB:

- Get API key from [ImgBB](https://api.imgbb.com)
- Insert your API key into the example below instead of 'IMGBB_API_KEY' variable.

```php
//Connecting the ImgbbApi.php class file.
include 'ImgbbApi.php';
//Creating an instance of the ImgbAPI class.
$imgbb = new ImgbbApi("YOUR_API_KEY");
```
```php
//Uploading a file to the Imgbb server.
//$image (required) - A binary file, base64 data, or a URL for an image. (up to 32 MB)
//$expiration (optional) - Enable this if you want to force uploads to be auto deleted after certain time (in seconds 60-15552000)
try {
  $url = $imgbb->uploadImage($image, $expiration);
  echo 'The file has been successfully uploaded: '.$url;
}
catch(Exception $e) {
  echo 'File upload error: '.$e->getMessage();
}
```

### Change Log

v1.0.0: Initial release.
