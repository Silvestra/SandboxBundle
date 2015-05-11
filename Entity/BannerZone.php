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

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Silvestra\Component\Banner\Model\BannerInterface;
use Silvestra\Component\Banner\Model\BannerZone as BaseBannerZone;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="silvestra_banner_zones")
 */
class BannerZone extends BaseBannerZone
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
     * @var ArrayCollection|BannerInterface[]
     *
     * @ORM\OneToMany(targetEntity="Silvestra\Bundle\SandboxBundle\Entity\Banner", mappedBy="zone")
     * @ORM\OrderBy({"position" = "ASC"})
     */
    protected $banners;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->translations = new ArrayCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function removeBanner(BannerInterface $banner)
    {
        $this->banners->removeElement($banner);
    }
}
