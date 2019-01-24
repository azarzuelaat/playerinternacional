<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @Gedmo\TranslationEntity(class="AppBundle\Entity\PromoTranslation")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table(name="promo")
 */
class Promo {

        /**
         * @ORM\Id
         * @ORM\Column(type="integer")
         * @ORM\GeneratedValue(strategy="AUTO")
         */
        protected $id;

        /**
         * @Assert\File(maxSize="6000000")
         */
        protected $file;

        /**
         * @ORM\Column(type="string",  nullable=true)
         */
        protected $player = 'internacional';

        /**
         * @Gedmo\Translatable
         * @ORM\Column(type="string")
         */
        protected $title;

        /**
         * @ORM\Column(type="string", nullable=true)
         */
        protected $image;

        /**
         * @Gedmo\Translatable
         * @ORM\Column(type="string")
         */
        protected $summary;

        /**
         * @ORM\Column(type="integer")
         */
        protected $year;

        /**
         * @ORM\Column(type="integer")
         */
        protected $seasons;

        /**
         * @ORM\Column(type="integer")
         */
        protected $episodes;

        /**
         * @ORM\Column(type="integer")
         */
        protected $duration;

        /**
         * @ORM\Column(type="string")
         */
        protected $ratio;

        /**
         * @ORM\Column(type="string")
         */
        protected $language;

        /**
         * @ORM\Column(type="float", nullable=true)
         */
        protected $cuote;

        /**
         * @ORM\Column(type="float", nullable=true)
         */
        protected $viewers;

        /**
         * @ORM\Column(type="string", nullable=true)
         */
        protected $website;

        /**
         * @ORM\Column(type="string", nullable=true)
         */
        protected $facebook;

        /**
         * @ORM\Column(type="string", nullable=true)
         */
        protected $twitter;

        /**
         * @ORM\Column(type="string", nullable=true)
         */
        protected $store;

        /**
         * @ORM\Column(type="string")
         */
        protected $day;

        /**
         * @ORM\Column(type="datetime")
         */
        protected $time;

        /**
         * @ORM\Column(type="string")
         */
        protected $url;

        /**
         * @ORM\Column(type="string")
         */
        protected $channel;

        /**
         * @ORM\Column(type="boolean", nullable=false, options={"default" = 0})
         */
        protected $diary;
        protected $normalizeTime = null;

        /**
         * @ORM\OneToMany(
         *   targetEntity="PromoTranslation",
         *   mappedBy="object",
         *   cascade={"persist", "remove"},
         *   indexBy="promo_lookup_unique_idx"
         * )
         */
        private $translations;

        public function __construct() {

                $this->year = date('Y');
                $this->seasons = 1;
                $this->episodes = 10;
                $this->duration = 60;
                $this->ratio = "16:9";

                $this->translations = new ArrayCollection();
        }

        public function getTranslations() {
                return $this->translations;
        }

        public function getTranslation($field, $locale) {

                return $this->translations->filter(function ($translation) use ($field, $locale) {
                                $isTitle = $translation->getField() == $field;
                                $isLocale = $translation->getLocale() == $locale;

                                return $isLocale AND $isTitle;
                        });
        }

        public function addTranslation(PromoTranslation $t) {
                if (!$this->translations->contains($t)) {
                        $this->translations[] = $t;
                        $t->setObject($this);
                }
        }

        public function getId() {
                return $this->id;
        }

        public function getFile() {
                return $this->file;
        }

        public function getPlayer() {
                return $this->player;
        }

        public function getTitle($lang = null) {

                $trans = array();

                $fields = $this->translations->filter(function ($translation) {
                        return $translation->getField() == 'title';
                });

                foreach ($fields as $field) {
                        $locale = $field->getLocale();
                        $trans[$locale] = $field->getContent();
                }
                if (is_null($lang)) {
                        return $trans;
                } else {
                        return $trans[$lang];
                }

                return $trans;
        }

        public function getImage() {
                return $this->image;
        }

        public function getSummary($lang = null) {
                $trans = array();

                $fields = $this->translations->filter(function ($translation) {
                        return $translation->getField() == 'summary';
                });

                foreach ($fields as $field) {
                        $locale = $field->getLocale();
                        $trans[$locale] = $field->getContent();
                }

                if (is_null($lang)) {
                        return $trans;
                } else {
                        return $trans[$lang];
                }
        }

        public function getYear() {
                return $this->year;
        }

        public function getSeasons() {
                return $this->seasons;
        }

        public function getEpisodes() {
                return $this->episodes;
        }

        public function getDuration() {
                return $this->duration;
        }

        public function getRatio() {
                return $this->ratio;
        }

        public function getLanguage() {
                return $this->language;
        }

        public function getCuote() {
                return $this->cuote;
        }

        public function getViewers() {
                return $this->viewers;
        }

        public function getWebsite() {
                return $this->website;
        }

        public function getFacebook() {
                return $this->facebook;
        }

        public function getTwitter() {
                return $this->twitter;
        }

        public function getStore() {
                return $this->store;
        }

