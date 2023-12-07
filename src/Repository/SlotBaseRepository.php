<?php

namespace App\Repository;

use App\Entity\SlotBase;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SlotBase>
 *
 * @method SlotBase|null find($id, $lockMode = null, $lockVersion = null)
 * @method SlotBase|null findOneBy(array $criteria, array $orderBy = null)
 * @method SlotBase[]    findAll()
 * @method SlotBase[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SlotBaseRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SlotBase::class);
    }

//    /**
//     * @return SlotBase[] Returns an array of SlotBase objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?SlotBase
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
