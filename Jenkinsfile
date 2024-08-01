pipeline {
    agent any

    stages {
        stage('Update Repo') {
            steps {
                dir('/var/www/html/ec2-instance') {
                    sh '/var/www/html/ec2-instance/scripts/update_repo.sh'
                }
            }
        }

        stage('Update Composer') {
            steps {
                dir('/var/www/html/ec2-instance') {
                    sh 'composer up'
                }
            }
        }

        // stage('Run PHP Scripts') {
        //     steps {
        //         dir('/var/www/html/ec2-instance') {
        //             // Ejecutar los scripts PHP
        //             sh 'php /var/www/html/ec2-instance/script/CreateHelloWorldMessage.php'
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
