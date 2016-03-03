# PHPReadWriteToJSONFile
PHP Class to read and write to JSON file. Read json file content as array, write to json file using array input, and clear json file.  Simple exception handling for invalid json data, and write array content.


## Example Usage

```php
// Call Class
$jsonFile = new JsonReadWrite('myFile1.json');

// Add new JSON Content
$data = array(array("key" => "val1"));
$jsonFile->replaceFileContent($data);
print_r($jsonFile->getFileContent());

// Add more Data to JSON File
$file_content = $jsonFile->getFileContent();
array_push($file_content, array("key" => "val2"));
$jsonFile->replaceFileContent($file_content);
print_r($jsonFile->getFileContent());

// Clear the JSON File
$jsonFile->clearFileContent();
print_r($jsonFile->getFileContent());
```
