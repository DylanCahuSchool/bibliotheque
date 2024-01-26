<?php

namespace App\Repository;

use App\Entity\LivreAuteur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LivreAuteur>
 *
 * @method LivreAuteur|null find($id, $lockMode = null, $lockVersion = null)
 * @method LivreAuteur|null findOneBy(array $criteria, array $orderBy = null)
 * @method LivreAuteur[]    findAll()
 * @method LivreAuteur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LivreAuteurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LivreAuteur::class);
    }

//    /**
//     * @return LivreAuteur[] Returns an array of LivreAuteur objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('l.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?LivreAuteur
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
