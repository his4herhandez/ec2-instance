pipeline {
    agent any

    stages {
        stage('Update Repo') {
            steps {
                dir('/var/www/html/jenkins') {
                    sh '/var/www/html/jenkins/update_repo.sh'
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
