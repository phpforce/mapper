<?php
namespace Phpforce\Mapper\Model;

use Phpforce\Mapper\Mapping as Salesforce;

/**
 * @Salesforce\Object(name="Account")
 */
class Account
{
    /**
     * @var string
     * @Salesforce\Field(name="Id")
     */
    protected $id;
}