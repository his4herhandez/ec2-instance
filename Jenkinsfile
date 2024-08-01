pipeline {
    agent any

    stages {

        stage('Update repo') {
            steps {
                // Instalar las dependencias PHP, si es necesario
                sh 'git pull origin main' // Asegúrate de que Composer esté instalado
            }
        }

        stage('Run PHP Scripts') {
            steps {
                    dir('/home/devlink/Workspace/docker-php83/www/PanchosApi') {
                        // Ejecutar los scripts PHP
                        sh 'php script/CreateHelloWorldMessage.php'
                    }
            }
        }
    }

    post {
        success {
            echo 'El pipeline se ejecutó correctamente.'
        }
        failure {
            echo 'El pipeline falló.'
        }
    }
}
