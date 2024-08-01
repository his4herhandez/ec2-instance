pipeline {
    agent any

    stages {
        stage('Update Repo') {
            steps {
                dir('/var/www/html/pipeline-jenkins') {
                    // comentario de prueba
                    sh 'git pull origin main'
                }
            }
        }

        stage('Update Composer') {
            steps {
                dir('/var/www/html/pipeline-jenkins') {
                    // Ejecutar los scripts PHP
                    sh 'composer up'
                }
            }
        }

        stage('Run PHP Scripts') {
            steps {
                dir('/var/www/html/pipeline-jenkins') {
                    // Ejecutar los scripts PHP
                    sh 'php /var/www/html/pipeline-jenkins/script/CreateHelloWorldMessage.php'
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
