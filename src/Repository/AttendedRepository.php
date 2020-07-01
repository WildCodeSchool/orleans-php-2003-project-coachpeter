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
}
