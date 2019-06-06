<?php
namespace App;

use PDO;
use Aura\SqlQuery\QueryFactory;

class QueryBuilder
{
    private $pdo;
    private $queryFactory;

    public function __construct(PDO $pdo, QueryFactory $queryFactory)
    {
        $this->pdo = $pdo;
        $this->queryFactory = $queryFactory;
    }

    public function lastInsertId()
    {
        return $this->lastInsertId();
    }

    public function getOne($table, $id)
    {
        $select = $this->queryFactory->newSelect();

        $select->cols(['*'])
            ->from($table)
            ->where('id = :id')
            ->bindValues([
                'id' => $id,
            ]);
        $sth = $this->pdo->prepare($select->getStatement());

        $sth->execute($select->getBindValues());

        return $sth->fetch(PDO::FETCH_ASSOC);
    }

    public function getAll($table){
        $select = $this->queryFactory->newSelect();

        $select->cols(["*"])
            ->from($table);

        $sth = $this->pdo->prepare($select->getStatement());

        $sth->execute($select->getBindValues());

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllId($table, $id)
    {
        $select = $this->queryFactory->newSelect();

        $select->cols(["*"])
            ->from($table)
            ->where('post_id = :id')
            ->bindValues([
                'id' => $id,
            ]);

        $sth = $this->pdo->prepare($select->getStatement());

        $sth->execute($select->getBindValues());

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function select($table, $column = "*"){
        $select = $this->queryFactory->newSelect();

        $select->cols([$column])
            ->from($table);

        $sth = $this->pdo->prepare($select->getStatement());

        $sth->execute($select->getBindValues());

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function orderById($table)
    {
        $orderById = $this->queryFactory->newSelect();

        $orderById->cols(["*"])
            ->from($table)
            ->orderBy(['id DESC']);

        $sth = $this->pdo->prepare($orderById->getStatement());

        $sth->execute($orderById->getBindValues());

        return $sth->fetchAll(PDO::FETCH_ASSOC);

    }

    public function getLimitPost($table, $orderBy, $limit)
    {
        $select = $this->queryFactory->newSelect();

        $select->cols(['*'])
            ->from($table)
            ->orderBy(["$orderBy DESC"])
            ->setPaging($limit)
            ->page($_GET['page'] ?? 1);

        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());

        return $sth->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCount($table, $column)
    {
        $select = $this->queryFactory->newSelect();

        $select->cols([$column])
            ->from($table);
        $sth = $this->pdo->prepare($select->getStatement());
        $sth->execute($select->getBindValues());
        return $sth->fetchColumn();
    }

    public function insert($table, $data){
        $insert = $this->queryFactory->newInsert();
        $insert
            ->into($table)
            ->cols($data);

        $sth = $this->pdo->prepare($insert->getStatement());
        $sth->execute($insert->getBindValues());
    }

    public function update($table, $data, $id)
    {
        $update = $this->queryFactory->newUpdate();

        $update
            ->table($table)
            ->cols($data)
            ->where('id = :id');
        $update->bindValues([
            'id' => $id
        ]);

        $sth = $this->pdo->prepare($update->getStatement());

        $sth->execute($update->getBindValues());
    }

    public function delete($table, $id)
    {
        $delete = $this->queryFactory->newDelete();

        $delete
            ->from($table)
            ->where('id = :id')
            ->bindValues([
                'id' => $id,
            ]);

        $sth = $this->pdo->prepare($delete->getStatement());

        $sth->execute($delete->getBindValues());
    }

    public function lastsInsertId()
    {
        return $this->pdo->lastInsertId();
    }
}