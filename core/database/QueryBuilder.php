<?php

class QueryBuilder
{
    public function __construct(protected PDO $pdo)
    {
    }

    public function selectInfo($column, $table)
    {
        $statement = $this->pdo->prepare("select {$column} from {$table}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($table, $parameters)
    {
        $sql = sprintf(
            'insert into %s (%s) values (%s)',
            $table,
            implode(', ', array_keys($parameters)),
            ':' . implode(', :', array_keys($parameters))
        );
        try {
            $statement = $this->pdo->prepare($sql);

            $statement->execute($parameters);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
