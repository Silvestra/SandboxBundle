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
use Tadcka\TextBundle\Model\TextTranslation as BaseTextTranslation;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 9/6/14 11:19 PM
 */

/**
 * @ORM\Entity
 * @ORM\Table(
 *      name="silvestra_text_translations",
 *      uniqueConstraints={@ORM\UniqueConstraint(name="unique_lang_idx", columns={"text_id", "lang"})}
 * )
 */
class TextTranslation extends BaseTextTranslation
{
    /**
     * @ORM\ManyToOne(targetEntity="Silvestra\Bundle\SandboxBundle\Entity\Text", inversedBy="translations")
     * @ORM\JoinColumn(name="text_id", referencedColumnName="id", onDelete="CASCADE", nullable=false)
     */
    protected $text;
}
