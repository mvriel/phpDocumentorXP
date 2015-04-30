<?php

namespace phpDocumentor\Api\Php;

final class Visibility
{
    const ENUM_PUBLIC    = 'public';
    const ENUM_PROTECTED = 'protected';
    const ENUM_PRIVATE   = 'private';

    private $visibility;

    public function __construct($visibility)
    {
        $visibility = $this->normalizeValue($visibility);
        $this->checkIfProvidedValueIsInRange($visibility);

        $this->visibility = $visibility;
    }

    public function __toString()
    {
        return $this->visibility;
    }

    /**
     * @param $visibility
     */
    private function checkIfProvidedValueIsInRange($visibility)
    {
        if ($visibility !== self::ENUM_PUBLIC
            && $visibility !== self::ENUM_PROTECTED
            && $visibility !== self::ENUM_PRIVATE
        ) {
            throw new \InvalidArgumentException(
                sprintf(
                    'Invalid element visibility provided, expected either %s, %s or %s but received "%s"',
                    self::ENUM_PUBLIC,
                    self::ENUM_PROTECTED,
                    self::ENUM_PRIVATE,
                    $visibility
                )
            );
        }
    }

    /**
     * @param $visibility
     * @return string
     */
    private function normalizeValue($visibility)
    {
        return strtolower($visibility);
    }
}
