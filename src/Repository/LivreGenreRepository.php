<?php

namespace App\Repository;

use App\Entity\LivreGenre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<LivreGenre>
 *
 * @method LivreGenre|null find($id, $lockMode = null, $lockVersion = null)
 * @method LivreGenre|null findOneBy(array $criteria, array $orderBy = null)
 * @method LivreGenre[]    findAll()
 * @method LivreGenre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LivreGenreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LivreGenre::class);
    }

//    /**
//     * @return LivreGenre[] Returns an array of LivreGenre objects
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

//    public function findOneBySomeField($value): ?LivreGenre
//    {
//        return $this->createQueryBuilder('l')
//            ->andWhere('l.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
