<?php

namespace App\Repository;

use App\Entity\ModeCharge;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ModeCharge>
 *
 * @method ModeCharge|null find($id, $lockMode = null, $lockVersion = null)
 * @method ModeCharge|null findOneBy(array $criteria, array $orderBy = null)
 * @method ModeCharge[]    findAll()
 * @method ModeCharge[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ModeChargeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ModeCharge::class);
    }

//    /**
//     * @return ModeCharge[] Returns an array of ModeCharge objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ModeCharge
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
