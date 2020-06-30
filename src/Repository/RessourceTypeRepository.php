<?php

namespace App\Repository;

use App\Entity\RessourceType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RessourceType|null find($id, $lockMode = null, $lockVersion = null)
 * @method RessourceType|null findOneBy(array $criteria, array $orderBy = null)
 * @method RessourceType[]    findAll()
 * @method RessourceType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RessourceTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RessourceType::class);
    }

    // /**
    //  * @return RessourceType[] Returns an array of RessourceType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RessourceType
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
