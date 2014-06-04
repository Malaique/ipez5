<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new ipezbo\CustomerBundle\ipezboCustomerBundle(),
            new ipezbo\BrandBundle\ipezboBrandBundle(),
            new ipezbo\CategoryBundle\ipezboCategoryBundle(),
            new ipezbo\NewsletterBundle\ipezboNewsletterBundle(),
            new ipezbo\EventBundle\ipezboEventBundle(),
            new ipezbo\ProductBundle\ipezboProductBundle(),
            new ipezbo\GeneralSettingBundle\ipezboGeneralSettingBundle(),
            new ipezbo\MailSettingBundle\ipezboMailSettingBundle(),
            new ipezbo\SliderBundle\ipezboSliderBundle(),
            new ipezbo\ParticipationBundle\ipezboParticipationBundle(),
            new ipezbo\AlertBundle\ipezboAlertBundle(),
            new ipezbo\UserBundle\ipezboUserBundle(),
            new FOS\UserBundle\FOSUserBundle(),
            new ipezbo\HomeBundle\ipezboHomeBundle(),
            new ipezbo\VisitorNewsletterBundle\ipezboVisitorNewsletterBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
