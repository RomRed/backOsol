<?php

namespace App\Repository;

use App\Entity\BadgeAlgo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BadgeAlgo>
 *
 * @method BadgeAlgo|null find($id, $lockMode = null, $lockVersion = null)
 * @method BadgeAlgo|null findOneBy(array $criteria, array $orderBy = null)
 * @method BadgeAlgo[]    findAll()
 * @method BadgeAlgo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BadgeAlgoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BadgeAlgo::class);
    }

//    /**
//     * @return BadgeAlgo[] Returns an array of BadgeAlgo objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('b.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?BadgeAlgo
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
