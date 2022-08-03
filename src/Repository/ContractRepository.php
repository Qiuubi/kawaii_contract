<?php

namespace App\Repository;

use App\Entity\Amendement;
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
            // SELECT * FROM `contract` as c LEFT JOIN `amendement` as a ON c.id = a.contract_id 
            // ->addSelect('a')
            // ->from('App\Entity\Amendement', 'a')
            // ->leftJoin('a.contract', 'ON', 'ctt.id = a.contract')
            ->where('ctt.status != 6')
            ->orderBy('ctt.dateEffect', 'DESC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }

    public function allContractsAmendements()
    {
        return $this->createQueryBuilder('ctt')
            ->addSelect('a')
            ->from('App\Entity\Amendement', 'a')
            ->leftJoin('a.contract', 'ON', 'ctt.id = a.contract')
            // ->where('a.contract = ctt.id')
            // SELECT * FROM contract AS ctt LEFT JOIN amendement AS a ON ctt.id = a.contract_id 
            ->getQuery()
            ->getResult();
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
