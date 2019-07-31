<?php


namespace app\models\entities;


class Cart extends Entity
{
    public $id;
    public $status;
    public $id_order;
    public $created_at;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getIdOrder()
    {
        return $this->id_order;
    }

    /**
     * @param mixed $id_order
     */
    public function setIdOrder($id_order): void
    {
        $this->id_order = $id_order;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

}