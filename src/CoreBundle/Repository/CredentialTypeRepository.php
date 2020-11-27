<?php

namespace CoreBundle\Repository;

use CoreBundle\Entity\CredentialType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CredentialType|null find($id, $lockMode = null, $lockVersion = null)
 * @method CredentialType|null findOneBy(array $criteria, array $orderBy = null)
 * @method CredentialType[]    findAll()
 * @method CredentialType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CredentialTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CredentialType::class);
    }

    // /**
    //  * @return CredentialType[] Returns an array of CredentialType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CredentialType
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
