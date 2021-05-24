<?php

namespace PhpSagas\DoctrineBridge;

use PhpSagas\Orchestrator\InstantiationEngine\DefaultSagaInstance;

/**
 * @author Oleg Filatov <phpsagas@gmail.com>
 */
class DefaultSagaInstanceClassNameFactory implements SagaInstanceClassNameFactoryInterface
{
    /**
     * @return string
     */
    public function getSagaInstanceClassName(): string
    {
        return DefaultSagaInstance::class;
    }
}
