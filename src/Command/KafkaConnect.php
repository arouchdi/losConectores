<?php
declare(strict_types=1);

namespace App\Command;

use App\Application\Api\RequestPerformer;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class KafkaConnect extends Command
{
    private RequestPerformer $requestPerformer;

    public function __construct(RequestPerformer $requestPerformer, string $name = 'default')
    {
        parent::__construct($name);
        $this->requestPerformer = $requestPerformer;
    }

    /**
     * Configures the current command.
     */
    protected function configure(): void
    {
        $this->setDescription('Sync data from source to a kakfa topic');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $symfonyStyle = new SymfonyStyle($input, $output);

        $symfonyStyle->writeln(
            sprintf(
                "%s\tcommand %s (%s) started",
                date('Y-m-d H:i:s'),
                $this->getName(),
                getmypid()
            )
        );

        $this->requestPerformer->performRequest();

        $symfonyStyle->writeln(PHP_EOL . date("Y-m-d H:i:s") . "\tdone");

        return 0;
    }
}
