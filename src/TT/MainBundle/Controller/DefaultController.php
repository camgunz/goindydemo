<?php

namespace TT\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    private function readContentFile($fileName)
    {
        $error = "An error occurred rendering this page's content";

        try
        {
            $filePath = $this->get("kernel")->locateResource(
                "@TTMainBundle/Resources/content/" . $fileName
            );
        }
        catch (InvalidArgumentException $e)
        {
            return $error;
        }

        $content = file_get_contents($filePath);

        if ($content == FALSE) {
            return $error;
        }

        return $content;
    }

    public function indexAction()
    {
        return $this->render("TTMainBundle:Default:index.html.twig", array(
            "section" => null,
            "blurb1" => $this->readContentFile("blurb1.md"),
            "blurb2" => $this->readContentFile("blurb2.md"),
            "blurb3" => $this->readContentFile("blurb3.md"),
            "blurb4" => $this->readContentFile("blurb4.md"),
            "blurb5" => $this->readContentFile("blurb5.md"),
            "blurb6" => $this->readContentFile("blurb6.md")
        ));
    }

    public function aboutAction()
    {
        // CG: FIXME: Ideally we would have some kind of metadata for our
        //            content, something like a JSON/YAML/etc. header for the
        //            current Markdown scheme, or additional fields in a
        //            database.  Hardcoding for now though :/.
        return $this->render("TTMainBundle:Default:about.html.twig", array(
            "section" => "about",
            "content" => $this->readContentFile("about.md"),
            "subsections" => array(
                "overview",
                "history",
                "weather",
                "culture",
                "sports",
                "recreation"
            )
        ));
    }

    public function restaurantsAction($subsection)
    {
        if ($subsection == "breakfast")
        {
            return $this->render(
                "TTMainBundle:Default:columns.html.twig", array(
                    "title" => "Breakfast",
                    "section" => "restaurants",
                    "subsection" => $subsection,
                    "contents" => array (
                        $this->readContentFile("breakfast1.md"),
                        $this->readContentFile("breakfast2.md"),
                        $this->readContentFile("breakfast3.md")
                    )
                )
            );
        }

        if ($subsection == "lunch")
        {
            return $this->render(
                "TTMainBundle:Default:columns.html.twig", array(
                    "title" => "Lunch",
                    "section" => "restaurants",
                    "subsection" => $subsection,
                    "contents" => array (
                        $this->readContentFile("lunch1.md"),
                        $this->readContentFile("lunch2.md"),
                        $this->readContentFile("lunch3.md")
                    )
                )
            );
        }

        if ($subsection == "dinner")
        {
            return $this->render(
                "TTMainBundle:Default:columns.html.twig", array(
                    "title" => "Dinner",
                    "section" => "restaurants",
                    "subsection" => $subsection,
                    "contents" => array (
                        $this->readContentFile("dinner1.md"),
                        $this->readContentFile("dinner2.md"),
                        $this->readContentFile("dinner3.md")
                    )
                )
            );
        }

        if ($subsection == "dessert")
        {
            return $this->render(
                "TTMainBundle:Default:columns.html.twig", array(
                    "title" => "Dessert",
                    "section" => "restaurants",
                    "subsection" => $subsection,
                    "contents" => array (
                        $this->readContentFile("dessert1.md"),
                        $this->readContentFile("dessert2.md"),
                        $this->readContentFile("dessert3.md")
                    )
                )
            );
        }

        return $this->render(
            "TTMainBundle:Default:columns.html.twig", array(
                "title" => "Indy Dining",
                "section" => "restaurants",
                "subsection" => "restaurants",
                "contents" => array (
                    $this->readContentFile("breakfast.md"),
                    $this->readContentFile("lunch.md"),
                    $this->readContentFile("dinner.md"),
                    $this->readContentFile("dessert.md")
                )
            )
        );
    }

    public function lodgingAction($subsection)
    {
        if ($subsection == "bnb")
        {
            return $this->render(
                "TTMainBundle:Default:columns.html.twig", array(
                    "title" => "Bed & Breakfasts",
                    "section" => "lodging",
                    "subsection" => $subsection,
                    "contents" => array (
                        $this->readContentFile("bnb1.md"),
                        $this->readContentFile("bnb2.md"),
                        $this->readContentFile("bnb3.md")
                    )
                )
            );
        }

        if ($subsection == "hotel")
        {
            return $this->render(
                "TTMainBundle:Default:columns.html.twig", array(
                    "title" => "Hotels",
                    "section" => "lodging",
                    "subsection" => $subsection,
                    "contents" => array (
                        $this->readContentFile("hotel1.md"),
                        $this->readContentFile("hotel2.md"),
                        $this->readContentFile("hotel3.md")
                    )
                )
            );
        }

        if ($subsection == "camping")
        {
            return $this->render(
                "TTMainBundle:Default:columns.html.twig", array(
                    "title" => "Camping",
                    "section" => "lodging",
                    "subsection" => $subsection,
                    "contents" => array (
                        $this->readContentFile("camping1.md"),
                        $this->readContentFile("camping2.md"),
                        $this->readContentFile("camping3.md")
                    )
                )
            );
        }

        return $this->render(
            "TTMainBundle:Default:columns.html.twig", array(
                "title" => "Lodging",
                "section" => "restaurants",
                "subsection" => "restaurants",
                "contents" => array (
                    $this->readContentFile("bnb.md"),
                    $this->readContentFile("hotel.md"),
                    $this->readContentFile("camping.md")
                )
            )
        );
    }

    public function activitiesAction($subsection)
    {
        if ($subsection == "family")
        {
            return $this->render(
                "TTMainBundle:Default:columns.html.twig", array(
                    "title" => "Family Fun",
                    "section" => "activities",
                    "subsection" => $subsection,
                    "contents" => array (
                        $this->readContentFile("family1.md"),
                        $this->readContentFile("family2.md"),
                        $this->readContentFile("family3.md")
                    )
                )
            );
        }

        if ($subsection == "theatre")
        {
            return $this->render(
                "TTMainBundle:Default:columns.html.twig", array(
                    "title" => "Theatre",
                    "section" => "activities",
                    "subsection" => $subsection,
                    "contents" => array (
                        $this->readContentFile("theatre1.md"),
                        $this->readContentFile("theatre2.md"),
                        $this->readContentFile("theatre3.md")
                    )
                )
            );
        }

        if ($subsection == "music")
        {
            return $this->render(
                "TTMainBundle:Default:columns.html.twig", array(
                    "title" => "Music",
                    "section" => "activities",
                    "subsection" => $subsection,
                    "contents" => array (
                        $this->readContentFile("music1.md"),
                        $this->readContentFile("music2.md"),
                        $this->readContentFile("music3.md")
                    )
                )
            );
        }

        if ($subsection == "sports")
        {
            return $this->render(
                "TTMainBundle:Default:columns.html.twig", array(
                    "title" => "Sports",
                    "section" => "activities",
                    "subsection" => $subsection,
                    "contents" => array (
                        $this->readContentFile("sports1.md"),
                        $this->readContentFile("sports2.md"),
                        $this->readContentFile("sports3.md")
                    )
                )
            );
        }

        return $this->render(
            "TTMainBundle:Default:columns.html.twig", array(
                "title" => "Activities",
                "section" => "restaurants",
                "subsection" => "restaurants",
                "contents" => array (
                    $this->readContentFile("family.md"),
                    $this->readContentFile("theatre.md"),
                    $this->readContentFile("music.md"),
                    $this->readContentFile("sports.md")
                )
            )
        );
    }

}

