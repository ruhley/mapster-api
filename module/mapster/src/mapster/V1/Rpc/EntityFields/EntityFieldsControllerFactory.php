<?php
namespace mapster\V1\Rpc\EntityFields;

class EntityFieldsControllerFactory
{
    public function __invoke($controllers)
    {
        return new EntityFieldsController();
    }
}
