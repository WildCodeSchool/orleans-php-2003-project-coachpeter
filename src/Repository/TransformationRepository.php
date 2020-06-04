<?php

namespace App\Repository;

use App\Entity\Transformation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Transformation|null find($id, $lockMode = null, $lockVersion = null)
 * @method Transformation|null findOneBy(array $criteria, array $orderBy = null)
 * @method Transformation[]    findAll()
 * @method Transformation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TransformationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Transformation::class);
    }
}
