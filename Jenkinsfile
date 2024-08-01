pipeline {
    agent any

    stages {

        stage('Update Repo') {
            steps {
                // Navegar al directorio del repositorio si es necesario
                dir('/var/www/html/ec2-jenkins') {
                    // Actualizar el repositorio
                    sh 'git pull origin main'
                }
            }
        }

        stage('Run PHP Scripts') {
            steps {
                dir('/var/www/html/ec2-jenkins') {
                    // Ejecutar el script PHP
                    sh 'php /var/www/html/ec2-jenkins/script/CreateHelloWorldMessage.php'
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
