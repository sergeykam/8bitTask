<?php
declare(strict_types = 1);

namespace src\megadata\api\locations\parser;

interface ParserInterface
{
    public const FORMAT_JSON = 'json';
    public const FORMAT_XML  = 'xml';

    /**
     * @param string $data
     * @return array
     */
    public function convertToArray(string $data): array;
}