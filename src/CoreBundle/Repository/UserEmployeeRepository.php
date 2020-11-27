<?php

namespace CoreBundle\Repository;

use CoreBundle\Entity\UserEmployee;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserEmployee|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserEmployee|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserEmployee[]    findAll()
 * @method UserEmployee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserEmployeeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserEmployee::class);
    }

    // /**
    //  * @return UserEmployee[] Returns an array of UserEmployee objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserEmployee
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
