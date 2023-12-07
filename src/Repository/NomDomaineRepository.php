<?php

namespace App\Repository;

use App\Entity\NomDomaine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<NomDomaine>
 *
 * @method NomDomaine|null find($id, $lockMode = null, $lockVersion = null)
 * @method NomDomaine|null findOneBy(array $criteria, array $orderBy = null)
 * @method NomDomaine[]    findAll()
 * @method NomDomaine[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NomDomaineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, NomDomaine::class);
    }

//    /**
//     * @return NomDomaine[] Returns an array of NomDomaine objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('n.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?NomDomaine
//    {
//        return $this->createQueryBuilder('n')
//            ->andWhere('n.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
