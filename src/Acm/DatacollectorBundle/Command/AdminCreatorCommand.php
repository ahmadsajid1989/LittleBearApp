<?php

namespace Acm\DatacollectorBundle\Command;

use Acm\DatacollectorBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoder;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AdminCreatorCommand extends ContainerAwareCommand
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;

        parent::__construct();
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setName('acm:create:user')
            ->setDescription('New User Creator Command')
            ->addArgument('username', InputArgument::REQUIRED, 'The username of the user.')
            ->addArgument('password', InputArgument::REQUIRED, 'The password of the user.');
    }

    /**
     * {@inheritdoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'User Creator',
            '============',
            '',
        ]);

        $user = new User();
        $user->setUsername($input->getArgument('username'));

        $encoder  = $this->encoder;

        $user->setRoles(['ROLE_SUPER_ADMIN']);
        $user->setUserType('admin');
        $user->setIsActive(true);
        $plainPassword = $input->getArgument('password');
        $encoded = $encoder->encodePassword($user, $plainPassword);
        $user->setPassword($encoded);

        $em = $em = $this->getContainer()->get('doctrine')->getManager();
        $em->persist($user);
        $em->flush();

       $output->writeln('New User Created with Username: '.$input->getArgument('username'));
    }
}
