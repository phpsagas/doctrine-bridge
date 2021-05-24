<?php

namespace PhpSagas\DoctrineBridge;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Id\UuidGenerator;

/**
 * Generate Saga ID using Doctrine {@link \Doctrine\ORM\Id\UuidGenerator}
 *
 * @author Oleg Filatov <phpsagas@gmail.com>
 */
class DoctrineUuidBasedSagaIdGenerator implements SagaIdGeneratorInterface
{
    /** @var EntityManager */
    private $em;
    /** @var DoctrineUuidBasedSagaIdGenerator */
    private $uuidGenerator;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
        $this->uuidGenerator = new UuidGenerator();
    }

    public function generateId(): string
    {
        return $this->uuidGenerator->generate($this->em, null);
    }
}
