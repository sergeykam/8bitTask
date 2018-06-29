<?php
declare(strict_types = 1);

namespace src\megadata\api\locations;

use src\megadata\api\AbstractAPIMethod;
use src\megadata\api\locations\parser\ParserInterface;
use src\megadata\MegaDataException;
use src\Location;
use src\megadata\api\locations\parser\ParserFactory;

class Locations extends AbstractAPIMethod
{
    private const BASE_URL = '8bit.local/megadata_json.php';

    /**
     * @return Location[]
     * @throws MegaDataException
     */
    public function get(): array
    {
        $httpResponse = $this->httpClient->get(self::BASE_URL);

        if (is_null($httpResponse)) {
            throw new MegaDataException('Locations request fail');
        }

        $response = new Response($this->convertHttpResponseToArray($httpResponse));

        if ($response->isValid()) {
            return $response->getLocations();
        }

        throw new MegaDataException(implode(', ', [$response->getErrorCode(), $response->getErrorMsg()]));
    }

    /**
     * @param string $httpResponse
     * @return array
     * @throws MegaDataException
     */
    private function convertHttpResponseToArray(string $httpResponse): array
    {
        $result = ParserFactory::createParser(ParserInterface::FORMAT_JSON)->convertToArray($httpResponse);

        if (is_null($result)) {
            throw new MegaDataException('Locations invalid format');
        }

        return $result;
    }
}