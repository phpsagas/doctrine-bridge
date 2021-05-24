<?php

namespace PhpSagas\DoctrineBridge;

/**
 * Interface for Saga ID generators.
 *
 * @author Oleg Filatov <phpsagas@gmail.com>
 */
interface SagaIdGeneratorInterface
{
    /**
     * @return string
     */
    public function generateId(): string;
}
