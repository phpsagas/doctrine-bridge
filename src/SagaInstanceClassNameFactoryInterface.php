<?php

namespace PhpSagas\DoctrineBridge;

/**
 * Allows to use custom SagaInstance classes.
 * This is helpful for using in common classes required sagaInstance classname (for example, Doctrine
 * ServiceEntityRepository).
 *
 * @author Oleg Filatov <phpsagas@gmail.com>
 */
interface SagaInstanceClassNameFactoryInterface
{
    /**
     * @return string
     */
    public function getSagaInstanceClassName(): string;
}
