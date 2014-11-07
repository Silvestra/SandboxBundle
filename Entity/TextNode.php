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
use Silvestra\Bundle\Text\NodeBundle\Model\TextNode as BaseTextNode;
use Tadcka\Component\Tree\Model\NodeInterface;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 9/7/14 11:57 AM
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="silvestra_text_nodes")
 */
class TextNode extends BaseTextNode
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
     * @ORM\OneToOne(targetEntity="Silvestra\Bundle\SandboxBundle\Entity\Text")
     * @ORM\JoinColumn(name="text_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     */
    protected $text;

    /**
     * @var NodeInterface
     *
     * @ORM\OneToOne(targetEntity="Silvestra\Bundle\SandboxBundle\Entity\Node")
     * @ORM\JoinColumn(name="node_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     */
    protected $node;

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }
}
