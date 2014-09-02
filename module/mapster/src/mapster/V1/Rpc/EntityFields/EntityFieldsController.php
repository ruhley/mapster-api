<?php
namespace mapster\V1\Rpc\EntityFields;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Db\Adapter\Adapter;
use ZF\ContentNegotiation\ViewModel;
use ZF\Hal\Entity;

class EntityFieldsController extends AbstractActionController
{
    public function entityFieldsAction()
    {
        $sql = 'SELECT eft.name
                FROM entity_fields ef
                INNER JOIN entity_field_types eft
                ON eft.id = ef.entity_field_type_id
                WHERE ef.entity_id = ?
                ORDER BY ef.sequence';

        $params = array(1);

        $adapter = new Adapter(array(
            'driver'   => 'Pdo_Mysql',
            'database' => 'mapster',
            'username' => 'root',
            'password' => '',
            'host'     => '127.0.0.1',
        ));
        $results = $adapter->query($sql, $params)->toArray();


        $response = array();
        foreach ($results as $result) {
            array_push($response, $result['name']);
        }

        return new ViewModel(array('payload' => $response));
    }
}
