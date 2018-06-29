<?php
declare(strict_types = 1);

namespace src\megadata\api\locations\parser;

use src\megadata\MegaDataException;

class ParserFactory
{
    /**
     * @param string $format
     * @return ParserInterface
     * @throws MegaDataException
     */
    public static function createParser(string $format): ParserInterface
    {
        switch ($format)
        {
            case ParserInterface::FORMAT_JSON:
                return new JsonParser();
            case ParserInterface::FORMAT_XML:
                return new XmlParser();
            default:
                throw new MegaDataException('Unknown format');
        }
    }
}