        public function getDay() {
                return explode(";", $this->day);
        }

        public function getTime() {
                return $this->time;
        }

        public function getUrl() {
                return $this->url;
        }

        public function getChannel() {
                return $this->channel;
        }

        public function getAudience() {
                return array(
                    'cuote' => $this->getCuote(),
                    'total' => $this->getViewers()
                );
        }

        public function getDiary() {
                return $this->diary;
        }

        public function setId($id) {
                $this->id = $id;
                return $this;
        }

        public function setFile(UploadedFile $file) {
                $this->file = $file;
                return $this;
        }

        public function setPlayer($player) {
                $this->player = $player;
                return $this;
        }

        public function setTitle($title) {

                foreach ($title as $locale => $value) {
                        $trans = $this->findTranslation('title', $locale, $value);
                        $this->addTranslation($trans);
                }
                $this->title = "";
                return $this;
        }

        public function setImage($image) {
                $this->image = $image;
                return $this;
        }

        public function setSummary($summary) {
                foreach ($summary as $locale => $value) {
                        $trans = $this->findTranslation('summary', $locale, $value);
                        $this->addTranslation($trans);
                }

                $this->summary = "";
                return $this;
        }

        public function setYear($year) {
                $this->year = $year;
                return $this;
        }

        public function setSeasons($seasons) {
                $this->seasons = $seasons;
                return $this;
        }

        public function setEpisodes($episodes) {
                $this->episodes = $episodes;
                return $this;
        }

        public function setDuration($duration) {
                $this->duration = $duration;
                return $this;
        }

        public function setRatio($ratio) {
                $this->ratio = $ratio;
                return $this;
        }

        public function setLanguage($language) {
                $this->language = $language;
                return $this;
        }

        public function setCuote($cuote) {
                $this->cuote = $cuote;
                return $this;
        }

        public function setViewers($viewers) {
                $this->viewers = $viewers;
                return $this;
        }

        public function setWebsite($website) {
                $this->website = $website;
                return $this;
        }

        public function setFacebook($facebook) {
                $this->facebook = $facebook;
                return $this;
        }

        public function setTwitter($twitter) {
                $this->twitter = $twitter;
                return $this;
        }

        public function setStore($store) {
                $this->store = $store;
                return $this;
        }

        public function setDay($day) {
                $this->day = implode(";", $day);
                return $this;
        }

        public function setTime($time) {
                $this->time = $time;
                return $this;
        }

        public function setUrl($url) {
                $this->url = $url;
                return $this;
        }

        public function setChannel($channel) {
                $this->channel = $channel;
                return $this;
        }

        public function setDiary($diary) {
                $this->diary = $diary;
                return $this;
        }

        /**
         * @ORM\PrePersist()
         * @ORM\PreUpdate()
         */
        public function preUpload() {
                if (null !== $this->file) {
                        $name = uniqid('promo_');
                        $this->image = $name . '.' . $this->file->guessExtension();
                }
        }

        /**
         * @ORM\PostPersist()
         * @ORM\PostUpdate()
         */
        public function upload() {

                if (null === $this->file) {
                        return;
                }
                // you must throw an exception here if the file cannot be moved
                // so that the entity is not persisted to the database
                // which the UploadedFile move() method does

                $this->file->move($this->getUploadRootDir(), $this->image);

                unset($this->file);
        }

        /**
         * @ORM\PostRemove()
         */
        public function removeUpload() {
                $file = $this->getAbsolutePath();
                if ($this->hasImage()) {
                        unlink($file);
                }
        }

        public function hasImage() {
                $file = $this->getAbsolutePath();
                return file_exists($file);
        }

        public function getAbsolutePath() {
                return null === $this->image ? null : $this->getUploadRootDir() . '/' . $this->id . '.' . $this->image;
        }

        public function getWebImage() {

                if (null != $this->image) {
                        $file = $this->getUploadDir() . '/' . $this->image;
                        if (file_exists($file)) {
                                return $file;
                        }
                }
                return null;
        }

        protected function getUploadRootDir() {
                // the absolute directory path where uploaded documents should be saved
                return realpath(__DIR__ . '/../../../web/' . $this->getUploadDir());
        }

        protected function getUploadDir() {
                // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
                return 'images/promos';
        }

        protected function findTranslation($field, $locale, $value) {

                $fields = $this->getTranslation($field, $locale);

                if ($fields->isEmpty()) {
                        $trans = new PromoTranslation($locale, $field, $value);
                } else {
                        $trans = $fields->first();
                        $trans->setContent($value);
                }
                return $trans;
        }

        public function getNormalizeTime() {
                if (is_null($this->normalizeTime)) {

                        $time = $this->time;

                        $hour = (int) $time->format('H');
                        $min = (int) $time->format('i');

                        if ($hour < 6 OR ($hour == 6 AND $min < 30)) {
                                date_add($time, date_interval_create_from_date_string('1 day'));
                        }


                        $this->normalizeTime = (int) $time->format('YmdHis');
                }
                return $this->normalizeTime;
        }

}
