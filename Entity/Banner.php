<?php

/*
 * This file is part of the Silvestra package.
 *
 * (c) Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Silvestra\Bundle\SandboxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Silvestra\Component\Banner\Model\Banner as BaseBanner;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="silvestra_banners")
 */
class Banner extends BaseBanner
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToOne(targetEntity="Silvestra\Bundle\SandboxBundle\Entity\Image")
     * @ORM\JoinColumn(name="image_id", referencedColumnName="id", onDelete="SET NULL", nullable=true)
     */
    protected $image;

    /**
     * @ORM\ManyToOne(targetEntity="Silvestra\Bundle\SandboxBundle\Entity\BannerZone", inversedBy="banners")
     * @ORM\JoinColumn(name="banner_zone_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     */
    protected $zone;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
