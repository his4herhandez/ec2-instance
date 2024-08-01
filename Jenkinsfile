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
