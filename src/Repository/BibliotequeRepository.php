<?php

namespace App\Repository;

use App\Entity\Biblioteque;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Biblioteque>
 *
 * @method Biblioteque|null find($id, $lockMode = null, $lockVersion = null)
 * @method Biblioteque|null findOneBy(array $criteria, array $orderBy = null)
 * @method Biblioteque[]    findAll()
 * @method Biblioteque[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BibliotequeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Biblioteque::class);
    }

//    /**
//     * @return Biblioteque[] Returns an array of Biblioteque objects
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

//    public function findOneBySomeField($value): ?Biblioteque
//    {
//        return $this->createQueryBuilder('b')
//            ->andWhere('b.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
