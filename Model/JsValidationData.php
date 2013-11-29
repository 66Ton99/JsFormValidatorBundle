<?php
/**
 * Created by PhpStorm.
 * User: Yury Maltsev
 * Email: dev.ymalcev@gmail.com
 * Date: 11/6/13
 * Time: 5:50 PM
 */

namespace Fp\JsFormValidatorBundle\Model;


class JsValidationData extends JsModelAbstract {

    const TYPE_FORM     = 'Symfony\Component\Form\Form';
    const TYPE_CLASS    = 'Symfony\Component\Validator\Mapping\ClassMetadata';
    const TYPE_PROPERTY = 'Symfony\Component\Validator\Mapping\PropertyMetadata';

    /**
     * @var string
     */
    protected $type;

    /**
     * @var array
     */
    protected $groups;

    /**
     * @var array
     */
    protected $defaultGroups = array('Default');

    /**
     * @var array
     */
    protected $constraints = array();

    /**
     * @var array
     */
    protected $getters = array();

    /**
     *
     */
    function __construct($groups, $type)
    {
        if (is_array($groups)) {
            $this->groups = array_merge($groups, $this->defaultGroups);
        } else {
            $this->groups = $groups;
        }

        $this->type = $type;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return sprintf('new FpJsValidationData(%1$s)', parent::__toString());
    }

    /**
     * Convert model to an array
     * @return array
     */
    public function toArray()
    {
        return array(
            'type'        => $this->getType(),
            'groups'      => $this->getGroups(),
            'constraints' => $this->getConstraints(),
            'getters'     => $this->getGetters(),
        );
    }

    /**
     * Get Groups
     *
     * @return array
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * Set constraints
     *
     * @param array $constraints
     *
     * @return JsValidationData
     */
    public function setConstraints($constraints)
    {
        $this->constraints = $constraints;

        return $this;
    }

    /**
     * Get Constraints
     *
     * @return array
     */
    public function getConstraints()
    {
        return $this->constraints;
    }

    /**
     * Set getters
     *
     * @param array $getters
     *
     * @return JsValidationData
     */
    public function setGetters($getters)
    {
        $this->getters = $getters;

        return $this;
    }

    /**
     * Get Getters
     *
     * @return array
     */
    public function getGetters()
    {
        return $this->getters;
    }

    /**
     * Get Type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
} 