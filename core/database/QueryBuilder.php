<?php

class QueryBuilder
{
    /**
     * Construct method
     * 
     * @param PDO $pdo
     * 
     * @return void
     */
    public function __construct(protected PDO $pdo)
    {
    }

    /**
     * Fetches data from a database
     * 
     * @param string $column name
     * @param string $table name
     * 
     * @return array|false
     */
    public function selectInfo(string $column, string $table): array
    {
        $statement = $this->pdo->prepare("select {$column} from {$table}");

        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Inserts data into a table in a database
     * 
     * @param string $table
     * @param array $parameters
     * 
     * @return void
     */
    public function insert(string $table, array $parameters): void
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
