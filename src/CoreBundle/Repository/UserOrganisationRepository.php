<?php

namespace CoreBundle\Repository;

use CoreBundle\Entity\UserOrganisation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserOrganisation|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserOrganisation|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserOrganisation[]    findAll()
 * @method UserOrganisation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserOrganisationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserOrganisation::class);
    }

    // /**
    //  * @return UserOrganisation[] Returns an array of UserOrganisation objects
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
    public function findOneBySomeField($value): ?UserOrganisation
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
