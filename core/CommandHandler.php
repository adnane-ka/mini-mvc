<?php 

namespace Core;

class CommandHandler{
    /**
     * Handle the incoming command
     * @return void
    */
    public function __construct($argv){
        # locate the run php command & store 
        $command = $argv[1];

        # run the propper command
        switch ($command) {
            case 'dev':
                $this->dev();
                break;
        
            case 'db:migrate':
                $this->migrateDatabase();
                break;

            default:
                echo 'Unkown command!';
                break;
        }
    }

    /**
     * Runs the dev server 
     * @return void
    */
    private function dev(){
        echo "Have a great dev experience! \n";
        exec('php -S localhost:8000');
    }

    /**
     * Run the sql database file
     * @return void
    */
    private function migrateDatabase(){
        echo "Running database migration ..\n";
        
        $command = "mysql -u {$_ENV['DB_USERNAME']} {$_ENV['DB_PASSWORD']} {$_ENV['DB_NAME']} < database.sql";

        exec($command, $output, $returnVar);

        $this->handleCommandOutput($returnVar, $output, 'Error migrating database', 'Database migrating succeded');
    }

    /**
     * Handle a given command output
     * @return void
    */
    private function handleCommandOutput($returnVar, $output, $successMessage, $errorMessage){
        if ($returnVar == 0) {
            echo  "$errorMessage \n" . implode("\n", $output);
        } else {
            echo "$successMessage\n";
        }
    }
}