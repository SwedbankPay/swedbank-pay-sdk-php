<?php

namespace PayEx\Api\Service\Payment\Transaction\Resource\Response\Collection\Item\Data;

interface ProblemsItemInterface
{
    const NAME = 'name';
    const DESCRIPTION = 'description';

    /**
    * @return string
    */
    public function getName();

    /**
    * @param string $name
    * @return $this
    */
    public function setName($name);

    /**
    * @return string
    */
    public function getDescription();

    /**
    * @param string $description
    * @return $this
    */
    public function setDescription($description);
}
