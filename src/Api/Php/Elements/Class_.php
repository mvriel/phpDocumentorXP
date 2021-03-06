<?php

namespace phpDocumentor\Api\Php\Elements;

use phpDocumentor\Api\Php\Traits;

final class Class_ extends BaseElement
{
    use Traits\HasMethods;
    use Traits\HasProperties;
    use Traits\HasClassConstants;
    use Traits\IsDocumented;
}
