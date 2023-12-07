<?php

namespace App\Repository;

use App\Entity\Pico;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Pico>
 *
 * @method Pico|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pico|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pico[]    findAll()
 * @method Pico[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PicoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pico::class);
    }

//    /**
//     * @return Pico[] Returns an array of Pico objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Pico
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
