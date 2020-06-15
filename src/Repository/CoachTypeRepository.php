<?php

namespace App\Repository;

use App\Entity\CoachType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CoachType|null find($id, $lockMode = null, $lockVersion = null)
 * @method CoachType|null findOneBy(array $criteria, array $orderBy = null)
 * @method CoachType[]    findAll()
 * @method CoachType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoachTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CoachType::class);
    }

    // /**
    //  * @return CoachType[] Returns an array of CoachType objects
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
    public function findOneBySomeField($value): ?CoachType
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
