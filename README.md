Positibe Publishable Component
==============================

This library provide you some traits to be used in doctrine entities that implement `Symfony\Cmf\Bundle\CoreBundle\Translatable\TranslatableInterface` and `Symfony\Cmf\Bundle\CoreBundle\PublishWorkflow\PublishTimePeriodInterface`.

StatePublishableTrait
---------------------

This trait has the default mapping for a Entity that implement `PublishableInterface`.

    [php]
    namespace Positibe\Component\Publishable\Entity;

    trait PublishableTrait
    {
        /**
         * @var boolean
         *
         * @ORM\Column(name="publishable", type="boolean")
         */
        protected $publishable = true;

        public function isPublishable()
        {
            return $this->publishable;
        }

        public function setPublishable($boolean)
        {
            $this->publishable = $boolean;
        }
    }

You can use this Trait with a Publishable content with multiple states like `draft`, `published` and `unpublished`:

    [yaml]
    # app/config/config.yml
    # ...
    framework:
        workflows:
            publishable:
                type: 'state_machine' # or 'workflow'
                marking_store:
                    type: 'single_state' # or 'multiple_state'
                    arguments:
                        - 'state'
                supports:
                    - AppBundle\Entity\Post
                places:
                    - draft
                    - published
                    - unpublished
                transitions:
                    to_publish:
                        from: draft
                        to:   published
                    to_unpublish:
                        from: published
                        to:   unpublished
                    republish:
                        from: unpublished
                        to:   published
PublishableTrait
----------------

This trait has the default mapping for a Entity that implement `PublishableInterface`.

    [php]
    namespace Positibe\Component\Publishable\Entity;

    trait PublishableTrait
    {
        /**
         * @var boolean
         *
         * @ORM\Column(name="publishable", type="boolean")
         */
        protected $publishable = true;

        public function isPublishable()
        {
            return $this->publishable;
        }

        public function setPublishable($boolean)
        {
            $this->publishable = $boolean;
        }
    }

PublishTimePeriodTrait
----------------------

This trait has the default mapping for a Entity that implement `PublishTimePeriodInterface`.

    [php]
    namespace Positibe\Component\Publishable\Entity;

    trait PublishTimePeriodTrait
    {
        /**
         * @var \DateTime
         *
         * @ORM\Column(name="publish_start_date", type="datetime", nullable=TRUE)
         */
        protected $publishStartDate;

        /**
         * @var \DateTime
         *
         * @ORM\Column(name="publish_end_date", type="datetime", nullable=TRUE)
         */
        protected $publishEndDate;

        public function setPublishStartDate(\DateTime $startDate = null)
        {
            $this->publishStartDate = $startDate;
        }

        public function getPublishStartDate()
        {
            return $this->publishStartDate;
        }

        public function setPublishEndDate(\DateTime $endDate = null)
        {
            $this->publishEndDate = $endDate;
        }

        public function getPublishEndDate()
        {
            return $this->publishEndDate;
        }
    }

Using php trait
---------------

These are simple php traits so you can use it like that.

    [php]
    namespace Blog\Entity;

    use Symfony\Cmf\Bundle\CoreBundle\PublishWorkflow\PublishTimePeriodInterface;
    use Symfony\Cmf\Bundle\CoreBundle\PublishWorkflow\PublishableInterface;
    use Positibe\Component\Publishable\Entity\PublishableTrait;
    use Positibe\Component\Publishable\Entity\PublishTimePeriodTrait;
    use Doctrine\ORM\Mapping as ORM;

    /**
     * @ORM\Table()
     * @ORM\Entity
     */
    class Post implement PublishableInterface, PublishTimePeriodInterface
    {
        use PublishableTrait;
        use PublishTimePeriodTrait;
        /**
         * @var integer
         *
         * @ORM\Column(name="id", type="integer")
         * @ORM\Id
         * @ORM\GeneratedValue(strategy="AUTO")
         */
        protected $id;
    }

Note how you don't need to create anything to implement those interfaces.

**Caution:** To use the trait system you need to use PHP > 5.4.

**Important:** This library has not direct dependency of symfony-cmf/core-bundle, so you can use it without this one and need to be installed to use the interfaces.


