<?php

namespace CoreBundle\Repository;

use CoreBundle\Entity\UserOrganisationInfo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserOrganisationInfo|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserOrganisationInfo|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserOrganisationInfo[]    findAll()
 * @method UserOrganisationInfo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserOrganisationInfoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserOrganisationInfo::class);
    }

    // /**
    //  * @return UserOrganisationInfo[] Returns an array of UserOrganisationInfo objects
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
    public function findOneBySomeField($value): ?UserOrganisationInfo
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
