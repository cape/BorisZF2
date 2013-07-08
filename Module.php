<?php
namespace BorisZF2;

use Zend\Console\Adapter\AdapterInterface as ConsoleAdapterInterface;
use Zend\EventManager\EventInterface;
use Zend\Mvc\ModuleRouteListener;
use Zend\ModuleManager\Feature\ConsoleUsageProviderInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ServiceManager\ServiceLocatorInterface;


class Module implements ConsoleUsageProviderInterface, AutoloaderProviderInterface, ConfigProviderInterface
{

	const NAME    = 'Boris - Zend Framweork command line tool';

	/**
	 * @var ServiceLocatorInterface
	 */
	protected $sm;

	public function onBootstrap(EventInterface $e)
	{
		$this->sm = $e->getApplication()->getServiceManager();
	}


    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConsoleBanner(ConsoleAdapterInterface $console)
    {
    	return self::NAME;
    }

    public function getConsoleUsage(ConsoleAdapterInterface $console){
    	$config = $this->sm->get('config');
    	if(!empty($config['Boris']) && !empty($config['Boris']['disable_usage'])){
    		return null; // usage information has been disabled
    	}
    	return array(
    		'basic information:'
    	);
    }
}
