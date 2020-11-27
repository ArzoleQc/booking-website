<?php

namespace CoreBundle\Repository;

use CoreBundle\Entity\TokenType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TokenType|null find($id, $lockMode = null, $lockVersion = null)
 * @method TokenType|null findOneBy(array $criteria, array $orderBy = null)
 * @method TokenType[]    findAll()
 * @method TokenType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TokenTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TokenType::class);
    }

    // /**
    //  * @return TokenType[] Returns an array of TokenType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TokenType
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
