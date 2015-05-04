<?php

namespace phpDocumentor;

use League\Flysystem\FilesystemInterface;
use League\Flysystem\PluginInterface;
use Rb\Specification\SpecificationInterface;

class FlyFinder implements PluginInterface
{
    /** @var FilesystemInterface */
    private $filesystem;

    /**
     * Get the method name.
     *
     * @return string
     */
    public function getMethod()
    {
        return 'find';
    }

    /**
     * Set the Filesystem object.
     *
     * @param FilesystemInterface $filesystem
     */
    public function setFilesystem(FilesystemInterface $filesystem)
    {
        $this->filesystem = $filesystem;
    }

    public function handle(SpecificationInterface $specification)
    {
        foreach ($this->yieldFilesInPath($specification, '') as $path) {
            yield $path;
        }
    }

    private function yieldFilesInPath(SpecificationInterface $specification, $path)
    {
        $listContents = $this->filesystem->listContents($path);
        foreach ($listContents as $location) {
            if ($specification->isSatisfiedBy($location)) {
                if ($location['type'] == 'dir') {
                    foreach ($this->yieldFilesInPath($specification, $location['path']) as $returnedLocation) {
                        yield $returnedLocation;
                    }

                    continue;
                }

                yield $location;
            }
        }
    }
}
