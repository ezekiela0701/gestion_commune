<?php

namespace App\Repository;

use App\Entity\Identite;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Identite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Identite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Identite[]    findAll()
 * @method Identite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IdentiteRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Identite::class);
    }

    /**
     * @return Identite[] Returns an array of Identite objects
     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Identite
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findDate($id): array
    {
        return $this->createQueryBuilder('i')
        ->where('i.id = :id')
        ->setParameter('id' , $id)
        ->getQuery()
        ->getResult();
    }

    // public function findDate($id)
    // {
    //     $entityManager=$this->getEntityManager();
    //     $query=$entityManager->createQuery(
    //         'SELECT DateNaissance
    //         FROM App\Entity\Identite DateNaissance'
    //     )->setParameter('id' , $id);

    //     return $query->getResult();
    // }

}
