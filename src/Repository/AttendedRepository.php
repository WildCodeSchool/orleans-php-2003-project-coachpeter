<?php

namespace App\Repository;

use App\Entity\Attended;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Attended|null find($id, $lockMode = null, $lockVersion = null)
 * @method Attended|null findOneBy(array $criteria, array $orderBy = null)
 * @method Attended[]    findAll()
 * @method Attended[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AttendedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Attended::class);
    }

    // /**
    //  * @return Attended[] Returns an array of Attended objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Attended
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
