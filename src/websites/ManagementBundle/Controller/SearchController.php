<?php

namespace websites\ManagementBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController as Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use websites\ManagementBundle\Entity\Website;
use websites\ManagementBundle\Entity\FtpAccounts;
use websites\ManagementBundle\Entity\dbs;
use websites\ManagementBundle\Entity\Cms;
use websites\ManagementBundle\Entity\EmailAcc;

/**
 * Website controller.
 *
 * @Route("/search")
 */
class SearchController extends Controller
{

    /**
     * Lists all results entities.
     *
     * @Route("/", name="search")
     * @Method("POST")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $search = $request->request->get('search');
        $em = $this->getDoctrine()->getManager();
        $ftpAccounts = $em->getRepository('websitesManagementBundle:FtpAccounts')->search($search);
        $emailAcc = $em->getRepository('websitesManagementBundle:EmailAcc')->search($search);
        $dbs = $em->getRepository('websitesManagementBundle:dbs')->search($search);
        $websites = $em->getRepository('websitesManagementBundle:Website')->search($search);
        $cms = $em->getRepository('websitesManagementBundle:Cms')->search($search);
        $socialAcc = $em->getRepository('websitesManagementBundle:SocialAcc')->search($search);

        

        $words = explode(' ', $search);
        return $this->render('websitesManagementBundle:Default:search.html.twig', array(
            'search'      => $search,
            'words'       => $words,
            'ftpAccounts' => $this->_highlightWords($ftpAccounts, $words),
            'emailAcc' => $this->_highlightWords($emailAcc, $words),
            'dbs' => $this->_highlightWords($dbs, $words),
            'websites' => $this->_highlightWords($websites, $words),
            'cms' => $this->_highlightWords($cms, $words),
            'socialAcc' => $this->_highlightWords($socialAcc, $words)
        ));

    }

    private function _highlightWords($results, $words)
    {
        $highlightedResults = array();
        $highlight = '<span class="label-warning">%s</span>';
        foreach ($results as $r) {
            foreach ($words as $w) {
                $highlightedResults[] = str_replace($w, sprintf($highlight, $w), $r);
            }
        }
        return $highlightedResults;
    }
}