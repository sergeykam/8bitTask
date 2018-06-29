<?php
declare(strict_types = 1);

namespace src\megadata\api\locations\parser;

class JsonParser implements ParserInterface
{
    public function convertToArray(string $data): array
    {
        return json_decode($data, true);
    }
}