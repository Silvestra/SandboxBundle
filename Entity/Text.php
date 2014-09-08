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
use Tadcka\TextBundle\Model\Text as BaseText;
use Tadcka\TextBundle\Model\TextTranslationInterface;

/**
 * @author Tadas Gliaubicas <tadcka89@gmail.com>
 *
 * @since 9/6/14 11:17 PM
 */

/**
 * @ORM\Entity
 * @ORM\Table(name="silvestra_texts")
 */
class Text extends BaseText
{
    /**
     * @var ArrayCollection|TextTranslationInterface[]
     *
     * @ORM\OneToMany(
     *      targetEntity="Silvestra\Bundle\SandboxBundle\Entity\TextTranslation",
     *      mappedBy="text",
     *      cascade={"persist", "remove"}
     * )
     */
    protected $translations;

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
    public function addTranslation(TextTranslationInterface $translation)
    {
        $this->translations[] = $translation;
    }

    /**
     * {@inheritdoc}
     */
    public function removeTranslation(TextTranslationInterface $translation)
    {
        $this->translations->removeElement($translation);
    }
}
