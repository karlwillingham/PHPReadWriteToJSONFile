<?php

/**
* Class decodes json file as php Array
* and encodes php array and writes to json file
**/
class JsonReadWrite
{
    private $file_name;

    public function __construct($file_name)
    {
        $this->file_name = $file_name;
    }

    /**
     * @param string $file_name
     */
    public function setFileName($file_name)
    {
        $this->file_name = $file_name;
    }

    /**
     * @return string
     */
    public function getFileName()
    {
        return $this->file_name;
    }

     /**
      * @return array
      */
     public function getFileContent()
     {
         $file_content = file_get_contents($this->file_name);

         try {
             // No File
             if ($file_content === false) {
                 return [];
             }

             // Decode Not Empty File
             $json_content = json_decode($file_content, true);

             if ($json_content === null && json_last_error() !== JSON_ERROR_NONE) {
                 throw new Exception('Invalid JSON File Format');
             }

             // Valid Data or empty
             return ($json_content === null) ? [] : $json_content;
         } catch (Exception $ex) {
             echo static::exceptionCaught($ex);
         }
     }

    /**
     * Update File with a new Data Array
     * This will remove all content in File and replace.
     *
     * @param array $data_array
     */
    public function replaceFileContent($data_array)
    {
        try {
            if ((array) $data_array !== $data_array) {
                throw new Exception('Invalid data_array');
            }

            // Append to File
            file_put_contents($this->file_name, json_encode($data_array));

        } catch (Exception $ex) {
            echo static::exceptionCaught($ex);
        }
    }

    /**
     * Replace File Content with Empty Data
     */
    public function clearFileContent()
    {
        $empty = [];
        file_put_contents($this->file_name, json_encode($empty));
    }

    private static function exceptionCaught(Exception $ex)
    {
        return "Caught exception: {$ex->getMessage()}\n";
    }
}
