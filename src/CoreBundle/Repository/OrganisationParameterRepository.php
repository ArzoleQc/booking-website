<?php

namespace CoreBundle\Repository;

use CoreBundle\Entity\OrganisationParameter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OrganisationParameter|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrganisationParameter|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrganisationParameter[]    findAll()
 * @method OrganisationParameter[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrganisationParameterRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OrganisationParameter::class);
    }

    // /**
    //  * @return OrganisationParameter[] Returns an array of OrganisationParameter objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OrganisationParameter
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
