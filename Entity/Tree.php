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
use Tadcka\Bundle\SitemapBundle\Model\Tree as BaseTree;
use Tadcka\Component\Tree\Model\NodeInterface;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 9/6/14 11:49 AM
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="silvestra_sitemap_trees")
 */
class Tree extends BaseTree
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
     * @var ArrayCollection|NodeInterface[]
     *
     * @ORM\OneToMany(
     *      targetEntity="Silvestra\Bundle\SandboxBundle\Entity\Node",
     *      mappedBy="tree",
     *      cascade={"persist", "remove"}
     * )
     */
    protected $nodes;

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->nodes = new ArrayCollection();
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
    public function addNode(NodeInterface $node)
    {
        $this->nodes[] = $node;
    }

    /**
     * {@inheritdoc}
     */
    public function removeNode(NodeInterface $node)
    {
        $this->nodes->removeElement($node);
    }
}
