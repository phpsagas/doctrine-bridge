<?php

namespace PhpSagas\DoctrineBridge;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityNotFoundException;
use Doctrine\ORM\EntityRepository;
use PhpSagas\Orchestrator\ExecutionEngine\SagaInstanceRepositoryInterface;
use PhpSagas\Orchestrator\InstantiationEngine\SagaInstanceInterface;

/**
 * Allows to work with Saga instance repository using Doctrine.
 *
 * @author Oleg Filatov <phpsagas@gmail.com>
 */
class DoctrineBasedSagaInstanceRepository extends EntityRepository implements SagaInstanceRepositoryInterface
{
    /** @var SagaIdGeneratorInterface */
    private $idGenerator;

    public function __construct(
        EntityManagerInterface $entityManager,
        SagaInstanceClassNameFactoryInterface $classNameFactory,
        SagaIdGeneratorInterface $idGenerator
    ) {
        $entityClass = $classNameFactory->getSagaInstanceClassName();
        parent::__construct($entityManager, $entityManager->getClassMetadata($entityClass));
        $this->idGenerator = $idGenerator;
    }

    /**
     * @param SagaInstanceInterface $validSagaInstance
     *
     * @return string
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function saveSaga(SagaInstanceInterface $validSagaInstance): string
    {
        if ($validSagaInstance->getSagaId()) {
            $this->_em->flush();
        } else {
            $validSagaInstance->setSagaId($this->idGenerator->generateId());
            $this->_em->persist($validSagaInstance);
            $this->_em->flush();
        }

        return $validSagaInstance->getSagaId();
    }

    /**
     * @param string $sagaId
     *
     * @return SagaInstanceInterface
     * @throws EntityNotFoundException
     */
    public function findSaga(string $sagaId): SagaInstanceInterface
    {
        /** @var SagaInstanceInterface|null $sagaInstance */
        $sagaInstance = $this->find($sagaId);

        if (\is_null($sagaInstance)) {
            throw new EntityNotFoundException(sprintf('Saga instance not found. ID: %s', $sagaId));
        }

        return $sagaInstance;
    }
}
