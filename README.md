# php-imgbb-api
Integration class with api.imgbb.com project API in PHP language
```php
include 'ImgbbApi.php';
$imgbb = new ImgbbApi("YOUR_API_KEY");
```
```php
$imageData = file_get_contents("path/to/image.jpg");
$response = $imgbb->uploadImage($imageData);
$responseData = json_decode($response, true);
```
```php
$imageId = $responseData["data"]["id"];
$image = $imgbb->getImage($imageId);
$imageData = json_decode($image, true);
$imageUrl = $imageData["data"]["url"];
```
