<?php

class JsonReader
{
    private readonly mixed $file;


    /**
     * @param  mixed  $file
     */
    public function setFile(mixed $file): void
    {
        $this->file = $file;
    }

    /**
     * @return mixed
     */
    public function getFile(): mixed
    {
        return $this->file;
    }

    public function parse(bool $asArray = false)
    {
        try {
            $data = json_decode($this->file, $asArray);
        } catch (Throwable $e) {
            return [];
        }

        return json_last_error() === JSON_ERROR_NONE ? $data : [];
    }

    public function encode(array $data) {
        return json_encode($data);
    }
    
    

}
