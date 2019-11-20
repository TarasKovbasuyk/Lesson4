<?php


namespace parkingClass;


class ScheduleRepository
{
    private $pdo;
    public function __construct()
    {
        $this->pdo = Connection::createConnect();
    }
    /**
     * @return array
     */
    public function getList(): array
    {
        $stmt = $this->pdo->query('Select * From schedule');
        return $stmt->fetchAll();
    }
    public function get(int $id): array
    {
        $stmt = $this->pdo->prepare('Select * From  schedule WHERE id = :id');
        $stmt->bindValue('id', $id,\PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch();
    }
    public function getByDate($date):array
    {
        $stmt = $this->pdo->prepare('Select * From  schedule WHERE date = :date');
        $stmt->bindValue('date', $date,\PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function insert(array $schedule)
    {
        $stmt = $this->getStmtInsert();
        $stmt->execute([
            $schedule['driver_license'],
            $schedule['car_number'],
            $schedule['date']
        ]);
    }

    /**
     * @return \PDOStatement
     */
    public function getStmtInsert():\PDOStatement
    {
        return $stmt = $this->pdo->prepare('INSERT INTO schedule 
    (driver_license,car_number,date) VALUES (?,?,?)');
    }
    public function delete(int $id)
    {
        $stmt = $this->pdo->prepare(' DELETE FROM schedule WHERE id = :id');
        $stmt->bindValue('id', $id,\PDO::PARAM_INT);
        $stmt->execute();
    }
}