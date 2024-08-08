pipeline {
    agent any

    stages {
        stage('Update Repo') {
            steps {
                dir('/var/www/html/jenkins@tmp') {
                    sh '/var/www/html/jenkins@tmp/update_repo.sh'
                }
            }
        }
    }

    post {
        success {
            echo 'Pipeline executed correctly'
        }
        failure {
            echo 'Pipeline failed'
        }
    }
}
