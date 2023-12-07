<?php

namespace App\Repository;

use App\Entity\AcMode;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AcMode>
 *
 * @method AcMode|null find($id, $lockMode = null, $lockVersion = null)
 * @method AcMode|null findOneBy(array $criteria, array $orderBy = null)
 * @method AcMode[]    findAll()
 * @method AcMode[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AcModeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AcMode::class);
    }

//    /**
//     * @return AcMode[] Returns an array of AcMode objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('a.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?AcMode
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
