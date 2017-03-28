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
 * Class PublishTimePeriodTrait
 * @package Positibe\Component\Publishable\Entity
 *
 * @author Pedro Carlos Abreu <pcabreus@gmail.com>
 */
trait PublishTimePeriodTrait
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="publish_start_date", type="datetime", nullable=TRUE)
     */
    protected $publishStartDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="publish_end_date", type="datetime", nullable=TRUE)
     */
    protected $publishEndDate;

    public function setPublishStartDate(\DateTime $startDate = null)
    {
        $this->publishStartDate = $startDate;
    }

    public function getPublishStartDate()
    {
        return $this->publishStartDate;
    }

    public function setPublishEndDate(\DateTime $endDate = null)
    {
        $this->publishEndDate = $endDate;
    }

    public function getPublishEndDate()
    {
        return $this->publishEndDate;
    }
} 