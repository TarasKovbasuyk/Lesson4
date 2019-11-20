<?php


namespace parkingClass;

use parkingClass\Connection;

class BusRepository
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
    public function get( $id): array
    {
        $stmt = $this->pdo->prepare('Select * From  bus WHERE id =:id');
        $stmt->bindValue('id', $id,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }

    /**
     * @return array
     */
    public function getList(): array
    {
        $stmt = $this->pdo->query('Select * From bus ');
        return $stmt->fetchAll();
    }

    /**
     * @param int $id
     */
    public function delete(int $id)
    {
        $stmt = $this->pdo->prepare('Delete  From bus WHERE id = :id');
        $stmt->bindValue('id', $id);
        $stmt->execute();
    }

    public function update($id, array $buses)
    {
        $stmt = $this->pdo->prepare(' UPDATE bus SET 
                   Model = :model, 
                   Car_Number = :car_number, 
                   Fuel_Consumption = :fuel_consumption,
                   Hour_Price = :hour_price
                   WHERE id = :id'
        );
        $model = $buses['model'];
        $car_number = $buses['car_number'];
        $fuel_consumption = $buses['fuel_consumption'];
        $hour_price = $buses['hour_price'];
        $stmt->bindValue('model', $model, \PDO::PARAM_STR);
        $stmt->bindValue('car_number', $car_number, \PDO::PARAM_STR);
        $stmt->bindValue('fuel_consumption', $fuel_consumption, \PDO::PARAM_INT);
        $stmt->bindValue('hour_price', $hour_price, \PDO::PARAM_INT);
        $stmt->bindValue('id', $id, \PDO::PARAM_INT);
        $stmt->execute();
    }

    public function insert(array $buses)
    {
        $stmt = $this->getStmtInsert();
        $stmt->execute([
            $buses['model'],
            $buses['car_number'],
            $buses['fuel_consumption'],
            $buses['hour_price']
        ]);
    }

    /**
     * @return \PDOStatement
     */
    public function getStmtInsert():\PDOStatement
    {
        return $stmt = $this->pdo->prepare('INSERT INTO bus 
    (Model,Car_Number,Fuel_Consumption,Hour_Price) VALUES (?,?,?,?)');
    }
}