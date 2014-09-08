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
use Tadcka\Component\Tree\Model\NodeInterface;
use Tadcka\Bundle\RoutingBundle\Model\RouteInterface;
use Tadcka\Bundle\SitemapBundle\Model\NodeTranslation as BaseNodeTranslation;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 9/6/14 11:51 AM
 */

/**
 *
 * @ORM\Entity
 * @ORM\Table(
 *      name="silvestra_sitemap_node_translations",
 *      uniqueConstraints={
 *          @ORM\UniqueConstraint(name="unique_lang_idx", columns={"node_id", "lang"})
 *      }
 * )
 */
class NodeTranslation extends BaseNodeTranslation
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
     * @ORM\ManyToOne(targetEntity="Silvestra\Bundle\SandboxBundle\Entity\Node", inversedBy="translations")
     * @ORM\JoinColumn(name="node_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     */
    protected $node;

    /**
     * @var RouteInterface
     *
     * @ORM\OneToOne(targetEntity="Silvestra\Bundle\SandboxBundle\Entity\Route")
     * @ORM\JoinColumn(name="route_id", referencedColumnName="id", onDelete="CASCADE", nullable=true)
     */
    protected $route;

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }
}
