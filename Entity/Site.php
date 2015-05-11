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
use Doctrine\Common\Collections\ArrayCollection;
use Silvestra\Component\Seo\Model\SeoMetadataInterface;
use Silvestra\Component\Site\Model\Site as BaseSite;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="silvestra_sites")
 */
class Site extends BaseSite
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var ArrayCollection|SeoMetadataInterface[]
     *
     * @ORM\ManyToMany(targetEntity="Silvestra\Bundle\SandboxBundle\Entity\SeoMetadata", cascade={"persist", "remove"})
     * @ORM\JoinTable(name="silvestra_site_seo_metadata")
     */
    protected $seoMetadata;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->seoMetadata = new ArrayCollection();
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function removeSeoMetadata(SeoMetadataInterface $seoMetadata)
    {
        $this->seoMetadata->removeElement($seoMetadata);
    }
}
