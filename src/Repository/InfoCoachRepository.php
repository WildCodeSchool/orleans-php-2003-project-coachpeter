<?php

namespace App\Repository;

use App\Entity\InfoCoach;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InfoCoach|null find($id, $lockMode = null, $lockVersion = null)
 * @method InfoCoach|null findOneBy(array $criteria, array $orderBy = null)
 * @method InfoCoach[]    findAll()
 * @method InfoCoach[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InfoCoachRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InfoCoach::class);
    }
}
