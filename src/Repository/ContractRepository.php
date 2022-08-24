<?php

namespace App\Repository;

use App\Entity\Contract;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Contract|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contract|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contract[]    findAll()
 * @method Contract[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContractRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Contract::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Contract $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Contract $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function showLastFiveContracts()
    {
        return $this->createQueryBuilder('ctt')
            ->orderBy('ctt.dateEffect', 'DESC')
            ->setMaxResults(5)
            ->getQuery()
            ->getResult();
    }

    public function showInProgressContracts()
    {
        return $this->createQueryBuilder('ctt')
            ->where('ctt.status != 5')
            ->orderBy('ctt.dateEffect', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function showContractFinishSoon()
    {
        return $this->createQueryBuilder('ctt')
            ->where('ctt.status != 5')
            ->orderBy('ctt.dateEffect', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function allContracts()
    {
        return $this->createQueryBuilder('ctt')
            ->orderBy('ctt.status', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function contractName()
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            'SELECT ctt.name
            FROM App\Entity\Contract ctt
            ORDER BY ctt.name ASC'
        );
        return $query->getResult();
    }

    public function searchByName($names = null)
    {

        return $this->createQueryBuilder('ctt')
            ->where('ctt.name = :name')
            ->setParameter('name', $names)
            ->orderBy('ctt.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function searchByCategory($category = null)
    {
        return $this->createQueryBuilder('ctt')
            ->join('ctt.category', "cat")
            ->where('cat.name = :category')
            ->setParameter('category', $category)
            ->orderBy('ctt.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function searchByStatus($status = null)
    {
        return $this->createQueryBuilder('ctt')
            ->join('ctt.status', "s")
            ->where('s.name = :status')
            ->setParameter('status', $status)
            ->orderBy('s.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    // tester 

    public function searchAllConditions($names = null, $category = null, $status = null, $products = null)
    {

        return $this->createQueryBuilder('ctt')
            ->where('ctt.name = :name')
            ->setParameter('name', $names)
            ->join('ctt.category', "cat")
            ->andWhere('cat.name = :category')
            ->setParameter('category', $category)
            ->join('ctt.status', "s")
            ->andWhere('s.name = :status')
            ->setParameter('status', $status)
            ->orderBy('ctt.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function contractNotifications()
    {
        $entityManager = $this->getEntityManager();
        $query = $entityManager->createQuery(
            "SELECT ctt.name, ctt.dateEffect, ctt.dateEnding
            FROM App\Entity\Contract ctt
            JOIN App\Entity\Amendement a
            WHERE ctt.status = 2
            ORDER BY ctt.name"
        );
        return $query->getResult();
    }


    // /**
    //  * @return Contract[] Returns an array of Contract objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Contract
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
