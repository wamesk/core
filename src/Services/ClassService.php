<?php

namespace Wame\Core\Services;

use Composer\ClassMapGenerator\ClassMapGenerator;
use ReflectionClass;
use ReflectionException;

class ClassService
{
    public function findByTrait(
        string $trait,
        ?array $paths = [],
    ): array {
        $classes = [];

        if (empty($paths)) {
            $paths = [app_path()];
        }

        foreach ($paths as $path) {
            foreach (ClassMapGenerator::createMap($path) as $class => $path) {
                try {
                    $rc = new ReflectionClass($class);
                } catch (ReflectionException $e) {
                    continue;
                }

                $classUsesTrait = in_array($trait, $rc->getTraitNames());

                if ($classUsesTrait) {
                    $classes[] = $class;
                }
            }
        }

        return $classes;
    }

    public function convertFromKebabCaseToClassName(string $string): string
    {
        $arr = explode('-', $string);

        $arr = array_map('ucfirst', $arr);

        return join('', $arr);
    }

    /**
     * @throws ReflectionException
     */
    public function getBaseClassName(string $className): string
    {
        $reflection = new ReflectionClass($className);

        return $reflection->getShortName();
    }
}
