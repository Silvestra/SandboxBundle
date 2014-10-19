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
use Silvestra\Component\Seo\Model\SeoMetadata as BaseSeoMetadata;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="silvestra_seo_metadata")
 */
class SeoMetadata extends BaseSeoMetadata
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
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }
}
