<?php
/**
 * This file is part of the PositibeLabs Projects.
 *
 * (c) Pedro Carlos Abreu <pcabreus@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Positibe\Component\Publishable\Entity;

/**
 * Class StatePublishableTrait
 * @package Positibe\Component\Publishable\Entity
 *
 * To be used with Workflow state machine with at least 'draft', 'published' and 'unpublished' states
 *
 * @author Pedro Carlos Abreu <pcabreus@gmail.com>
 */
trait StatePublishableTrait
{
    /**
     * @var boolean
     *
     * @ORM\Column(name="state", type="string", length=25, nullable=TRUE)
     */
    protected $state = 'draft';

    /**
     * @return bool
     */
    public function isPublishable()
    {
        return $this->state === 'published';
    }

    /**
     * @param bool $publishable
     */
    public function setPublishable($publishable)
    {
        $this->state = $publishable ? 'published' : 'unpublished';
    }

    /**
     * @param $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

} 