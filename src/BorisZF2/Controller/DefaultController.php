<?php

namespace BorisZF2\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ConsoleModel;
use Zend\Console\ColorInterface as Color;
use Boris\Boris;
use Zend\Version\Version;



class DefaultController extends AbstractActionController
{
    public function versionAction()
    {
        /* @var $request \Zend\Console\Request          */
        /* @var $console \Zend\Console\AdapterInterface */
        $request      = $this->getRequest();
        $console      = $this->getServiceLocator()->get('console');
        $usingStdout  = false;

        $output      = STDOUT;

        $console->writeLine("Using Boris - ZF2 integration version 1.0.0 ", Color::GREEN);
        $console->writeLine("      Boris Library version: ".Boris::VERSION, Color::GREEN);
        $console->writeLine("      ZenFramework Library version: ".Version::VERSION, Color::GREEN);
    }

    public function ConsoleAction(){
    	/* @var $request \Zend\Console\Request          */
    	/* @var $console \Zend\Console\AdapterInterface */
    	$request      = $this->getRequest();
    	$console      = $this->getServiceLocator()->get('console');
    	$usingStdout  = false;

    	$output      = STDOUT;

    	$console->writeLine("starting console...", Color::GREEN);

    	$Application = $this->getServiceLocator()->get('Application');
    	$ServiceManager = $this->getServiceLocator()->get('ServiceManager');


    	$boris = new Boris();
    	$boris->setLocal([
    			'Application' => $Application,
    			'ServiceManager'=>$ServiceManager,
    			'Console'=>$console
    			]);
    	$boris->start();




    }


}
