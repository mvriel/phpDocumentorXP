<?php

namespace phpDocumentor\Api\Php\Elements;

use phpDocumentor\Api\Fqsen;
use phpDocumentor\Api\Php\Traits;
use phpDocumentor\Api\Php\Visibility;

final class Method extends BaseElement
{
    use Traits\IsDocumented;
    use Traits\HasVisibility;
    use Traits\CanBeStatic;

    public function __construct(Fqsen $fqsen, Visibility $visibility = null, $isStatic = false)
    {
        parent::__construct($fqsen);

        $this->visibility = $visibility ?: new Visibility(Visibility::ENUM_PUBLIC);
        $this->setIsStatic($isStatic);
    }
}
