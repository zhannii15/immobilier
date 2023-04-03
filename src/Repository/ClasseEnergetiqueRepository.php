<?php

namespace App\Repository;

use App\Entity\ClasseEnergetique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ClasseEnergetique>
 *
 * @method ClasseEnergetique|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClasseEnergetique|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClasseEnergetique[]    findAll()
 * @method ClasseEnergetique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClasseEnergetiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClasseEnergetique::class);
    }

    public function save(ClasseEnergetique $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ClasseEnergetique $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return ClasseEnergetique[] Returns an array of ClasseEnergetique objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ClasseEnergetique
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
