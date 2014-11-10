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
use Tadcka\Component\Routing\Model\RedirectRoute as BaseRedirectRoute;
use Tadcka\Component\Routing\Model\RouteInterface;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 14.11.10 17.32
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="silvestra_redirect_routes")
 */
class RedirectRoute extends BaseRedirectRoute
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
     * @var RouteInterface
     *
     * @ORM\ManyToOne(targetEntity="Silvestra\Bundle\SandboxBundle\Entity\Route")
     * @ORM\JoinColumn(name="route_target_id", referencedColumnName="id", onDelete="CASCADE", nullable=true)
     */
    protected $routeTarget;

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }
}
 