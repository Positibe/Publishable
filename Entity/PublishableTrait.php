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
 * Class PublishableTrait
 * @package Positibe\Component\Publishable\Entity
 *
 * @author Pedro Carlos Abreu <pcabreus@gmail.com>
 */
trait PublishableTrait
{
    /**
     * @var boolean
     *
     * @ORM\Column(name="publishable", type="boolean")
     */
    protected $publishable = true;

    public function isPublishable()
    {
        return $this->publishable;
    }

    public function setPublishable($boolean)
    {
        $this->publishable = $boolean;
    }

} 