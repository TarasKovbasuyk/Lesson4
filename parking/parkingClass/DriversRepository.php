<?php

namespace parkingClass;

use parkingClass\Connection;

class DriversRepository
{
    private $pdo;

    /**
     * Repositories constructor.
     */
    public function __construct()
    {
        $this->pdo = Connection::createConnect();
    }

    /**
     * @param int $id
     * @return array
     */
    public function get(int $id): array
    {
        $stmt = $this->pdo->prepare('Select * From drivers WHERE id = :id');
        $stmt->bindValue('id', $id,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * @return array
     */
    public function getList(): array
    {
        $stmt = $this->pdo->query('Select * From drivers');
        return $stmt->fetchAll();
    }

    /**
     * @param int $id
     */
    public function delete(int $id)
    {
        $stmt = $this->pdo->prepare(' DELETE FROM drivers WHERE id = :id');
        $stmt->bindValue('id', $id,\PDO::PARAM_INT);
        $stmt->execute();
    }

    public function update($id, array $drivers)
    {
        $stmt = $this->pdo->prepare(' UPDATE drivers SET 
                   Name = :name, 
                   Driver_Exp = :driver_exp, 
                   Driver_License = :driver_license,
                   Hour_Salary = :hour_salary
                   WHERE id = :id'
        );
        $name = $drivers['name'];
        $driver_exp = $drivers['driver_exp'];
        $driver_license = $drivers['driver_license'];
        $hour_salary = $drivers['hour_salary'];
        $stmt->bindValue('name', $name, \PDO::PARAM_STR);
        $stmt->bindValue('driver_exp', $driver_exp, \PDO::PARAM_INT);
        $stmt->bindValue('driver_license', $driver_license, \PDO::PARAM_INT);
        $stmt->bindValue('hour_salary', $hour_salary, \PDO::PARAM_INT);
        $stmt->bindValue('id', $id, \PDO::PARAM_INT);
        $stmt->execute();
    }
    public function insert(array $driver)
    {
        $stmt = $this->getStmtInsert();
        $stmt->execute([
            $driver['name'],
            $driver['driver_exp'],
            $driver['driver_license'],
            $driver['hour_salary']
        ]);
    }

    /**
     * @return \PDOStatement
     */
    public function getStmtInsert():\PDOStatement
    {
        return $stmt = $this->pdo->prepare('INSERT INTO drivers 
    (Name,Driver_Exp,Driver_License,Hour_Salary) VALUES (?,?,?,?)');
    }
}
