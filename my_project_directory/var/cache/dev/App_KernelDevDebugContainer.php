<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerUZ4dhMl\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerUZ4dhMl/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerUZ4dhMl.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerUZ4dhMl\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerUZ4dhMl\App_KernelDevDebugContainer([
    'container.build_hash' => 'UZ4dhMl',
    'container.build_id' => '3209d1b5',
    'container.build_time' => 1737503734,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerUZ4dhMl');
