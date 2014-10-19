<?php

/*
 * This file is part of the Silvestra package.
 *
 * (c) Silvestra <tadcka89@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Silvestra\Bundle\SandboxBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Gedmo\Mapping\Annotation as Gedmo;
use Silvestra\Component\Seo\Model\SeoMetadataInterface;
use Tadcka\Bundle\SitemapBundle\Model\TreeInterface;
use Tadcka\Component\Tree\Model\NodeInterface;
use Tadcka\Component\Tree\Model\NodeTranslationInterface;
use Tadcka\Bundle\SitemapBundle\Model\Node as BaseNode;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 9/6/14 11:50 AM
 */

/**
 * @Gedmo\Tree(type="nested")
 *
 * @ORM\Entity(repositoryClass="Gedmo\Tree\Entity\Repository\NestedTreeRepository")
 * @ORM\Table(name="silvestra_sitemap_nodes")
 */
class Node extends BaseNode
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
     * @var NodeInterface
     *
     * @Gedmo\TreeParent
     *
     * @ORM\ManyToOne(targetEntity="Silvestra\Bundle\SandboxBundle\Entity\Node", inversedBy="children")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="parent_id", referencedColumnName="id", onDelete="CASCADE", nullable=true)
     * })
     */
    protected $parent;

    /**
     * @var ArrayCollection|NodeInterface[]
     *
     * @ORM\OneToMany(
     *      targetEntity="Silvestra\Bundle\SandboxBundle\Entity\Node",
     *      mappedBy="parent",
     *      cascade={"persist", "remove"}
     * )
     * @ORM\OrderBy({"priority" = "DESC"})
     */
    protected $children;

    /**
     * @var ArrayCollection|NodeTranslationInterface[]
     *
     * @ORM\OneToMany(
     *      targetEntity="Silvestra\Bundle\SandboxBundle\Entity\NodeTranslation",
     *      mappedBy="node",
     *      cascade={"persist", "remove"}
     * )
     */
    protected $translations;

    /**
     * @var TreeInterface
     *
     * @ORM\ManyToOne(targetEntity="Silvestra\Bundle\SandboxBundle\Entity\Tree", inversedBy="nodes")
     * @ORM\JoinColumns({
     *      @ORM\JoinColumn(name="tree_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     * })
     */
    protected $tree;

    /**
     * @var SeoMetadataInterface[]
     *
     * @ORM\ManyToMany(targetEntity="Silvestra\Bundle\SandboxBundle\Entity\SeoMetadata")
     * @ORM\JoinTable(name="silvestra_sitemap_node_seo_metadata")
     */
    protected $seoMetadata;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->children = new ArrayCollection();
        $this->translations = new ArrayCollection();
        $this->seoMetadata = new ArrayCollection();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function addChild(NodeInterface $child)
    {
        $this->children[] = $child;
    }

    /**
     * {@inheritdoc}
     */
    public function removeChild(NodeInterface $child)
    {
        $this->children->removeElement($child);
    }

    /**
     * {@inheritdoc}
     */
    public function addTranslation(NodeTranslationInterface $translation)
    {
        $this->translations[] = $translation;
    }

    /**
     * {@inheritdoc}
     */
    public function removeTranslation(NodeTranslationInterface $translation)
    {
        $this->translations->removeElement($translation);
    }

    /**
     * {@inheritdoc}
     */
    public function removeSeoMetadata(SeoMetadataInterface $seoMetadata)
    {
        $this->seoMetadata->removeElement($seoMetadata);
    }
}
