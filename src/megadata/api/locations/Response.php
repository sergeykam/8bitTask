<?php
declare(strict_types = 1);

namespace src\megadata\api\locations;

use src\Coordinate;
use src\Location;

class Response
{
    /**
     * @var array
     */
    private $rawResponse;

    /**
     * @var bool
     */
    private $status;

    public function __construct(array $response)
    {
        $this->rawResponse = $response;
        $this->status = $response['success'] ?? false;
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->status === true
            && isset($this->rawResponse['data']['locations'])
            && is_array($this->rawResponse['data']['locations']);
    }

    /**
     * @return Location[]
     */
    public function getLocations(): array
    {
        $res = [];

        foreach ($this->rawResponse['data']['locations'] as $location) {
            if ($this->isValidLocationData($location)) {
                $res[] = new Location(
                    $location['name'],
                    new Coordinate($location['coordinates']['lat'], $location['coordinates']['long'])
                );
            }
        }

        return $res;
    }

    /**
     * @param array $location
     * @return bool
     */
    private function isValidLocationData(array $location): bool
    {
        return isset($location['name'])
            && is_string($location['name'])
            && isset($location['coordinates'])
            && $this->isValidCoordinatesData($location['coordinates']);
    }

    /**
     * @param array $coordinate
     * @return bool
     */
    private function isValidCoordinatesData(array $coordinate): bool
    {
        return isset($coordinate['lat']) && is_float($coordinate['lat'])
            && isset($coordinate['long']) && is_float($coordinate['long']);
    }

    /**
     * @return string
     */
    public function getErrorCode(): string
    {
        return $this->rawResponse['data']['code'] ?? '';
    }

    /**
     * @return string
     */
    public function getErrorMsg(): string
    {
        return $this->rawResponse['data']['message'] ?? '';
    }
}