pipeline {
    agent any

    stages {
        stage('Update Repo') {
            steps {
                dir('/var/www/html/pipeline-jenkins') {
                    // comentario de prueba
                    sh '/var/www/html/pipeline-jenkins/scripts/update_repo.sh'
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

        // stage('Run PHP Scripts') {
        //     steps {
        //         dir('/var/www/html/pipeline-jenkins') {
        //             // Ejecutar los scripts PHP
        //             sh 'php /var/www/html/pipeline-jenkins/script/CreateHelloWorldMessage.php'
        //         }
        //     }
        // }
    }

    post {
        success {
            echo 'Pipeline executed correctly'
        }
        failure {
            echo 'Pipeline failed'
        }
        always {
            // Limpieza o pasos finales, si es necesario
            echo 'Pipeline finished'
        }
    }
}
