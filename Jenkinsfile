pipeline {
    agent any

    stages {
        stage('Update Repo') {
            steps {
                dir('/var/www/html/pipeline-jenkins') {
                    sh 'git pull origin main'
                }
            }
        }

        // stage('Run PHP Scripts') {
        //     steps {
        //         dir('/var/www/html/ec2-jenkins') {
        //             // Ejecutar los scripts PHP
        //             sh 'php script/CreateHelloWorldMessage.php'
        //         }
        //     }
        // }
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
