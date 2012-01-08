<?php


namespace ActualSkill\CoreBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class CalculateRatingsCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('actualskill:ratings:calculate')
            ->setDescription('Calculate aggregated ratings for attributes')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        
        $dialog = $this->getHelperSet()->get('dialog');
        $name = $dialog->ask($output, 'Please enter the name of the widget: ', 'Troels');
        
        if ($name) {
            $text = 'Hello '.$name;
        } else {
            $text = 'Hello';
        }

        $ratingService = $this->getContainer()->get('actual_skill_core.rating_service');
        
        $output->writeln($ratingService->calculateRatings());
        //$output->writeln($ratingService->test());
    }
}

?>