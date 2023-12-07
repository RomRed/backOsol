<?php

namespace App\Repository;

use App\Entity\TypeConnexion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TypeConnexion>
 *
 * @method TypeConnexion|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeConnexion|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeConnexion[]    findAll()
 * @method TypeConnexion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeConnexionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeConnexion::class);
    }

//    /**
//     * @return TypeConnexion[] Returns an array of TypeConnexion objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TypeConnexion
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
