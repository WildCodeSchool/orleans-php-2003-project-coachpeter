<?php

namespace App\Repository;

use App\Entity\ProgramStep;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProgramStep|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProgramStep|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProgramStep[]    findAll()
 * @method ProgramStep[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProgramStepRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProgramStep::class);
    }
}
