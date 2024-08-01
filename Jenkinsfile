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
                    dir('/var/www/html/ec2-jenkins') {
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
